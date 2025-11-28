<?php

namespace App\Models;

class FrontendLabelsModel extends MainModel
{
    protected $table = "frontend_labels";
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

    public function getItemByKey($key, $lang)
    {
        $tblMl = $this->table . ML_TABLE;

        return $this->select("{$this->table}.*, {$tblMl}.text, {$tblMl}.lang")
            ->join($tblMl, "{$tblMl}.parent_id = {$this->table}.id")
            ->where("{$this->table}.key", $key)
            ->where("{$tblMl}.lang", $lang)
            ->first();
    }

    public function getAllItems($lang, $pageNum = 0, $perPage = 0, $where = false)
    {
        $tblMl = $this->table . ML_TABLE;

        $query = $this->select("{$this->table}.*, {$tblMl}.text, {$tblMl}.lang")
            ->join($tblMl, "{$tblMl}.parent_id = {$this->table}.id")
            ->where("{$tblMl}.lang", $lang)->orderBy("{$this->table}.id", 'DESC');
        if ($where) {
            $query->where($where);
        }

        return $query->findAll();
    }

    protected $returnType = 'object';
}