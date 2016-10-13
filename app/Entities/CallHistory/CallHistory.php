<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\CallHistory;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class CallHistory extends Model
{
  use AuditingTrait;
  
  protected $table = 'callhistories';

  protected $fillable = ['call_id', 'user_id', 'description', 'status_id'];

  /*todo historico pertence a um chamado*/
  public function call(){
    return $this->belongsto('App\Entities\Call\Call');
  }

  /*todo historico pertence a um status*/
  public function user(){
    return $this->belongsto('App\Entities\User\User');
  }

  /*todo historico pertence a um modo*/
  public function mode(){
    return $this->belongsto('App\Entities\CallMode\CallMode');
  }

  /*todo historico pertence a um status*/
  public function status(){
    return $this->belongsto('App\Entities\CallStatus\CallStatus');
  }

  /*todo historico pode ter um ou mais arquivos*/
  public function files(){
    return $this->hasMany('App\Entities\CallHistoryFile\CallHistoryFile','history_id');
  }
}
