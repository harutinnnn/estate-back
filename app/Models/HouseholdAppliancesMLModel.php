<?php

namespace App\Models;

class HouseholdAppliancesMLModel extends MainModel
{
    protected $table = "household_appliances" . ML_TABLE;
    protected $primaryKey = "id";
    protected $allowedFields = [
        "parent_id",
        "lang",
        "title",
    ];

    protected $returnType = 'object';
}