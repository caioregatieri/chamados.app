<?php

namespace App\Entities\CallHistory;

use CallHistory;

class CallHistoryRepository
{
	private $repository;

	public function __construct(CallHistory $repository){
		$this->repository = $repository;
	}
}