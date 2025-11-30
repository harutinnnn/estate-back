<?php

namespace App\Models;

class CategoryMLModel extends MainModel
{
    protected $table = "categories" . ML_TABLE;
    protected $primaryKey = "id";
    protected $allowedFields = [
        "parent_id",
        "lang",
        "title",
    ];

    protected $returnType = 'object';
}