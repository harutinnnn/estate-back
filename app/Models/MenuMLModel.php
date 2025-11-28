<?php
namespace App\Models;

class MenuMLModel extends MainModel
{
    protected $table = "menu" . ML_TABLE;
    protected $primaryKey = "id";
    protected $allowedFields = [
        "parent_id",
        "lang",
        "meta_title",
        "meta_desc",
        "meta_keywords",
        "title",
        "url"
    ];

    protected $returnType = 'object';
}