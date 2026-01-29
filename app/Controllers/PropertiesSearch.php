<?php

namespace App\Controllers;

use App\Models\AmenitiesModel;
use App\Models\CategoryModel;

class PropertiesSearch extends MainController
{


    public function index(): string|\CodeIgniter\HTTP\RedirectResponse
    {


        $amenitiesModel = new AmenitiesModel();
        $this->pageData['amenities'] = $amenitiesModel->getAllItems($this->_lang);

        $categoriesModel = new CategoryModel();
        $this->pageData['categories'] = $categoriesModel->getAllItems($this->_lang, 0, [], ['col' => 'pos', 'sort' => 'ASC']);


        $this->currentView = 'properties-search/index';
        return $this->render();

    }
}
