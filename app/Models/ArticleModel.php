<?php

namespace App\Models;

use App\Libraries\PropertyParameters;

class ArticleModel extends MainModel
{

    const TYPE_RENT = 'rent';
    const TYPE_SALE = 'sale';

    protected $table = "articles";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "status",
        "category",
        "property_rent_type",
        "title",
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

    public static function getPropertyTypes()
    {
        return [
            self::TYPE_RENT => translate(self::TYPE_RENT),
            self::TYPE_SALE => translate(self::TYPE_SALE),
        ];

    }

    public static function rules($category, $rentType, $lang = 'en')
    {

        $rules = [
            'property_rent_type' => [
                'rules' => 'required|numeric',
                'label' => translate('property_deal_type')
            ],
            'category' => [
                'rules' => 'required|numeric',
                'label' => translate('property_type')
            ],
            'title' => [
                'rules' => 'required',
                'label' => translate('property_name')
            ],
            'description' => [
                'rules' => 'required',
                'label' => translate('description')
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => translate('price')
            ],
        ];

        if ($rentType == \App\Models\ArticleModel::TYPE_RENT) {
            $rules['prepayment'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getPrepaymentParameters())) . ']',
                'label' => translate('prepayment')
            ];


            if (in_array($category, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_HOUSES])) {

                $rules['utility_payments'] = [
                    'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getUtilityPayments())) . ']',
                    'label' => translate('utility_payments')
                ];
            }

        }

        if (in_array($category, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES])) {

            $rules['rooms'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getRooms())) . ']',
                'label' => translate('rooms')
            ];

            $rules['balcony'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getBalcony())) . ']',
                'label' => translate('balcony')
            ];
        }

        if (in_array($category, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_EVENT_VENUE_RENTAL])) {

            $rules['ceiling_height'] = [
                'rules' => 'required|numeric',
                'label' => translate('ceiling_height')
            ];

        }

        if (in_array($category, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS])) {
            $rules['floor'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getPropertyFloor())) . ']',
                'label' => translate('floor')
            ];
        }

        if (in_array($category, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_ROOMS])) {

            $rules['furniture'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getFurniture())) . ']',
                'label' => translate('furniture')
            ];

            $rules['views_from_windows'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getViewsFromWindows())) . ']',
                'label' => translate('views_from_windows')
            ];

        }


        $rules['state'] = [
            'rules' => 'required|numeric',
            'label' => translate('state')
        ];

        $rules['city'] = [
            'rules' => 'required|numeric',
            'label' => translate('city')
        ];

        if (in_array($category, [CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])) {
            $rules['postal_code'] = [
                'rules' => 'required|numeric',
                'label' => translate('postal_code')
            ];

            $rules['address'] = [
                'rules' => 'required',
                'label' => translate('address')
            ];

            $rules['parking'] = [
                'rules' => 'required|in_list[' . implode(',', array(PropertyParameters::getParkingParams())) . ']',
                'label' => translate('parking')
            ];

        }




        $rules['lat'] = [
            'rules' => 'required|numeric',
            'label' => translate('lat')
        ];

        $rules['lng'] = [
            'rules' => 'required|numeric',
            'label' => translate('lng')
        ];


        $rules['area_size'] = [
            'rules' => 'required|numeric',
            'label' => translate('area_size')
        ];


        $rules['size_prefix'] = [
            'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getAreaUnits())) . ']',
            'label' => translate('size_prefix')
        ];

        if (in_array($category, [CategoryModel::TYPE_HOUSES])) {
            $rules['land_area'] = [
                'rules' => 'required|numeric',
                'label' => translate('land_area')
            ];

            $rules['land_area_size_prefix'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getAreaUnits())) . ']',
                'label' => translate('land_area_size_prefix')
            ];

        }


        if (in_array($category, [CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_APARTMENT])) {

            $rules['bedrooms'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getBadRooms())) . ']',
                'label' => translate('bedrooms')
            ];

            $rules['garages'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getGarages())) . ']',
                'label' => translate('garages')
            ];

            $rules['year_built'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getBuildYears())) . ']',
                'label' => translate('year_built')
            ];


            $rules['building_type'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getBuildingType())) . ']',
                'label' => translate('building_type')
            ];

            $rules['number_of_rooms'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getBadRooms())) . ']',
                'label' => translate('number_of_rooms')
            ];

        }

        if ($category == CategoryModel::TYPE_APARTMENT) {

            $rules['new_building'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getYesNo())) . ']',
                'label' => translate('new_building')
            ];
        }

        if (in_array($category, [CategoryModel::TYPE_APARTMENT, CategoryModel::TYPE_HOUSES, CategoryModel::TYPE_ROOMS, CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE])) {

            $rules['number_of_floors'] = [
                'rules' => 'required|in_list[' . implode(',', array_keys(PropertyParameters::getPropertyFloor())) . ']',
                'label' => translate('number_of_floors')
            ];
        }


        return $rules;
    }

}