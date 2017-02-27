<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados
*/

namespace App\Entities\Call;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class Call extends Model
{
  use AuditingTrait;

  protected $table = 'calls';

  protected $fillable = ['user_id', 'mode_id', 'place_id', 'requester', 'register', 'title', 'description'];

  /*todo chamado possui um usuario*/
  public function user(){
    return $this->belongsTo('App\Entities\User\User');
  }

  /*todo chamado possui um secretária*/
  public function departament(){
    return $this->place->departament();
  }

  /*todo chamado possui um local*/
  public function place(){
    return $this->belongsTo('App\Entities\Place\Place');
  }

  /*todo chamado diversos historicos*/
  public function history(){
    return $this->hasMany('App\Entities\CallHistory\CallHistory');
  }

  /*todo chamado pode ter um ou mais arquivos*/
  public function files(){
    return $this->hasMany('App\Entities\CallFile\CallFile');
  }

  /*todo chamado possui um ou nenhum status*/
  public function status(){
      return $this->history->last()->status();
  }

  /*todo historico pertence a um modo*/
  public function mode(){
    return $this->belongsto('App\Entities\CallMode\CallMode');
  }

  /**/
  public function getCreatedAtAttribute($value){
    return date("d/m/Y h:i:s", strtotime($value));
  }

  /**/
  public function getUpdatedAtAttribute($value){
    return date("d/m/Y h:i:s", strtotime($value));
  }
}
