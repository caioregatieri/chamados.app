<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\UserType;

use UserType;

class UserTypeRepository
{
	private $repository;

	public function __construct(UserType $repository){
		$this->repository = $repository;
	}
}