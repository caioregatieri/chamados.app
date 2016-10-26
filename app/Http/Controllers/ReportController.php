<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;
use DB;
use Validator;

use \App\Entities\Call\Call;
use \App\Entities\CallFile\CallFile;
use \App\Entities\CallHistory\CallHistory;
use \App\Entities\CallHistoryFile\CallHistoryFile;
use \App\Entities\CallMode\CallMode;
use \App\Entities\CallStatus\CallStatus;
use \App\Entities\Departament\Departament;
use \App\Entities\Place\Place;
use \App\Entities\User\User;
use \App\Entities\UserType\UserType;
use \App\Events\statusCall;

class ReportController extends Controller
{
    public function getCalls(){
        //pega as variaveis para filtrar
        $search =      Input::get('search','');
        $mode =        Input::get('mode','');
        $departament = Input::get('departament','');
        $place =       Input::get('place','');
        $status =      Input::get('status','');
        $user =        Input::get('user','');
        $date =        Input::get('created_at','');

        //caso o usuario logado não seja administrador, sera filtrado os chamados por esse usuario
        if ($user == ''){
          $user = Auth::user()->usertype->administrator == "0" ?  Auth::user()->id : '';
        }

        //comando a ser executado
        $q = 'select c.id, c.created_at,  c.title, c.description, '.
                'p.name as place, '.
                'd.name as departament, '.
                'm.name as  mode, '.
                's.name as status, s.color, '.
                'u.name as usuario '.
            'from calls c '.
            'inner join users u on c.user_id = u.id '.
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

        if($date != ''){
          $dateStart = date('Y-m-d', strtotime(str_replace('/', '-', explode(' - ', $date)[0])));
          $dateEnd   = date('Y-m-d', strtotime(str_replace('/', '-', explode(' - ', $date)[1])));
          if ($w == '')
              $w = $w . "where c.created_at between '" . $dateStart . "' and '" . $dateEnd . "' ";
          else
              $w = $w . "and c.created_at between '" . $dateStart . "' and '" . $dateEnd . "' ";
        }

        $q =  $q . $w . 'order by c.id desc';

        //dd($q);

        $calls = DB::select($q);

        //variaveis para preencher os selects
        $modes        = CallMode::all()->sortBy('name');
        $departaments = Departament::all()->sortBy('name');
        $callstatus   = CallStatus::all()->sortBy('name');
        $users        = User::all()->sortBy('name');

        return view('reports.calls.index', compact('calls','modes','departaments','callstatus','users'));
    }

    public function getDepartaments(){
      $departaments = new Departament;

      $filter = isset($_GET['search']) ? trim($_GET['search']) : '';
      if($filter != ''){
        $departaments = $departaments->where('name','like','%'.$filter.'%');
      }

      $departaments = $departaments->orderBY('name')->get();
      return view('reports.departaments.index', compact('departaments'));
    }

    public function getPlaces(){
      $name =        Input::get('search');
      $departament = Input::get('departament','');

      $places = new Place;

      if($name != ''){
        $places = $places->where('name','like','%'.$name.'%');
      }

      if($departament != ''){
        $places = $places->where('departament_id','=',$departament);
      }

      $places = $places->orderBy('name')->get();

      $departaments = Departament::orderBy('name')->get();
      return view('reports.places.index', compact('places','departaments'));
    }

    public function getUsers(){
      $users = new User;

      $filter = isset($_GET['search']) ? trim($_GET['search']) : '';
      if($filter != ''){
        $users = $users->where('name','like','%'.$filter.'%');
      }

      $users = $users->get();

      return view('reports.users.index', compact('users'));
    }

    public function getUserTypes(){
      $usertypes = new UserType;
      $usertypes = $usertypes->get();
      return view('reports.usertypes.index', compact('usertypes'));
    }
}
