<?php

namespace App\Models;

class CommunicationsMLModel extends MainModel
{
    protected $table = "communications" . ML_TABLE;
    protected $primaryKey = "id";
    protected $allowedFields = [
        "parent_id",
        "lang",
        "title",
    ];

    protected $returnType = 'object';
}