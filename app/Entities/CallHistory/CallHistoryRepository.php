<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\CallHistory;

use CallHistory;

class CallHistoryRepository
{
	private $repository;

	public function __construct(CallHistory $repository){
		$this->repository = $repository;
	}
}