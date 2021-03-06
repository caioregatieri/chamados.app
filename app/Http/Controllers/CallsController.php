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
use \App\Events\createCall;

class CallsController extends Controller
{
    public function index()
    {
      //pega as variaveis para filtrar
      $search =        Input::get('search','');
      $mode =          Input::get('mode','');
      $departament =   Input::get('departament','');
      $place =         Input::get('place','');
      $status =        Input::get('status','');
      $user =          Input::get('user','');
      $has_transfers = Input::get('has_transfers','');

      //caso usuário logado não seja administrador, será filtrado os chamados por esse usuário
      if ($user == ''){
        $user = Auth::user()->usertype->administrator == "0" ?  Auth::user()->id : '';
      }

      //comando a ser executado
      $q = "
        SELECT c.id, c.created_at,  c.title, c.requester, c.has_transfers, p.prefix, 
              p.name AS place, d.name AS departament, m.name AS mode,
              s.name AS status, s.color 
        FROM calls AS c 
        INNER JOIN places AS p ON c.place_id = p.id 
        INNER JOIN departaments AS d ON p.departament_id = d.id 
        INNER JOIN callmodes AS m ON c.mode_id = m.id 
        INNER JOIN ( 
          SELECT c1.call_id, c1.status_id 
          FROM callhistories AS c1
          LEFT JOIN callhistories AS c2 ON c1.created_at < c2.created_at AND c1.call_id = c2.call_id
          WHERE c2.call_id IS NULL
        ) AS h ON  h.call_id = c.id 
        INNER JOIN callstatuses AS s ON s.id = h.status_id 
      "; 

      $w = '';

      if($search != ''){
        $w = $w . "where (c.title like '%" . $search . "%' or c.description like '%" . $search . "%' or c.requester like '%" . $search . "%') ";
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

      if($has_transfers != ''){
        if ($w == '')
            $w = $w . "where c.has_transfers = " . $has_transfers . " ";
        else
            $w = $w . "and c.has_transfers = " . $has_transfers . " ";
      }

      $q =  $q . $w . ' group by c.id order by c.id desc';

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

      return view('calls.index',compact('calls','modes','departaments','callstatus'));
    }

    public function monit()
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
      $q = 'select c.id, c.created_at,  c.title, c.requester, c.has_transfers, '.
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

      $w = 'where (h.status_id = 1 or h.status_id = 3)' . ' ';

      if($search != ''){
        if ($w == '')
          $w = $w . "where (c.title like '%" . $search . "%' or c.description like '%" . $search . "%' or c.requester like '%" . $search . "%') ";
        else 
          $w = $w . "and (c.title like '%" . $search . "%' or c.description like '%" . $search . "%' or c.requester like '%" . $search . "%') ";
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
      $page = Input::get('page', 1);
      $perPage = 16;
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

      return view('calls.monit',compact('calls','modes','departaments','callstatus'));
    }

    public function create()
    {
        $call = new Call();
        $users =  User::where('id', Auth::user()->id)->lists('name','id');
        $modes =  CallMode::lists('name','id');
        if(Auth::user()->usertype->onlyyourplace == "1"){
          $departaments = Departament::where('id', Auth::user()->place->departament->id)->lists('name','id');
          $places =       Place::where('id', Auth::user()->place->id)->lists('name','id');
        }else {
          $departaments = Departament::lists('name','id');
          $places =       Place::lists('name','id');
        }

        $callTitles =   Call::select('title')->distinct()->orderBy('title')->lists('title');
        $callRequesters =   Call::select('requester')->distinct()->orderBy('requester')->lists('requester');

        //dd($callTitles, $callRequesters);

        return view('calls.create',compact('call','departaments','places','users','modes','callTitles','callRequesters'));
    }

    public function store(CallRequest $request)
    {
        $files = Input::file('files');
        $call = Call::create([
            'user_id'=>$request['user'],
            'mode_id'=>$request['mode'],
            'place_id'=>$request['place'],
            'requester'=>trim($request['requester']),
            'requester_email'=>trim($request['requester_email']),
            'register'=>trim($request['register']),
            'title'=>trim($request['title']),
            'description'=>trim($request['description']),
            'has_transfers'=>(isset($request['has_transfers']) ? true : false)
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
        //\Event::fire(new statusCall($call)); //envia e-mail para o responsável do setor requisitante
        //\Event::fire(new createCall($call)); //envia e-mail para o grupo de suporte técnico
        \Session::flash('created', $call);
        return redirect()->route('calls.show', ['id' => $call->id]);
    }

    public function show($id)
    {
        $call = Call::find($id);
        return view('calls.show', compact('call'));
    }

    public function edit($id)
    {
        $call = Call::find($id);

        if ($call->history->last()->status->isend == 1)
            return redirect()->route('calls.index');

        $users =        User::lists('name','id');
        $modes =        CallMode::lists('name','id');
        $departaments = Departament::lists('name','id');
        $places =       Place::lists('name','id');

        $callTitles =   Call::select('title')->distinct()->orderBy('title')->lists('title');
        $callRequesters =   Call::select('requester')->distinct()->orderBy('requester')->lists('requester');

        return view('calls.edit', compact('departaments','places','users','call','modes','callTitles','callRequesters'));
    }

    public function update(CallRequest $request, $id)
    {
        $files = Input::file('files');
        $call = Call::find($id);

        //registra a mudança de tipo de chamado
        if($call->mode_id != $request['mode']){
          $history = CallHistory::create([
              'call_id' => $call->id,
              'user_id' => Auth::user()->id,
              'description' => 'Tipo de chamado alterado de <strong>' . $call->mode->name . '</strong> para <strong>' . CallMode::find($request['mode'])->first()->name . '</strong>',
              'status_id' => '3' //1 = Aguardando, 2 = Cancelado, 3 = Em Andamento, 4 = Finalizado
          ]);          
        }

        $call->mode_id = $request['mode'];
        $call->place_id = $request['place'];
        $call->requester = trim($request['requester']);
        $call->requester_email = trim($request['requester_email']);
        $call->register = trim($request['register']);
        $call->title = trim($request['title']);
        $call->description = trim($request['description']);
        $call->has_transfers = $request['has_transfers'] ? true : false;
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
        //\Event::fire(new statusCall($call));
        //\Event::fire(new createCall($call)); //envia e-mail para o grupo de suporte técnico
        \Session::flash('updated', $call);
        return redirect()->route('calls.index');
    }

    public function destroy($id)
    {
        return view('calls.index');
    }

    public function historycreate($call_id)
    {
        $call = Call::find($call_id);

        if ($call->history->last()->status->isend == 1)
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
        if($history){
          //$res = \Event::fire(new statusCall($history->Call));
          \Session::flash('created', $history);
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
