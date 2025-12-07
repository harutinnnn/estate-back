<?php

namespace App\Models;

class CityModel extends MainModel
{
    protected $table = "cities";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "status",
        "pid",
        "created_at",
        "updated_at",
    ];

    public function getItem($id, $lang)
    {
        $tblMl = $this->table . ML_TABLE;

        return $this->select("{$this->table}.*, {$tblMl}.title, {$tblMl}.lang")
            ->join($tblMl, "{$this->table}.id = {$tblMl}.parent_id")
            ->where("{$this->table}.id", intval($id))
            ->where("{$tblMl}.lang", $lang)
            ->first();
    }

    public function getAllItems($lang, int $pageNum = 0, $where = false, $order = [])
    {

        $tblMl = $this->table . ML_TABLE;

        $pageNum = $pageNum > 0 ? $pageNum - 1 : 0;

        $query = $this->select("{$this->table}.*, {$tblMl}.title, {$tblMl}.lang")
            ->join($tblMl, "{$tblMl}.parent_id = {$this->table}.id")
            ->where("{$tblMl}.lang", $lang);

        if ($pageNum) {
            $query->limit(FRONT_PER_PAGE, $pageNum);
        }

        if ($where) {
            $query->where($where);
        }

        if (isset($order['col']) && isset($order['sort'])) {
            $query->orderBy($order['col'], $order['sort']);
        } else {
            $query->orderBy("{$this->table}.id", 'DESC');

        }

        return $query->findAll();

    }

    protected $useTimestamps = false;

    protected $returnType = 'object';
}