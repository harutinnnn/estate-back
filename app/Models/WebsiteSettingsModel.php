<?php

namespace App\Models;

use CodeIgniter\Model;

class WebsiteSettingsModel extends MainModel
{
    protected $table = "website_settings";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "key",
        "val",
        "title",
    ];

    protected $returnType = 'object';

    public function getList()
    {
        return $this->findAll();

    }
}