<?php

namespace App\Models;

class CommunicationsLcpModel extends MainModel
{


    protected $table = "communications_lcp";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "article_id",
        "communication_id",
    ];

    protected $returnType = 'object';
}