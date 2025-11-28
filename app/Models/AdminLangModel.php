<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminLangModel extends MainModel
{
    protected $table = "admin_lang";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "lang",
        "title",
        "status",
        "pos",
        "deff_lang",
    ];

    protected $useTimestamps = true;
    protected $returnType = 'object';

    public function getLangList()
    {
        return $this->findAll();

    }
}