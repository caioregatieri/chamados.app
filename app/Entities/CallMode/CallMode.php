<?php

namespace App\Entities\CallMode;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class CallMode extends Model
{
  use AuditingTrait;
  
  protected $table = 'callmodes';

  protected $fillable = ['name'];

  /*todo modo possui diversos chamados*/
  public function call(){
    return $this->hasMany('App\Entities\Call\Call');
  }
}
