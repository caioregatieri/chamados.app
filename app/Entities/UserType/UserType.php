<?php

namespace App\Entities\UserType;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{

  protected $table = 'usertypes';

  protected $fillable = ['name','administrator','onlyyourplace'];

  /*todo tipo de usuario possui diversos usuarios*/
  public function user(){
    return $this->hasMany('App\Entities\User\User');
  }
}
