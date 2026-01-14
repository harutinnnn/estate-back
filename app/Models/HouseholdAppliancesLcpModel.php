<?php

namespace App\Models;

class HouseholdAppliancesLcpModel extends MainModel
{


    protected $table = "household_appliances_lcp";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "article_id",
        "household_appliance_id",
    ];

    protected $returnType = 'object';
}