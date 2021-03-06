<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\Departament;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Departament extends Model
{
	use AuditingTrait;
	use SoftDeletes;

	protected $table = 'departaments';

	protected $fillable = ['name', 'responsable'];

	/*todo departameto possui diversos locais*/
	public function place(){
		return $this->hasMany('App\Entities\Place\Place');
	}

    /**/
    public function getCreatedAtAttribute($value){
        return date("d/m/Y H:i:s", strtotime($value));
    }
}
