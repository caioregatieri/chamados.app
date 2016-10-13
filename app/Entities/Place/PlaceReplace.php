<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\Place;

use Place;

class PlaceRepository
{
	private $repository;

	public function __construct(Place $repository){
		$this->repository = $repository;
	}
}