<?php
namespace App\Models;

use CodeIgniter\Model;

class LangModel extends MainModel
{
    protected $table = "lang";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "lang",
        "title",
        "status",
        "pos",
    ];

    protected $useTimestamps = true;
    protected $returnType = 'object';

    public function getLangList()
    {
        return $this->findAll();

    }
}