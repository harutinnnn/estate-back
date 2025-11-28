<?php

namespace App\Models;

class NewsCategoryMLModel extends MainModel
{
    protected $table = "news_categories" . ML_TABLE;
    protected $primaryKey = "id";
    protected $allowedFields = [
        "parent_id",
        "lang",
        "title",
    ];

    protected $returnType = 'object';
}