<?php

namespace App\Models;

class PostsModel extends MainModel
{
    protected $table = "posts";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "status",
        "lang",
        "cat_id",
        "related_id",
        "title",
        "editor_json_data",
        "content",
        "searchfield",
        "slug",
        "img",
        "created_at",
        "updated_at",
    ];

    protected $useTimestamps = true;
    protected $returnType = 'object';

    public function getItem($id, $lang)
    {
        $tblMl = $this->table . ML_TABLE;

        return $this->select("{$this->table}.*, {$tblMl}.title, {$tblMl}.content, {$tblMl}.lang, img")
            ->join($tblMl, "{$this->table}.id = {$tblMl}.parent_id")
            ->where("{$this->table}.id", intval($id))
            ->where("{$tblMl}.lang", $lang)
            ->first();
    }

    public function postsPagination($where = [], $order = false)
    {

        $this->select('*');

        if (!empty($where)) {
            $this->where($where);
        }

        if (isset($order['col']) && isset($order['sort'])) {
            $this->orderBy($order['col'], $order['sort']);
        }

        $data['items'] = $this->paginate(FRONT_PER_PAGE);

        // Create pager links
        $data['pager'] = $this->pager;

        return $data;

    }
}