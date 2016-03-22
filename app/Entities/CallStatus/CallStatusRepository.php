<?php

namespace App\Entities\CallStatus;

use CallStatus;

class CallStatusRepository
{
	private $repository;

	public function __construct(CallStatus $repository){
		$this->repository = $repository;
	}
}