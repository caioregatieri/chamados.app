<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\Place;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class Place extends Model
{
    use AuditingTrait;
    
    protected $table = 'places';

    protected $fillable = ['departament_id', 'name', 'prefix', 'neighborhood', 'address', 'number', 'telephone1', 'telephone2', 'responsavel', 'email', 'lat', 'lon', 'region', 'note'];

    /*todo lugar possui um departamento(secretaria)*/
    public function departament(){
      return $this->belongsto('App\Entities\Departament\Departament');
    }

    /*todo lugar possui diversos usuarios*/
    public function user(){
      return $this->hasMany('App\Entities\User\User');
    }
}
