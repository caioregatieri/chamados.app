<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\CallFile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class CallFile extends Model
{
	use AuditingTrait;
	use SoftDeletes;

	protected $table = 'callfiles';

	protected $fillable = ['call_id','filename'];

	/*todo arquivo pertence a um historico*/
	public function call(){
		return $this->belongsto('App\Entities\Call\Call');
	}

     /**/
    public function getCreatedAtAttribute($value){
        return date("d/m/Y h:i:s", strtotime($value));
    }
}
