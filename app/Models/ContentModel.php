<?php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends MainModel
{
    protected $table = "content";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "status",
        "img",
        "created_at",
        "updated_at",
    ];

    public function getItem($id, $lang)
    {
        $tblMl = $this->table . ML_TABLE;

        return $this->select("t.*,tML.*")
            ->from("{$this->table} t")
            ->join("$tblMl tML", "tML.parent_id = t.id")
            ->where("t.id", $id)
            ->where("tML.lang", $lang)
            ->first();

    }

    public function getAllItems($lang, int $pageNum = 0, $query = false)
    {

        $tblMl = $this->table . ML_TABLE;

        $pageNum = $pageNum > 0 ? $pageNum - 1 : 0;

        $query = $this->select("{$this->table}.*, {$tblMl}.title, {$tblMl}.content, {$tblMl}.lang")
            ->join($tblMl, "{$tblMl}.parent_id = {$this->table}.id")
            ->where("{$tblMl}.lang", $lang)->orderBy("{$this->table}.id", 'DESC')
            ->limit(ADMIN_PER_PAGE, $pageNum);

        return $query->findAll();

    }

    protected $useTimestamps = true;

    protected $returnType = 'object';
}