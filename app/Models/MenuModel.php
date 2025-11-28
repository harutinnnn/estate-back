<?php

namespace App\Models;

class MenuModel extends MainModel
{
    protected $table = "menu";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "section_id",
        "show",
        "pid",//parent ID
        "cid",//content ID
        "pos",
        "status",
        "url",
        "img",
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

    public function getItemByUrl($slug, $lang)
    {
        $tblMl = $this->table . ML_TABLE;

        return $this->select("t.*,tML.*")
            ->from("{$this->table} t")
            ->join("$tblMl tML", "tML.parent_id = t.id")
            ->where("tML.url", $slug)
            ->where("tML.lang", $lang)
            ->first();
    }

    public function getAllItems($lang, $pageNum = 0, $perPage = 0, $where = [], $order = false)
    {

        $builder = $this->db->table("{$this->table} t");
        $builder->select("t.*, tML.title, tML.lang, tML.url")
            ->join("menu_ml tML", "t.id = tML.parent_id AND tML.lang = '{$lang}'", 'inner')
            ->where($where)
            ->orderBy("t.pos", 'ASC');


        if (isset($order['col']) && isset($order['sort'])) {
            $builder->orderBy($order['col'], $order['sort']);
        } else {
            $builder->orderBy("t.id", 'DESC');
        }

        return $builder->get()->getResult();
    }

    protected $returnType = 'object';
}