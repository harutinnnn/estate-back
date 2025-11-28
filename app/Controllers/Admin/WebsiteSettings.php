<?php

namespace App\Controllers\Admin;

use App\Libraries\DbUtils;
use App\Models\WebsiteSettingsModel;

class WebsiteSettings extends AdminMainController
{

    public string $mod = 'website_settings';

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

        $model = new WebsiteSettingsModel();

        $this->pageData['items'] = $model->findAll();

        return $this->render();
    }

    public function edit($id = 0, $pageNum = 0)
    {
        $this->currentView = "Admin/{$this->mod}/edit";

        $item = new \stdClass();

        $model = new WebsiteSettingsModel();

        if ($id) {

            $item = $model->where(['id' => intval($id)])->first();
        }

        $this->pageData['item'] = $item;


        $validationRules = [

            'val' => [
                'rules' => 'required|trim',
                'label' => translate('val')
            ],
            'title' => [
                'rules' => 'required|trim',
                'label' => translate('title')
            ]
        ];

        if (!intval($id)) {

            $validationRules['key'] = [
                'rules' => "required|is_unique[{$model->table}.key]|trim",
                'label' => translate('key')
            ];
        }


        if ($this->request->getPost('submit')) {

            if ($this->validate($validationRules)) {

                if ($id) {

                    // 1. Update the main content table
                    $model->update($id, [
                        'key' => $this->request->getPost('key'),
                        'val' => $this->request->getPost('val'),
                        'title' => $this->request->getPost('title'),

                    ]);

                } else {

                    $model = new WebsiteSettingsModel();
                    $model->insert([
                        'key' => $this->request->getPost('key'),
                        'val' => $this->request->getPost('val'),
                        'title' => $this->request->getPost('title'),
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

            DbUtils::deleteMl(new WebsiteSettingsModel(), new WebsiteSettingsModel(), intval($id));

        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
    }

}
