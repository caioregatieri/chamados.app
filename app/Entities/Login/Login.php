<?php

namespace App\Entities\Login;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
  protected $table = 'login_logs';

  protected $fillable = ['user_id', 'ip', 'method'];

  /*todo login pertence a um usuario*/
  public function user(){
    return $this->belongsto('App\Entities\User\User');
  }
}
