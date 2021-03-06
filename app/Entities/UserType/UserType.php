<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados
*/

namespace App\Entities\UserType;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class UserType extends Model
{
	use AuditingTrait;
	use SoftDeletes;

  	protected $table = 'usertypes';

  	protected $fillable = ['name','administrator','onlyyourplace'];

	/*todo tipo de usuario possui diversos usuarios*/
	public function users(){
		return $this->hasMany('App\Entities\User\User','usertype_id','id');
	}

    /**/
    public function getCreatedAtAttribute($value){
        return date("d/m/Y H:i:s", strtotime($value));
    }
}
