<?php

namespace App\Models;

use App\Libraries\PropertyParameters;
use CodeIgniter\HTTP\CLIRequest;
use PHPUnit\Exception;

class ArticleModel extends MainModel
{

    const TYPE_RENT = 'rent';
    const TYPE_SALE = 'sale';

    protected $table = "articles";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "user_id", "status", "category", "title",
        "property_rent_type", "description", "price", "prepayment",
        "rooms", "ceiling_height", "floor", "balcony", "utility_payments",
        "furniture", "views_from_windows", "state", "city",
        "postal_code", "address", "lat", "lng", "area_size",
        "size_prefix", "land_area", "land_area_size_prefix", "bedrooms",
        "bathrooms", "garages", "year_built", "new_building", "number_of_floors",
        "building_type", "parking", "parking", "created_at", "updated_at",
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

    public function getAllItems($pageNum = 0, $where = false, $order = [])
    {

        $tblMl = $this->table . ML_TABLE;

        $pageNum = $pageNum > 0 ? $pageNum - 1 : 0;

        $query = $this->select("*");

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

    public static function saveArticle($request, int $userId, int $lid = 0): int
    {

        $propertyType = session()->get('property-type');

        try {

            $model = new ArticleModel();

            $categoryModel = new CategoryModel();
            $category = $categoryModel->where('id', intval($propertyType))->first();

            $data = [
                'user_id' => $userId,
                'category' => $request->getPost('category'),
                'property_rent_type' => $request->getPost('property_rent_type'),
                'title' => $request->getPost('title'),
                'description' => $request->getPost('description'),
                'price' => intval($request->getPost('price')),
                'state' => intval($request->getPost('state')),
                'city' => intval($request->getPost('city')),
                'lat' => ($request->getPost('lat')),
                'lng' => ($request->getPost('lng')),
                'area_size' => ($request->getPost('area_size')),
                'size_prefix' => ($request->getPost('size_prefix')),
            ];


            if ($request->getPost('property_rent_type') == self::TYPE_RENT) {
                $data['prepayment'] = $request->getPost('prepayment');
            }


            switch ($category->cat_key) {

                case CategoryModel::TYPE_APARTMENT;

                    $data['rooms'] = $request->getPost('rooms');
                    $data['ceiling_height'] = $request->getPost('ceiling_height');
                    $data['floor'] = $request->getPost('floor');
                    $data['balcony'] = $request->getPost('balcony');
                    $data['furniture'] = $request->getPost('furniture');
                    $data['views_from_windows'] = $request->getPost('views_from_windows');
                    $data['postal_code'] = $request->getPost('postal_code');
                    $data['address'] = $request->getPost('address');
                    $data['bedrooms'] = $request->getPost('bedrooms');
                    $data['garages'] = $request->getPost('garages');
                    $data['year_built'] = $request->getPost('year_built');
                    $data['new_building'] = $request->getPost('new_building');
                    $data['number_of_floors'] = $request->getPost('number_of_floors');
                    $data['building_type'] = $request->getPost('building_type');
                    $data['bathrooms'] = $request->getPost('bathrooms');
                    $data['parking'] = $request->getPost('parking');

                    if ($request->getPost('property_rent_type') == self::TYPE_RENT) {
                        $data['utility_payments'] = $request->getPost('utility_payments');
                    }


                    break;
                case CategoryModel::TYPE_HOUSES;

                    $data['rooms'] = $request->getPost('rooms');
                    $data['ceiling_height'] = $request->getPost('ceiling_height');
                    $data['balcony'] = $request->getPost('balcony');
                    $data['furniture'] = $request->getPost('furniture');
                    $data['views_from_windows'] = $request->getPost('views_from_windows');
                    $data['postal_code'] = $request->getPost('postal_code');
                    $data['address'] = $request->getPost('address');

                    $data['land_area'] = $request->getPost('land_area');
                    $data['land_area_size_prefix'] = $request->getPost('land_area_size_prefix');

                    $data['bedrooms'] = $request->getPost('bedrooms');
                    $data['garages'] = $request->getPost('garages');
                    $data['year_built'] = $request->getPost('year_built');
                    $data['number_of_floors'] = $request->getPost('number_of_floors');
                    $data['building_type'] = $request->getPost('building_type');
                    $data['bathrooms'] = $request->getPost('bathrooms');
                    $data['parking'] = $request->getPost('parking');

                    if ($request->getPost('property_rent_type') == self::TYPE_RENT) {
                        $data['utility_payments'] = $request->getPost('utility_payments');
                    }

                    break;
                case CategoryModel::TYPE_ROOMS;

                    $data['ceiling_height'] = $request->getPost('ceiling_height');
                    $data['floor'] = $request->getPost('floor');
                    $data['furniture'] = $request->getPost('furniture');
                    $data['views_from_windows'] = $request->getPost('views_from_windows');
                    $data['postal_code'] = $request->getPost('postal_code');
                    $data['address'] = $request->getPost('address');
                    $data['number_of_floors'] = $request->getPost('number_of_floors');
                    $data['parking'] = $request->getPost('parking');

                    if ($request->getPost('property_rent_type') == self::TYPE_RENT) {
                        $data['utility_payments'] = $request->getPost('utility_payments');
                    }

                    break;
                case CategoryModel::TYPE_COMMERCIAL_REAL_ESTATE;
                    $data['postal_code'] = $request->getPost('postal_code');
                    $data['address'] = $request->getPost('address');
                    $data['number_of_floors'] = $request->getPost('number_of_floors');

                    break;

                case CategoryModel::TYPE_LAND_PLOT;

                    break;

                case CategoryModel::TYPE_GARAGES_AND_PARKING;

                    break;
                case CategoryModel::TYPE_BOOTHS_AND_KIOSKS;


                    break;
                case CategoryModel::TYPE_EVENT_VENUE_RENTAL;

                    $data['ceiling_height'] = $request->getPost('ceiling_height');
                    $data['postal_code'] = $request->getPost('postal_code');
                    $data['parking'] = $request->getPost('parking');
                    break;
            }


            if ($lid) {

                $model->update($lid, $data);

            } else {

                $lid = $model->insert($data);
            }

            if ($lid) {


                //TODO household_appliances_lcp
                $household_appliances_lcp_model = new HouseholdAppliancesLcpModel();

                if (!empty($request->getPost('household_appliances'))) {
                    foreach ($request->getPost('household_appliances') as $key => $value) {
                        $household_appliances_lcp_model->insert([
                            'article_id' => $lid,
                            'household_appliance_id' => $value
                        ]);
                    }
                }

                //TODO amenities_lcp
                $amenities_lcp_model = new AmenitiesLcpModel();

                if (!empty($request->getPost('amenities'))) {
                    foreach ($request->getPost('amenities') as $key => $value) {
                        $amenities_lcp_model->insert([
                            'article_id' => $lid,
                            'amenity_id' => $value
                        ]);
                    }
                }


                //TODO communications_lcp
                $communications_lcp_model = new CommunicationsLcpModel();

                if (!empty($request->getPost('communications'))) {
                    foreach ($request->getPost('communications') as $key => $value) {
                        $communications_lcp_model->insert([
                            'article_id' => $lid,
                            'communication_id' => $value
                        ]);
                    }
                }


            }


        } catch (Exception $e) {

        }

        return $lid;

    }

    public static function rules($category, $rentType, $lang = 'en', $articleId)
    {

        $rules = [
            'property_rent_type' => [
                'rules' => 'required',
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


        if ($articleId) {

            $articleIMagesModel = new ArticleImages();
            $articleIMages = $articleIMagesModel->select('id')->where(['article_id' => intval($articleId)]);

            if (empty($articleIMages)) {
                $rules['images'] = [
                    'rules' => 'isHaveImage',
                    'label' => translate('sadasd')
                ];
            }

        } else {

            $rules['images'] = [
                'rules' => 'isHaveImage',
                'label' => translate('sadasd')
            ];
        }
        /*$rules = [
            'images' => 'isHaveImage',
        ];*/

        return $rules;
    }

}