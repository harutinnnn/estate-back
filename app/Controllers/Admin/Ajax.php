<?php

namespace App\Controllers\Admin;

use App\Libraries\FileUploadHelper;
use App\Models\UserModel;

class Ajax extends AdminMainController
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->userData) {
            redirect()->to('/' . ADMIN_LINK . '/login')->send();
            exit;
        }


    }


    public function deleteImage()
    {
        $obj = new \stdClass();
        $obj->success = true;

        $id = $this->request->getPost('id');
        $tbl = $this->request->getPost('tbl');
        $col = $this->request->getPost('col');

        $db = \Config\Database::connect();

        $item = $db->table($tbl)
            ->where('id', intval($id))
            ->get()->getFirstRow();


        if (isset($item->{$col}) && is_file(FCPATH . '/uploads/' . $tbl . '/' . $item->{$col})) {
            @unlink(FCPATH . '/uploads/' . $tbl . '/' . $item->{$col});


            $builder = $db->table($tbl);
            $builder->where('id', intval($id));
            $builder->update([$col => null]);

        }


        return $this->response->setJSON($obj);
    }


    public function postImageUpload()
    {
        $obj = new \stdClass();
        $obj->success = 1;
        $obj->message = "";
        $obj->file = [];


        $image = $this->request->getFile('image');

        $validationRules['image'] = [
            'label' => 'File',
            'rules' => 'is_image[image]|max_size[image,5120]|ext_in[image,jpg,jpeg,png,svg]',
            'errors' => [
                'uploaded' => 'No file selected',
                'max_size' => 'File size exceeds 2MB',
                'ext_in' => 'Only jpg, jpeg, png allowed'
            ]
        ];

        if ($this->validate($validationRules)) {

            if ($image && $image->isValid()) {

                $obj->file['url'] = site_url('/uploads/posts/' . FileUploadHelper::postImageUpload('image', 'posts')['img']);

            }
        } else {
            $obj->message = $this->validator->getError();
            $obj->success = 0;

        }

        return $this->response->setJSON($obj);
    }

}
