<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends MainModel
{
    protected $table = "tags";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "tag",
    ];

    protected $returnType = 'object';

    public function getList()
    {
        return $this->findAll();

    }
}