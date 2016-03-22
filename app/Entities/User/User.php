<?php

namespace App\Entities\User;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use OwenIt\Auditing\AuditingTrait;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use AuditingTrait;

    protected $table = 'users';

    protected $fillable = ['usertype_id', 'place_id', 'name', 'register', 'email', 'password', 'locked'];

    protected $hidden = ['password', 'remember_token'];

    /*todo usuario possui um tipo*/
    public function usertype(){
      return $this->belongsTo('App\Entities\UserType\UserType');
    }

    /*todo usuario possui um local*/
    public function place(){
      return $this->belongsTo('App\Entities\Place\Place');
    }

    /*todo usuario pode possuir varios logins*/
    public function logins(){
      return $this->hasMany('App\Entities\Login\Login');
    }
}
