<?php
namespace App\Models;

use CodeIgniter\Model;

class ContentMLModel extends MainModel
{
    protected $table = "content" . ML_TABLE;
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