<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\CallFile;

use CallFile;

class CallHistoryFileRepository
{
	private $repository;

	public function __construct(CallHistoryfile $repository){
		$this->repository = $repository;
	}
}