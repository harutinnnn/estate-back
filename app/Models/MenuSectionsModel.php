<?php
namespace App\Models;

class MenuSectionsModel extends MainModel
{
    protected $table = "menu_sections";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "title",
        "url",
        "status",
    ];

    protected $returnType = 'object';

    public function getLangList()
    {
        return $this->findAll();
    }
}