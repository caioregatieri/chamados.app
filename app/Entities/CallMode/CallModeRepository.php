<?php

namespace App\Entities\CallMode;

use CallMode;

class CallModeRepository
{
	private $repository;

	public function __construct(CallMode $repository){
		$this->repository = $repository;
	}
}