<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\CallStatus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class CallStatus extends Model
{
	use AuditingTrait;
	use SoftDeletes;

	protected $table = 'callstatuses';

	protected $fillable = ['name','color','isstart','isend'];

	/*todo status possui um chamado*/
	public function call(){
		return $this->hasMany('App\Entities\Call\Call');
	}
    
    /**/
    public function getCreatedAtAttribute($value){
        return date("d/m/Y H:i:s", strtotime($value));
    }
}
