<?php

namespace App\Controllers;

use App\Models\AmenitiesLcpModel;
use App\Models\AmenitiesModel;
use App\Models\ArticleImages;
use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\CommunicationsLcpModel;
use App\Models\CommunicationsModel;
use App\Models\HouseholdAppliancesLcpModel;
use App\Models\HouseholdAppliancesModel;
use App\Models\StatesModel;

class Properties extends MainController
{


    public function create(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (!isset($this->userData->id)) {
            return redirect()->to($this->_lang . '/sign-in')->send();
        }


        $categoriesModel = new CategoryModel();
        $categories = $categoriesModel->getAllItems($this->_lang, 0, [], ['col' => 'pos', 'sort' => 'ASC']);
        $this->pageData['categories'] = array_column($categories, 'title', 'id');


        $validationRules = [
            'property-type' => [
                'rules' => 'required|numeric',
                'label' => 'Property'
            ],
            'property-rent-type' => [
                'rules' => 'required',
                'label' => 'property-rent-type'
            ]
        ];

        if ($this->request->getPost('submit')) {

            if ($this->validate($validationRules)) {


                session()->set('property-type', $this->request->getPost('property-type'));
                session()->set('property-rent-type', $this->request->getPost('property-rent-type'));

                return redirect()->to($this->_lang . '/user/create-step-2')->send();

            } else {
                $this->pageData['validation'] = $this->validator;
            }
        }


        $this->pageData['activeMenu'] = 'create';
        $this->currentView = 'properties/create_step_1';
        return $this->render('admin');
    }

    public function create_step_2(): string|\CodeIgniter\HTTP\RedirectResponse
    {

        if (!isset($this->userData->id)) {
            return redirect()->to($this->_lang . '/sign-in')->send();
        }

        if (!session()->get('property-type') || !session()->get('property-rent-type')) {
            return redirect()->to($this->_lang . '/user/create')->send();
        } else {
            $this->pageData['propertyType'] = session()->get('property-type');
            $this->pageData['propertyRentType'] = session()->get('property-rent-type');
        }

        if ($this->request->getPost('submit')) {

            if ($this->validate(ArticleModel::rules($this->pageData['propertyType'], $this->pageData['propertyRentType'], $this->_lang))) {

                if ($artId = ArticleModel::saveArticle($this->request, $this->userData->id)) {

                    //Images Base64 save in db and str to img
                    if ($this->request->getPost('images') && count($this->request->getPost('images')) > 0) {
                        foreach ($this->request->getPost('images') as $image) {
                            $artImgId = ArticleImages::saveArticleImage($artId, $image, $this->userData->id);
                        }
                    }

                }


                return redirect()->to($this->_lang . '/user/properties')->send();

            } else {
                $this->pageData['validation'] = $this->validator;
            }
        }


        $amenitiesModel = new AmenitiesModel();
        $amenities = [];
        $amenitiesTmp = $amenitiesModel->getAllItems($this->_lang, 0, [], ['col' => 'id', 'sort' => 'ASC']);

        foreach ($amenitiesTmp as $amenity) {

            if (!isset($amenities[$amenity->type])) {
                $amenities[$amenity->type] = [];
            }

            $amenities[$amenity->type][$amenity->id] = $amenity->title;
        }

        $this->pageData['amenities'] = $amenities;


        $householdAppliancesModel = new HouseholdAppliancesModel();
        $householdAppliances = $householdAppliancesModel->getAllItems($this->_lang, 0, [], ['col' => 'id', 'sort' => 'ASC']);
        $this->pageData['householdAppliances'] = array_column($householdAppliances, 'title', 'id');

        $communicationsModel = new CommunicationsModel();
        $communications = $communicationsModel->getAllItems($this->_lang, 0, [], ['col' => 'id', 'sort' => 'ASC']);
        $this->pageData['communications'] = array_column($communications, 'title', 'id');


        $categoriesModel = new CategoryModel();
        $categories = $categoriesModel->getAllItems($this->_lang, 0, [], ['col' => 'pos', 'sort' => 'ASC']);
        $this->pageData['categories'] = array_column($categories, 'title', 'id');

        $citiesModel = new StatesModel();
        $states = $citiesModel->getAllItems($this->_lang, 0, [$citiesModel->getTable() . '.pid' => 0], ['col' => 'pos', 'sort' => 'ASC']);
        $this->pageData['states'] = array_column($states, 'title', 'id');


        $this->pageData['activeMenu'] = 'create';

        $this->pageData['propertyCategory'] = $categoriesModel->find($this->pageData['propertyType']);


        $this->currentView = 'properties/create';
        return $this->render('admin');
    }

    public function properties(): string|\CodeIgniter\HTTP\RedirectResponse
    {

        if (!isset($this->userData->id)) {
            return redirect()->to($this->_lang . '/sign-in')->send();
        }

        $articleModel = new ArticleModel();
        $properties = $articleModel->getAllItems(0, ['user_id' => $this->userData->id]);
        $articleImageModel = new ArticleImages();
        foreach ($properties as $property) {

            $images = $articleImageModel->getList(['article_id' => $property->id]);
            $property->images = $images;

        }
        $this->pageData['properties'] = $properties;

        $this->pageData['activeMenu'] = 'properties';
        $this->currentView = 'properties/properties';
        return $this->render('admin');
    }

    public function favorites(): string|\CodeIgniter\HTTP\RedirectResponse
    {

        $this->pageData['activeMenu'] = 'favorites';
        if (!isset($this->userData->id)) {
            return redirect()->to($this->_lang . '/sign-in')->send();
        }


        $this->currentView = 'properties/favorites';
        return $this->render('admin');
    }


    public function removeProperty($id = 0)
    {

        $propertyModel = new ArticleModel();

        $property = $propertyModel->select('*')->where(['id' => intval($id), 'user_id' => $this->userData->id]);

        if (!empty($property)) {
            $property->delete();

            $household_appliances_lcp_model = new HouseholdAppliancesLcpModel();

            $household_appliances_lcp_model->where(['article_id' => intval($id)])->delete();


            $amenities_lcp_model = new AmenitiesLcpModel();
            $amenities_lcp_model->where(['article_id' => intval($id)])->delete();


            $communications_lcp_model = new CommunicationsLcpModel();
            $communications_lcp_model->where(['article_id' => intval($id)])->delete();


            $articleImageModel = new ArticleImages();
            $images = $articleImageModel->select('*')->where(['article_id' => intval($id)])->findAll();
            if (!empty($images)) {

                foreach ($images as $image) {
                    if (is_file(FCPATH  . $image->img)) {
                        unlink(FCPATH . $image->img);
                    }
                }
            }
            $articleImageModel->where(['article_id' => intval($id)])->delete();

        }

        return redirect()->to($this->_lang . '/user/properties')->send();


    }

}
