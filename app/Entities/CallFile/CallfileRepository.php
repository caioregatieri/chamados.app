<?php

namespace App\Entities\CallFile;

use CallFile;

class CallHistoryFileRepository
{
	private $repository;

	public function __construct(CallHistoryfile $repository){
		$this->repository = $repository;
	}
}