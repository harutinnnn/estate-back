<?php
namespace App\Models;

use CodeIgniter\Model;

class FrontendLabelsMLModel extends MainModel
{
    protected $table = "frontend_labels" . ML_TABLE;
    protected $primaryKey = "id";
    protected $allowedFields = [
        "parent_id",
        "lang",
        "text",
    ];

    protected $returnType = 'object';
}