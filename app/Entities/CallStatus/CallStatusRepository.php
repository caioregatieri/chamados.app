<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\CallStatus;

use CallStatus;

class CallStatusRepository
{
	private $repository;

	public function __construct(CallStatus $repository){
		$this->repository = $repository;
	}
}