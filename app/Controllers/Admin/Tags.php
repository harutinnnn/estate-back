<?php

namespace App\Controllers\Admin;

use App\Libraries\DbUtils;
use App\Models\TagModel;

class Tags extends AdminMainController
{

    public string $mod = 'tags';

    public function __construct()
    {
        parent::__construct();

        $this->pageData['mod'] = $this->mod;

        if (!$this->userData) {
            redirect()->to('/' . ADMIN_LINK . '/login')->send();
            exit;
        }
    }

    public function index(): string
    {
        $this->currentView = "Admin/{$this->mod}/index";

        $model = new TagModel();


        $this->pageData['items'] = $model->findAll();

        return $this->render();
    }

    public function edit($id = 0, $pageNum = 0)
    {
        $this->currentView = "Admin/{$this->mod}/edit";

        $item = new \stdClass();

        $model = new TagModel();

        if ($id) {

            $item = $model->where(['id' => intval($id)])->first();
        }

        $this->pageData['item'] = $item;


        $validationRules = [

            'tag' => [
                'rules' => 'required|trim',
                'label' => translate('tag')
            ],
        ];


        if ($this->request->getPost('submit')) {

            if ($this->validate($validationRules)) {

                if ($id) {

                    // 1. Update the main content table
                    $model->update($id, [
                        'tag' => $this->request->getPost('tag'),

                    ]);

                } else {

                    $model->insert([
                        'tag' => $this->request->getPost('tag'),
                    ]);

                }

                return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();

            } else {
                $this->pageData['validation'] = $this->validator;
            }
        }

        $this->pageData['id'] = $id;

        return $this->render();

    }

    public function delete($id = 0): \CodeIgniter\HTTP\RedirectResponse
    {

        if (intval($id)) {

            DbUtils::deleteMl(new TagModel(), new TagModel(), intval($id));

        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
    }

}
