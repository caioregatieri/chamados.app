<?php

namespace App\Entities\Reminder;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class Reminder extends Model
{
    use AuditingTrait;

    protected $table = 'reminders';

    protected $fillable = ['user_id', 'title', 'description'];

    /*todo lembrete tem um usuario como dono*/
    public function user(){
    	return $this->belongsTo('App\Entities\User\User');
    }

    /**/
	public function getCreatedAtAttribute($value){
	    return date("d/m/Y h:i:s", strtotime($value));
	}
}
