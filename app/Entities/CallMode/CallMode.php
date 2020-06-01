<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\CallMode;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class CallMode extends Model
{
	use AuditingTrait;
	use SoftDeletes;

	protected $table = 'callmodes';

	protected $fillable = ['name'];

	/*todo modo possui diversos chamados*/
	public function call(){
		return $this->hasMany('App\Entities\Call\Call');
	}

	/*todo tipo de chamado tem seus responsaveis*/
	public function responsibles(){
		return $this->belongsToMany('App\Entities\User\User', 'callmode_user', 'callmode_id', 'user_id');
	}
	
	 /**/
	public function getCreatedAtAttribute($value){
	    return date("d/m/Y H:i:s", strtotime($value));
	}
}
