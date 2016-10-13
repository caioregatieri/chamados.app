<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\Departament;

use Departament;

class DepartamentRepository
{
	private $repository;

	public function __construct(Departament $repository){
		$this->repository = $repository;
	}
}