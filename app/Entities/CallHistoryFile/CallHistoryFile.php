<?php

namespace App\Entities\CallHistoryFile;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class CallHistoryFile extends Model
{
  use AuditingTrait;
  
  protected $table = 'callhistoryfiles';

  protected $fillable = ['history_id','filename'];

  /*todo arquivo pertence a um historico*/
  public function history(){
    return $this->belongsto('App\Entities\CallHistory\CallHistory');
  }
}
