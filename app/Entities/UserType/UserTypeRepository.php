<?php

namespace App\Entities\UserType;

use UserType;

class UserTypeRepository
{
	private $repository;

	public function __construct(UserType $repository){
		$this->repository = $repository;
	}
}