<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\CallMode;

use CallMode;

class CallModeRepository
{
	private $repository;

	public function __construct(CallMode $repository){
		$this->repository = $repository;
	}
}