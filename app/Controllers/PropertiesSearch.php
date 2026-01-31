<?php

namespace App\Controllers;

use App\Models\AmenitiesModel;
use App\Models\ArticleImages;
use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\CityModel;
use App\Models\StatesModel;

class PropertiesSearch extends MainController
{
    public $categories = [];
    public $amenities = [];
    public $states = [];
    public $cities = [];

    public function __construct()
    {
        parent::__construct();

        $categoriesModel = new CategoryModel();
        $this->categories = $categoriesModel->getAllItems($this->_lang, 0, [], ['col' => 'pos', 'sort' => 'ASC']);
        $this->pageData['categories'] = $this->categories;
        $this->pageData['categories_list'] = array_column($this->categories, 'title', 'id');
        $this->pageData['categories_map'] = array_column($this->categories, 'cat_key', 'id');


        $amenitiesModel = new AmenitiesModel();
        $this->amenities = $amenitiesModel->getAllItems($this->_lang);
        $this->pageData['amenities'] = array_column($this->amenities, 'title', 'id');

        $statesModel = new StatesModel();
        $this->states = $statesModel->getAllItems($this->_lang);
        $this->pageData['states'] = array_column($this->states, 'title', 'id');

        $citiesModel = new CityModel();
        $this->cities = $citiesModel->getAllItems($this->_lang);
        $this->pageData['cities'] = array_column($this->cities, 'title', 'id');

    }


    public function index(): string|\CodeIgniter\HTTP\RedirectResponse
    {

        $amenitiesModel = new AmenitiesModel();
        $this->pageData['amenities'] = $amenitiesModel->getAllItems($this->_lang);


        $propertiesModel = new ArticleModel();

        $properties = $propertiesModel->articlesSearch();
//        dd($properties);

//        $properties = $propertiesModel->orderBy('created_at', 'DESC')->findAll();
//        $articleImageModel = new ArticleImages();

//        foreach ($properties as $property) {
//
//            $images = $articleImageModel->select('*')->where(['article_id' => $property->id])->orderBy('pos', 'ASC')->first();
//            $property->images = $images;
//        }

        $this->pageData['properties'] = $properties;

        $this->currentView = 'properties-search/index';
        return $this->render();

    }
}
