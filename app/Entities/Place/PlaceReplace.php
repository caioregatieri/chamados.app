<?php

namespace App\Entities\Place;

use Place;

class PlaceRepository
{
	private $repository;

	public function __construct(Place $repository){
		$this->repository = $repository;
	}
}