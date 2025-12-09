<?php

namespace App\Models;

class StatesMLModel extends MainModel
{
    protected $table = "states" . ML_TABLE;
    protected $primaryKey = "id";
    protected $allowedFields = [
        "parent_id",
        "lang",
        "title",
    ];

    protected $returnType = 'object';
}