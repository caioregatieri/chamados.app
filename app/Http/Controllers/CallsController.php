<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\HistoryRequest;
use App\Http\Requests\CallRequest;

use Auth;
use Input;
use DB;
use Validator;
use Illuminate\Pagination\LengthAwarePaginator;

use \App\Entities\Call\Call;
use \App\Entities\CallFile\CallFile;
use \App\Entities\CallHistory\CallHistory;
use \App\Entities\CallHistoryFile\CallHistoryFile;
use \App\Entities\CallMode\CallMode;
use \App\Entities\CallStatus\CallStatus;
use \App\Entities\Departament\Departament;
use \App\Entities\Place\Place;
use \App\Entities\User\User;

use \App\Events\statusCall;

class CallsController extends Controller
{
    public function index()
    {
      //pega as variaveis para filtrar
      $search =      Input::get('search','');
      $mode =        Input::get('mode','');
      $departament = Input::get('departament','');
      $place =       Input::get('place','');
      $status =      Input::get('status','');
      $user =        Input::get('user','');

      //casoo usuario logado não seja administrador, sera filtrado os chamados por esse usuario
      if ($user == ''){
        $user = Auth::user()->usertype->administrator == "0" ?  Auth::user()->id : '';
      }

      //comando a ser executado
      $q = 'select c.id, c.created_at,  c.title, '.
              'p.prefix, '.
              'p.name as place, '.
              'd.name as departament, '.
              'm.name as mode, '.
              's.name as status, s.color '.
          'from calls c '.
          'inner join places p on c.place_id = p.id '.
          'inner join departaments d on p.departament_id = d.id '.
          'inner join callmodes m on c.mode_id = m.id '.
          'inner join ( '.
                  'select call_id, status_id '.
                  'from callhistories '.
                  'group by call_id '.
                  ') h on  h.call_id = c.id '.
          'inner join callstatuses s on s.id = h.status_id ';

      $w = '';

      if($search != ''){
        $w = $w . "where (c.title like '%" . $search . "%' or c.description like '%" . $search . "%') ";
      }

      if($mode != ''){
        if ($w == '')
          $w = $w . "where c.mode_id = " . $mode . " ";
        else
          $w = $w . "and c.mode_id = " . $mode . " ";
      }

      if($departament != ''){
        if ($w == '')
            $w = $w . "where d.id = " . $departament . " ";
        else
            $w = $w . "and d.id = " . $departament . " ";
      }

      if($place != ''){
        if ($w == '')
            $w = $w . "where c.place_id = " . $place . " ";
        else
            $w = $w . "and c.place_id = " . $place . " ";
      }

      if($status != ''){
        if ($w == '')
            $w = $w . "where h.status_id = " . $status . " ";
        else
            $w = $w . "and h.status_id = " . $status . " ";
      }

      if($user != ''){
        if ($w == '')
            $w = $w . "where c.user_id = " . $user . " ";
        else
            $w = $w . "and c.user_id = " . $user . " ";
      }

      $q =  $q . $w . 'order by c.id desc';

      $calls = DB::select($q);

      //Paginação
      $page = Input::get('page',1);
      $perPage = 10;
      $offSet = ($page * $perPage) - $perPage;
      $itemsForCurrentPage = array_slice($calls, $offSet, $perPage, true);
      $calls = new LengthAwarePaginator($itemsForCurrentPage, count($calls), $perPage, $page);

      //define o path correto ao paginador
      if ($search != "")
        $calls->appends(['search'=>$search]);

      if ($mode != "")
        $calls->appends(['mode'=>$mode]);

      if ($departament != "")
        $calls->appends(['departament'=>$departament]);

      if ($place != "")
        $calls->appends(['place'=>$place]);

      if ($status != "")
        $calls->appends(['status'=>$status]);

      if ($user != "")
        $calls->appends(['user'=>$user]);

      $calls->setPath('/calls');

      //variaveis para preencher os selects
      $modes =        CallMode::all()->sortBy('name');
      $departaments = Departament::all()->sortBy('name');
      $callstatus =   CallStatus::all()->sortBy('name');

      /*$triages = collect();
      $triages->push((Object)['id'=>'1', 'name'=>'Auxilio pelo telefone']);
      $triages->push((Object)['id'=>'2', 'name'=>'Conexão remota']);
      $triages->push((Object)['id'=>'3', 'name'=>'Garantia']);
      $triages->push((Object)['id'=>'4', 'name'=>'Manutenção de equipamentos']);
      $triages->push((Object)['id'=>'5', 'name'=>'Serviço externo']);
      dd($triages);*/

      return view('calls.index',compact('calls','modes','departaments','callstatus'));
    }

    public function create()
    {
        $users =  User::where('id', Auth::user()->id)->lists('name','id');
        $modes =  CallMode::lists('name','id');
        if(Auth::user()->usertype->onlyyourplace == "1"){
          $departaments = Departament::where('id', Auth::user()->place->departament->id)->lists('name','id');
          $places =       Place::where('id', Auth::user()->place->id)->lists('name','id');
        }else {
          $departaments = Departament::lists('name','id');
          $places =       Place::lists('name','id');
        }
        return view('calls.create',compact('departaments','places','users','modes'));
    }

