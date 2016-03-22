<?php

namespace App\Entities\CallFile;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class CallFile extends Model
{
  use AuditingTrait;
  
  protected $table = 'callfiles';

  protected $fillable = ['call_id','filename'];

  /*todo arquivo pertence a um historico*/
  public function call(){
    return $this->belongsto('App\Entities\Call\Call');
  }
}
