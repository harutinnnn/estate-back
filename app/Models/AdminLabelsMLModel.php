<?php

namespace App\Models;

class AdminLabelsMLModel extends MainModel
{
    protected $table = "admin_labels" . ML_TABLE;
    protected $primaryKey = "id";
    protected $allowedFields = [
        "parent_id",
        "lang",
        "text",
    ];

    protected $returnType = 'object';
}