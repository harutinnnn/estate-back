<?php

namespace App\Models;

class AmenitiesLcpModel extends MainModel
{


    protected $table = "amenities_lcp";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "article_id",
        "amenity_id",
    ];

    protected $returnType = 'object';
}