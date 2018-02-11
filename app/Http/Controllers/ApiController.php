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

class ApiController extends Controller
{

    function validUser($email, $pass){
        $user = User::where(['email'=>$email])->first();
        if (\Hash::check($pass, $user->password)) {
            return $user;
        }
        return false;
    }

    //Auth
    public function login(Request $request){
        if(!isset($request->email) || $request->email == '' || 
           !isset($request->password) || $request->password == ''){
            return ['msg'=>'Login fail', 'error'=>true];
            exit;
        }

        $user = $this->validUser($request->email, $request->password);
        if(!$user){
            return ['msg'=>'Login fail', 'error'=>true];
        }else{
            return ['msg'=>'Login success', 'error'=>false, 'user'=>$user];
        }
    }
  
    public function logout(Request $request){
        return ['msg'=>'Logout success'];
    }    

    //User
    public function getUser($id = null){
        if($id != null){
          return User::find($id)->get();
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
    public function getCall($id = null){
        if($id != null){
          return Call::find($id)->get();
        }
        return Call::orderBy('id','DESC')->get();
    }
  
    public function saveCall(Request $request){
        return Call::create($request->all());
    }
  
    public function updateCall($id, Request $request){
        return Call::find($id)->update($request);
    }
  
    //Histories
    public function getHistoryByCallId($callid){
        return CallHistory::where('call_id', $callid)->orderBy('id','DESC')->get();
    }
  
    public function saveHistory(Request $request){
        return CallHistory::create($request);
    }

    //Places
    public function getPlace($id){
        if($id != null){
            return Place::find($id)->get();
          }
          return Place::orderBy('name','ASC')->get();
    }

    //Departments
    public function getDepartment($id){
        if($id != null){
            return Department::find($id)->get();
          }
          return Department::orderBy('name','ASC')->get();
    }
}
