<?php

namespace App\Entities\User;

use User;

class UserRepository
{
	private $repository;

	public function __construct(User $repository){
		$this->repository = $repository;
	}
}