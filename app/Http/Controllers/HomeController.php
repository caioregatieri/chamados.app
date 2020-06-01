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
use App\Entities\Call\Call;
use App\Entities\CallStatus\CallStatus;
use App\Entities\Departament\Departament;
use App\Entities\Login\Login;

use Carbon\Carbon;
use Auth;
use DB;

class HomeController extends Controller
{

    public function index(){
      $c = ($this->calls());
      $l = ($this->graphPerMonth('morris-area-chart', 5, Departament::lists('name'), Departament::lists('name')));
      $p = ($this->graphPerDepartament('morris-donut-chart', $this->palletColors(), true));
      $z = ($this->graphPerMode('morris-donut-chart2', $this->palletColors(), true));

      $callsOpened = $this->callsOpened($c['Owner']);
      // dd(compact('c','l','p','z','callsOpened'));
      return view('home.index', compact('c','l','p','z','callsOpened'));
    }

    function callsOpened($groups){
      $amount = 0;
      foreach($groups as $type){
        if ($type->id == 1 || $type->id == 3){
          $amount += $type->quantidade;
        }
      }
      return $amount;
    }

    public function about(Request $request){
      /*Login::create(['user_id'=>Auth::user()->id,
                     'ip'=>$request->ip(),
                     'method'=>'about']);*/
      return view('home.about');
    }

    public function graphs(){
      $c = ($this->calls());
      $l = ($this->graphPerMonth('morris-area-chart-1', 13, Departament::lists('name'), Departament::lists('name')));
      // $m = ($this->graphPerMonth('morris-area-chart-2', 11, Departament::lists('name'), Departament::lists('name')));
      $p = ($this->graphPerDepartament('morris-donut-chart', $this->palletColors(), true));
      $z = ($this->graphPerMode('morris-donut-chart2', $this->palletColors(), true));
      // dd(compact('c','l','p','z'));
      return view('calls.graphs', compact('c','l','m','p','z'));
    }

    function palletColors(){
      return array("#556270","#4ECDC4","#C7F464","#FF6B6B","#C44D58",
                   "#69D2E7","#A7DBD8","#E0E4CC","#F38630","#FA6900",
                   "#FE4365","#FC9D9A","#F9CDAD","#C8C8A9","#83AF9B");
    }

    function calls(){
      $all = $this->selectCalls();
      $owner = $this->selectCalls(Auth::user()->id);
      $ret = ["All"=>$all, "Owner"=>$owner];
      return ($ret);
    }

    function selectCalls($user = null){
      $q = "select c.id, c.name, coalesce(b.quantidade, 0) as quantidade, c.color, c.icon ".
           "from ( ".
               "select count(*) as quantidade, status_id ".
            	 "from ( select call_id, status_id ".
            	        "from callhistories h ";

            if ($user != null){
                $q .= "inner join calls c on h.call_id = c.id ".
                      "where c.user_id = $user ";
            }

      $q.=            "group by h.call_id ) as a ".
               "group by status_id ) as b ".
            "inner join callstatuses as c on b.status_id = c.id";

      return DB::select($q);
    }

    function graphPerMonth($element, $months=1, $departaments, $labels=null, $colors=null, $resize=true){
      //$departaments = Departament::all();
      $q = "select DATE_FORMAT(c.created_at, '%Y-%m') as 'period', ".
                  "d.name as departament, ".
                  "count(*) as total ".
           "from calls c ".
           "inner join places p on c.place_id = p.id ".
           "inner join departaments d on p.departament_id = d.id ".
           "where c.created_at > '" . Carbon::now()->subMonths(5)->format('Y-m-d') . "' " .
           "group by DATE_FORMAT(c.created_at, '%Y-%m'), d.name";
           
      error_log($q);

      $result = DB::select($q);
      $period = array();
      //percorro o resultado do banco
      foreach ($result as $row) {
        //se o array period estiver vazio crio o primeiro registro
        if (count($period) == 0){
          $tmp = array();
          $tmp['Period'] = $row->period;
          foreach ($departaments as $d) {
            $tmp[$d] = "0";
          }
          //e então modifico o valor padrão do departamento pelo valor do banco
          $tmp[$row->departament] = $row->total;
          array_push($period, $tmp);
        }
        else{
          $existia = false;
          //percorro o array period
          foreach ($period as $key => $value) {
            //verifico se existe um registro com o periodo do banco no array result
            if ($period[$key]['Period'] == $row->period){
              //se exixtir apenas mudo o valor da chave relacionada ao departamento;
              $period[$key][$row->departament] = $row->total;
              $existia = true;
              break;
            }
          }
          if(!$existia){
            //caso não exista contruo um array com o periodo e todos os departamentos
            $tmp = array();
            $tmp['Period'] = $row->period;
            foreach ($departaments as $d) {
              $tmp[$d] = "0";
            }
            //e então modifico o valor padrão do departamento pelo valor do banco
            $tmp[$row->departament] = $row->total;
            array_push($period, $tmp);
          }
        }
      }
      return json_encode(['element'=>$element, 'data'=>$period, 'xkey'=>'Period', 'ykeys'=>$departaments, 'labels'=>$labels, 'resize'=>$resize]);
    }

