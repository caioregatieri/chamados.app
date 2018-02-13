<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entities\Call\Call;
use App\Entities\CallFile\CallFile;
use App\Entities\CallHistory\CallHistory;
use App\Entities\CallHistoryFile\CallHistoryFile;
use App\Entities\CallMode\CallMode;
use App\Entities\CallStatus\CallStatus;
use App\Entities\Departament\Departament;
use App\Entities\Place\Place;
use App\Entities\User\User;
use App\Entities\Login\Login;
use DB;

class ApiController extends Controller
{

    function validUser($request){
        $email     =  isset($request->email)    ? $request->email    : '';
        $password  =  isset($request->password) ? $request->password : '';
        if(!isset($email) || $email == '' || 
           !isset($password) || $password == ''){
            return false;
            exit;
        }

        $user = User::where(['email'=>$email])->first();
        if ($user && \Hash::check($password, $user->password)) {
            if ($user->locked == '0'){
                return $user;
            }
            return false;
        }else {
            return false;
        }
    }

    //Auth
    public function login(Request $request){
        $user = $this->validUser($request);
        if(!$user){
            return ['msg'=>'Login fail', 'error'=>true];
        }else{
            Login::create([
                'user_id'=>$user->id,
                'ip'=>$request->ip(),
                'method'=>'login'
            ]);
            return ['msg'=>'Login success', 'error'=>false, 'user'=>$user];
        }
    }
  
    public function logout(Request $request){
        $user = $this->validUser($request);
        if($user){
            return ['msg'=>'Logout fail', 'error'=>true];
        }
        Login::create([
            'user_id'=>$user->id,
            'ip'=>$request->ip(),
            'method'=>'logout'
        ]);
        return ['msg'=>'Logout success', 'error'=>false];
    }    

    //User
    public function getUser(Request $request){
        if(!$this->validUser($request)){
            return ['msg'=>'Login fail', 'error'=>true];
            exit;
        }
        if(isset($request->id)){
          return User::find($request->id);
        }
        return User::orderBy('name','ASC')->get();
    }
  
    public function saveUser(Request $request){
        return User::create($request->all());
    }
  
    public function updateUser($id, Request $request){
        return User::find($id)->update($request);
    }    

    //Calls
    public function getCall(Request $request){
        if(!$this->validUser($request)){
            return ['msg'=>'Login fail', 'error'=>true];
            exit;
        }

        if(isset($request->id)){
            return Call::with(['place','departament','history'])->find($request->id);
        }

        if(isset($request->call_status)){
            $query = "select c.*, s.name 
                      from calls as c 
                      inner join (select call_id, status_id from callhistories group by call_id) as h on (h.call_id = c.id)
                      inner join callstatuses as s on (h.status_id = s.id)
                      where s.id = $request->call_status
                      order by c.id DESC";
            return DB::select($query);
        }

        return Call::orderBy('id','DESC')
                    ->get();
    }
  
    public function saveCall(Request $request){
        return Call::create($request->all());
    }
  
    public function updateCall($id, Request $request){
        return Call::find($id)
                    ->update($request);
    }
  
    //Histories
    public function getHistoryByCallId(Request $request){
        if(!$this->validUser($request)){
            return ['msg'=>'Login fail', 'error'=>true];
            exit;
        }
        return CallHistory::with('user')->where('call_id', $request->callid)
                            ->orderBy('id','DESC')
                            ->get();
    }
  
    public function saveHistory(Request $request){
        return CallHistory::create($request->all());
    }

    //Places
    public function getPlace(Request $request){
        if(!$this->validUser($request)){
            return ['msg'=>'Login fail', 'error'=>true];
            exit;
        }
        if(isset($request->departament_id)){
            return Place::where('departament_id', $request->departament_id)->get();
        }
        if(isset($request->id)){
            return Place::find($request->id);
        }
        return Place::orderBy('name','ASC')->get();
    }

    //Departments
    public function getDepartment(Request $request){
        if(!$this->validUser($request)){
            return ['msg'=>'Login fail', 'error'=>true];
            exit;
        }
        if($request->id != null){
            return Department::find($request->id);
        }
        return Department::orderBy('name','ASC')->get();
    }
}
