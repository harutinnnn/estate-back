<?php

namespace App\Models;

class CityMLModel extends MainModel
{
    protected $table = "cities" . ML_TABLE;
    protected $primaryKey = "id";
    protected $allowedFields = [
        "parent_id",
        "lang",
        "title",
    ];

    protected $returnType = 'object';
}