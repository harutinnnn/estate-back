<?php

namespace App\Models;

class AdminLabelsModel extends MainModel
{
    protected $table = "admin_labels";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "key",
        "type",
    ];

    public function getItem($id, $lang)
    {
        $tblMl = $this->table . ML_TABLE;

        return $this->select("{$this->table}.*, {$tblMl}.text, {$tblMl}.lang")
            ->join($tblMl, "{$tblMl}.parent_id = posts.id")
            ->where("{$tblMl}.id", intval($id))
            ->where("{$tblMl}.lang", $lang)
            ->first();
    }

    public function getAllItems($lang, $pageNum = 0, $perPage = 0)
    {

        $tblMl = $this->table . ML_TABLE;


        return $this->select("{$this->table}.*, {$tblMl}.text, {$tblMl}.lang")
            ->join($tblMl, "{$tblMl}.parent_id = {$this->table}.id")
            ->where("{$tblMl}.lang", $lang)
            ->orderBy("{$this->table}.id", 'DESC')
            ->findAll();


    }

    protected $returnType = 'object';
}