    public function store(CallRequest $request)
    {
        $files = Input::file('files');
        $call = Call::create([
            'user_id'=>$request['user'],
            'mode_id'=>$request['mode'],
            'place_id'=>$request['place'],
            'requester'=>trim($request['requester']),
            'register'=>trim($request['register']),
            'title'=>trim($request['title']),
            'description'=>trim($request['description'])
        ]);
        if($files[0]){
          //executa a função de upload e verifica se houveram erros
          if(!$this->uploadcallfiles($call->id, $files)){
            //em caso de erro com o upload ele remove o historico do banco
            $call->files()->delete();
            $call->delete();
            return redirect()->back();
          }
        }
        $history = CallHistory::create([
            'call_id' => $call->id,
            'user_id' => $request['user'],
            'description' => 'Chamado aberto. Aguardando...',
            'status_id' => '1'
        ]);
        $res = \Event::fire(new statusCall($call));
        return redirect()->route('calls.index');
    }

    public function show($id)
    {
        $call = Call::find($id);
        return view('calls.show', compact('call'));
    }

    public function edit($id)
    {
        $call = Call::find($id);

        if ($call->history->last()->status->isend == 'on')
            return redirect()->route('calls.index');

        $users =        User::lists('name','id');
        $modes =        CallMode::lists('name','id');
        $departaments = Departament::lists('name','id');
        $places =       Place::lists('name','id');

        return view('calls.edit', compact('departaments','places','users','call','modes'));
    }

    public function update(CallRequest $request, $id)
    {
        $files = Input::file('files');
        $call = Call::find($id);
        $call->mode_id = $request['mode'];
        $call->place_id = $request['place'];
        $call->requester = trim($request['requester']);
        $call->register = trim($request['register']);
        $call->title = trim($request['title']);
        $call->description = trim($request['description']);
        $call->save();
        if($files[0]){
          //executa a função de upload e verifica se houveram erros
          if(!$this->uploadcallfiles($call->id, $files)){
            //em caso de erro com o upload ele remove o historico do banco
            $call->files()->delete();
            $call->delete();
            return redirect()->back();
          }
        }

        $res = \Event::fire(new statusCall($call));

        return redirect()->route('calls.index');
    }

    public function destroy($id)
    {
        return view('calls.index');
    }

    public function historycreate($id)
    {
        $call =   Call::find($id);

        if ($call->history->last()->status->isend == 'on')
            return redirect()->route('calls.index');

        $users =  User::where('id', Auth::user()->id)->lists('name','id');
        $status = CallStatus::where('id','<>','1')->lists('name','id');

        return view('calls.history.create', compact('users','status','call'));
    }

    public function historystore(HistoryRequest $request)
    {
        $files = Input::file('files');
        $history = CallHistory::create([
            'call_id'=>$request['call'],
            'user_id'=>$request['user'],
            'description'=>trim($request['description']),
            'status_id'=>$request['status']
        ]);
        if($files[0]){
          //executa a função de upload e verifica se houveram erros
          if(!$this->uploadhistoryfiles($history->id, $files)){
            //em caso de erro com o upload ele remove o historico do banco
            $history->files()->delete();
            $history->delete();
            return redirect()->back();
          }
        }
        if ($history){

          $res = \Event::fire(new statusCall($history->Call));

          return redirect()->route('calls.show', [$request['call']]);
        }
    }

    private function uploadhistoryfiles($historyId, $files)
    {
      try{
        $storagePath = storage_path().'/uploads/history/'.$historyId;
        foreach ($files as $file) {
          $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
          $fileExtension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
          $fileFullName = $fileName . '.' . $fileExtension;
          while(file_exists($storagePath.'/'.$fileFullName)){
            $fileFullName = $fileName . rand(0,9) . '.' . $fileExtension;
          }
          $fileModel = CallHistoryFile::create(['history_id'=>$historyId,
                                                'filename'=>$fileFullName]);
          $file->move($storagePath, $fileFullName);
        }
      }catch(Exception $e){
        return false;
      }
      return true;
    }

    private function uploadcallfiles($callId, $files)
    {
      try{
        $storagePath = storage_path().'/uploads/call/'.$callId;
        foreach ($files as $file) {
          $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
          $fileExtension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
          $fileFullName = $fileName . '.' . $fileExtension;
          while(file_exists($storagePath.'/'.$fileFullName)){
            $fileFullName = $fileName . rand(0,9) . '.' . $fileExtension;
          }
          $fileModel = CallFile::create(['call_id'=>$callId,
                                                'filename'=>$fileFullName]);
          $file->move($storagePath, $fileFullName);
        }
      }catch(Exception $e){
        return false;
      }
      return true;
    }

    public function downloadhistoryfile($historyId, $fileId)
    {
      $file = CallHistoryFile::find($fileId);

      $storagePath = storage_path().'/uploads/history/'.$historyId;

      return \Response::download($storagePath.'/'.$file->filename);
    }

    public function downloadcallfile($callId, $fileId)
    {
      $file = CallFile::find($fileId);

      $storagePath = storage_path().'/uploads/call/'.$callId;

      return \Response::download($storagePath.'/'.$file->filename);
    }

    public function deletecallfile($callId, $fileId)
    {
      $file = CallFile::find($fileId)->delete();

      $storagePath = storage_path().'/uploads/call/'.$callId;

      return redirect()->back();
    }
}
