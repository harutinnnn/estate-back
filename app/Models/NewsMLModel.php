<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsMLModel extends MainModel
{
    protected $table = "news" . ML_TABLE;
    protected $primaryKey = "id";
    protected $allowedFields = [
        "parent_id",
        "lang",
        "title",
        "content",
        "searchfield",
    ];

    protected $returnType = 'object';
}