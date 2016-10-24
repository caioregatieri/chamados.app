<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\UserType;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class UserType extends Model
{
	use AuditingTrait;

  	protected $table = 'usertypes';

  	protected $fillable = ['name','administrator','onlyyourplace'];

	/*todo tipo de usuario possui diversos usuarios*/
	public function user(){
		return $this->hasMany('App\Entities\User\User');
	}
    
    /**/
    public function getCreatedAtAttribute($value){
        return date("d/m/Y h:i:s", strtotime($value));
    }
}
