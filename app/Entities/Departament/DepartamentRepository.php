<?php

namespace App\Entities\Departament;

use Departament;

class DepartamentRepository
{
	private $repository;

	public function __construct(Departament $repository){
		$this->repository = $repository;
	}
}