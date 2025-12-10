<?php

namespace App\Models;

class CategoryModel extends MainModel
{
    protected $table = "categories";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "status",
        "pos",
        "slug",
        "cat_key",
        "created_at",
        "updated_at",
    ];


    const TYPE_APARTMENT = 'apartment';
    const TYPE_HOUSES = 'houses';
    const TYPE_ROOMS = 'rooms';
    const TYPE_COMMERCIAL_REAL_ESTATE = 'commercial_real_estate';
    const TYPE_LAND_PLOT = 'land_plot';
    const TYPE_GARAGES_AND_PARKING = 'garages_and_parking';
    const TYPE_BOOTHS_AND_KIOSKS = 'booths_and_kiosks';
    const TYPE_EVENT_VENUE_RENTAL = 'event_venue_rental';


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

    protected $useTimestamps = true;

    protected $returnType = 'object';
}