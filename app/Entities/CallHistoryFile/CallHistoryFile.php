<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\CallHistoryFile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class CallHistoryFile extends Model
{
  use AuditingTrait;
  use SoftDeletes;
  
  protected $table = 'callhistoryfiles';

  protected $fillable = ['history_id','filename'];

  /*todo arquivo pertence a um historico*/
  public function history(){
    return $this->belongsto('App\Entities\CallHistory\CallHistory');
  }
}
