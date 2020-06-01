<?php

namespace App\Repositories;

class BaseRepository {

    public function __construct($model) {
        $this->model = $model;
    }

}