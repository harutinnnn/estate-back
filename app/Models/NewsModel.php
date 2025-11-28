<?php

namespace App\Models;

class NewsModel extends MainModel
{
    protected $table = "news";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "cat_id",
        "status",
        "img",
        "created_at",
        "updated_at",
    ];

    public function getItem($id, $lang)
    {
        $tblMl = $this->table . ML_TABLE;

        return $this->select("{$this->table}.*, {$tblMl}.title, {$tblMl}.content, {$tblMl}.lang, img")
            ->join($tblMl, "{$this->table}.id = {$tblMl}.parent_id")
            ->where("{$this->table}.id", intval($id))
            ->where("{$tblMl}.lang", $lang)
            ->first();
    }

    public function getAllItems($lang, int $pageNum = 0, $where = false, $order = [])
    {

        $tblMl = $this->table . ML_TABLE;

        $pageNum = $pageNum > 0 ? $pageNum - 1 : 0;

        $query = $this->select("{$this->table}.*, {$tblMl}.title, {$tblMl}.content, {$tblMl}.lang")
            ->join($tblMl, "{$tblMl}.parent_id = {$this->table}.id")
            ->where("{$tblMl}.lang", $lang)
            ->limit(FRONT_PER_PAGE, $pageNum);

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

    protected $useTimestamps = true;

    protected $returnType = 'object';
}