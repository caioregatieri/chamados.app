<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\User;

use User;

class UserRepository
{
	private $repository;

	public function __construct(User $repository){
		$this->repository = $repository;
	}
}