<?php

namespace App\Entities\CallStatus;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class CallStatus extends Model
{
  use AuditingTrait;
  
  protected $table = 'callstatuses';

  protected $fillable = ['name','color','isstart','isend'];

  /*todo status possui um chamado*/
  public function call(){
    return $this->hasMany('App\Entities\Call\Call');
  }
}