    function graphPerDepartament($element, $colors=[], $resize=true){
      $q = "select d.name , count(*) as total ".
           "from calls c ".
           "inner join places p on c.place_id = p.id ".
           "inner join departaments d on p.departament_id = d.id ".
           "group by d.name";

      $result = DB::select($q);
      $all = array();
      foreach ($result as $row) {
        array_push($all, ['label'=>$row->name, 'value'=>(int)$row->total]);
      }

      return json_encode(['element'=>$element, 'data'=>$all, 'colors'=>$colors, 'resize'=>$resize]);
    }

    function graphPerMode($element, $colors=[], $resize=true){
      $q = "select m.name , count(*) as total ".
           "from calls c ".
           "inner join callmodes m on c.mode_id = m.id ".
           "group by m.name";

      $result = DB::select($q);
      $all = array();
      foreach ($result as $row) {
        array_push($all, ['label'=>$row->name, 'value'=>(int)$row->total]);
      }

      return json_encode(['element'=>$element, 'data'=>$all, 'colors'=>$colors, 'resize'=>$resize]);
    }

    function graphOfMonth($element, $months=1, $departaments, $labels=null, $colors=null, $resize=true){
      $q = "select DATE_FORMAT(c.created_at, '%Y-%m') as 'period', ".
                  "d.name as departament, ".
                  "count(*) as total ".
           "from calls c ".
           "inner join places p on c.place_id = p.id ".
           "inner join departaments d on p.departament_id = d.id ".
           "where c.created_at > '" . Carbon::now()->subMonths($months)->format('Y-m-d') . "' " .
           "group by DATE_FORMAT(c.created_at, '%Y-%m'), d.name";

      $result = DB::select($q);
      $period = array();
      //percorro o resultado do banco
      foreach ($result as $row) {
        //se o array period estiver vazio crio o primeiro registro
        if (count($period) == 0){
          $tmp = array();
          $tmp['Period'] = $row->period;
          foreach ($departaments as $d) {
            $tmp[$d] = "0";
          }
          //e então modifico o valor padrão do departamento pelo valor do banco
          $tmp[$row->departament] = $row->total;
          array_push($period, $tmp);
        }
        else{
          $existia = false;
          //percorro o array period
          foreach ($period as $key => $value) {
            //verifico se existe um registro com o periodo do banco no array result
            if ($period[$key]['Period'] == $row->period){
              //se exixtir apenas mudo o valor da chave relacionada ao departamento;
              $period[$key][$row->departament] = $row->total;
              $existia = true;
              break;
            }
          }
          if(!$existia){
            //caso não exista contruo um array com o periodo e todos os departamentos
            $tmp = array();
            $tmp['Period'] = $row->period;
            foreach ($departaments as $d) {
              $tmp[$d] = "0";
            }
            //e então modifico o valor padrão do departamento pelo valor do banco
            $tmp[$row->departament] = $row->total;
            array_push($period, $tmp);
          }
        }
      }
      return json_encode(['element'=>$element, 'data'=>$period, 'xkey'=>'Period', 'ykeys'=>$departaments, 'labels'=>$labels, 'resize'=>$resize]);      
    }
}
