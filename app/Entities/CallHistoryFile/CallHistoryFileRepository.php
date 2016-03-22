<?php

namespace App\Entities\CallHistoryFile;

use CallHistoryFile;

class CallHistoryFileRepository
{
	private $repository;

	public function __construct(CallHistoryfile $repository){
		$this->repository = $repository;
	}
}