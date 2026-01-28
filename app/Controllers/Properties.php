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

    public function create_step_2($id = 0): string|\CodeIgniter\HTTP\RedirectResponse
    {

        $tmpImages = session()->get("tmp-images");
        $this->pageData['tmpImages'] = $tmpImages;

        if (!isset($this->userData->id)) {
            return redirect()->to($this->_lang . '/sign-in')->send();
        }

        $articleModel = new ArticleModel();

        $article = null;
        $propHouseholdAppliances = [];
        $propAmenities = [];
        $propCommunications = [];
        $images = [];


        if (intval($id)) {
            $article = $articleModel->find(intval($id));

            $propHouseholdAppliancesModel = new HouseholdAppliancesLcpModel();
            $propHouseholdAppliances = $propHouseholdAppliancesModel->select('household_appliance_id')->where(['article_id' => intval($id)])->findAll();


            $propAmenitiesModel = new AmenitiesLcpModel();
            $propAmenities = $propAmenitiesModel->select('amenity_id')->where(['article_id' => intval($id)])->findAll();

            $propCommunicationsModel = new CommunicationsLcpModel();
            $propCommunications = $propCommunicationsModel->select('communication_id')->where(['article_id' => intval($id)])->findAll();


            $imagesModel = new ArticleImages();
            $images = $imagesModel->select('*')->where(['article_id' => intval($id)])->findAll();

        }

        $this->pageData['article'] = $article;
        $this->pageData['propHouseholdAppliances'] = array_column($propHouseholdAppliances, 'household_appliance_id', 'household_appliance_id');
        $this->pageData['propAmenities'] = array_column($propAmenities, 'amenity_id', 'amenity_id');
        $this->pageData['propCommunications'] = array_column($propCommunications, 'communication_id', 'communication_id');
        $this->pageData['images'] = $images;


        if (session()->get('property-type') && session()->get('property-rent-type')) {

            $this->pageData['propertyType'] = session()->get('property-type');
            $this->pageData['propertyRentType'] = session()->get('property-rent-type');

        } else if (isset($article->property_rent_type) && isset($article->category)) {

            $this->pageData['propertyType'] = $article->category;
            $this->pageData['propertyRentType'] = $article->property_type;

        } else {

            return redirect()->to($this->_lang . '/user/create')->send();

        }

        if ($this->request->getPost('submit')) {


            if (
                $this->validate(
                    ArticleModel::rules($this->pageData['propertyType'], $this->pageData['propertyRentType'], $this->_lang, intval($id)),
                    [
                        'images' => [
                            'isHaveImage' => 'Must have at least 1 photo',
                        ],
                        'password' => [
                            'strong_password' => 'Password must contain uppercase, lowercase and number.',
                        ],
                    ]
                )) {

                if ($artId = ArticleModel::saveArticle($this->request, $this->userData->id, $id)) {

                    //Images Base64 save in db and str to img

                    if ($tmpImages && count($tmpImages) > 0) {
                        foreach ($tmpImages as $image) {
                            ArticleImages::saveArticleImage($artId, $image, $this->userData->id);
                        }
                    }

                    session()->remove('tmp-images');

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
                    if (is_file(FCPATH . $image->img)) {
                        unlink(FCPATH . $image->img);
                    }
                }
            }
            $articleImageModel->where(['article_id' => intval($id)])->delete();

        }

        return redirect()->to($this->_lang . '/user/properties')->send();


    }

    public function uploadImg()
    {

        $file = $this->request->getFile('image');

        if (!$file || !$file->isValid()) {
            return $this->fail('Invalid file');
        }

        // allowed types
        $allowed = ['image/jpeg', 'image/png', 'image/webp'];

        if (!in_array($file->getMimeType(), $allowed)) {
            return $this->fail('Invalid image type');
        }

        $newName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $newName);

        return $this->respond([
            'success' => true,
            'file' => $newName
        ]);

    }

    public function imageUpload()
    {
        $file = $this->request->getFile('image');

        if (!$file || !$file->isValid()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'No file'
            ]);
        }

        $name = time() . '_' . $file->getRandomName();
        $file->move('uploads/tmp', $name);

        $imageData = [
            'success' => true,
            'file' => $name,
            'path' => '/uploads/tmp/' . $name,
            'expires_at' => time() + 3600 // 1 hour
        ];


        $images = session()->get('tmp-images');
        if (empty($images)) {
            $images = [];
            $images[$imageData['file']] = $imageData;

        } else {
            $images[$imageData['file']] = $imageData;
        }
        session()->set('tmp-images', $images);

        return $this->response->setJSON($imageData);
    }

    protected function clearTmpUploads()
    {
        $path = FCPATH . 'uploads/tmp/';
        $files = glob($path . '*');

        foreach ($files as $file) {
            if (is_file($file) && time() - filemtime($file) > 3600) {
                unlink($file);
            }
        }
    }

    public function removeTmpImage()
    {

        $obj = new \stdClass();
        $obj->success = false;

        if ($this->userData && $this->request->getPost('file')) {
            $obj->success = true;
            if (is_file(FCPATH . 'uploads/tmp/' . $this->request->getPost('file'))) {
                unlink(FCPATH . 'uploads/tmp/' . $this->request->getPost('file'));
            }

            $images = session()->get('tmp-images');

            if (isset($images[$this->request->getPost('file')])) {
                unset($images[$this->request->getPost('file')]);
                session()->set('tmp-images', $images);
            }

        }

        return $this->response->setJSON($obj);
    }

    public function removeImage()
    {

        $obj = new \stdClass();
        $obj->success = false;

        $imageId = $this->request->getPost('id');
        $articleId = $this->request->getPost('article_id');


        if ($this->userData && intval($imageId) && intval($articleId)) {
            $obj->success = true;

            $articleModel = new ArticleModel();
            $article = $articleModel->select('*')->where(['id' => intval($articleId), 'user_id' => $this->userData->id])->first();

            if (isset($article->id)) {


                $imgModel = new ArticleImages();
                $imageItem = $imgModel->select('*')->where(['id' => intval($imageId), 'article_id' => $article->id])->first();

                if (isset($imageItem->img)) {

                    if (is_file(FCPATH . $imageItem->img)) {
                        unlink(FCPATH . $imageItem->img);
                    }
                    $imgModel->delete($imageItem->id);
                }
            }
        }

        return $this->response->setJSON($obj);
    }
}
