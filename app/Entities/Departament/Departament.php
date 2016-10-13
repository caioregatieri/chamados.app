<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\Departament;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class Departament extends Model
{
  use AuditingTrait;
  
  protected $table = 'departaments';

  protected $fillable = ['name'];

  /*todo departameto possui diversos locais*/
  public function place(){
    return $this->hasMany('App\Entities\Place\Place');
  }

}
