<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\UserLoginLog;

use Illuminate\Database\Eloquent\Model;

class UserLoginLog extends Model
{
  protected $table = 'userloginlogs';

  protected $fillable = ['user_id','ip'];

  /*todo log de login possui diversos usuarios*/
  public function user(){
    return $this->hasMany('App\Entities\User\User');
  }
}
