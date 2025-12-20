<?php

namespace App\Models;

class AmenitiesMLModel extends MainModel
{
    protected $table = "amenities" . ML_TABLE;
    protected $primaryKey = "id";
    protected $allowedFields = [
        "parent_id",
        "lang",
        "title",
    ];

    protected $returnType = 'object';
}