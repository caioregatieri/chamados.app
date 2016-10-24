<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

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
	
	 /**/
	public function getCreatedAtAttribute($value){
	    return date("d/m/Y h:i:s", strtotime($value));
	}
}
