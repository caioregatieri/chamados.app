<?php

namespace App\Entities\PersonalNote;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

use Crypt;

class PersonalNote extends Model
{
    use AuditingTrait;

    protected $table = 'personalnotes';

    protected $fillable = ['user_id', 'title', 'description'];

    /*todo lembrete tem um usuario como dono*/
    public function user(){
    	return $this->belongsTo('App\Entities\User\User');
    }

    /**/
	public function getCreatedAtAttribute($value){
	    return date("d/m/Y H:i:s", strtotime($value));
    }
    
    /**/
	public function getTitleAttribute($value){
	    return Crypt::decrypt($value);
    }

    /**/ 
    public function setTitleAttribute($value){
	    $this->attributes['title'] = Crypt::encrypt($value);
    }
    
    /**/
	public function getDescriptionAttribute($value){
	    return Crypt::decrypt($value);
    }
    
    /**/ 
    public function setDescriptionAttribute($value){
	    $this->attributes['description'] = Crypt::encrypt($value);
	}
}
