<?php

namespace App\Controllers\Admin;

use App\Libraries\DbUtils;
use App\Libraries\UrlHelper;
use App\Models\CityMLModel;
use App\Models\CityModel;
use App\Models\StatesModel;

class Cities extends AdminMainController
{

    public string $mod = 'cities';

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

        $model = new CityModel();

        $where = [];
        if ($this->request->getGet('table_search') && strlen(trim($this->request->getGet('table_search')))) {

            $where['like'] = [
                'tML.title' => trim($this->request->getGet('table_search')),
            ];
        }

        $pager = $this->paginationMl($model, ['t.id', 't.status', 'tML.title','t.state'], $where, ADMIN_DEF_LANG, ['col' => 't.id', 'sort' => 'ASC']);

        $this->pageData['pager'] = $pager['pager'];
        $this->pageData['items'] = $pager['items'];

        $stateModel = new StatesModel();
        $states = $stateModel->getAllItems('en', 0, [], ['col' => 'pos', 'sort' => 'ASC']);
        $this->pageData['states'] = array_column($states, 'title', 'id');

        return $this->render();
    }

    public function edit($id = 0, $pageNum = 0)
    {
        $this->currentView = "Admin/{$this->mod}/edit";
        $this->pageData['isCropper'] = true;
        $item = new \stdClass();
        $itemsMl = [];

        $model = new CityModel();
        $modelML = new CityMLModel();

        if ($id) {
            $item = $model->where(['id' => intval($id)])->first();

            $itemsMLTmp = $modelML->where(['parent_id' => intval($id)])->findAll();
            foreach ($itemsMLTmp as $itemML) {
                $itemsMl[$itemML->lang] = $itemML;
            }
        }

        $this->pageData['item'] = $item;
        $this->pageData['itemsMl'] = $itemsMl;


        $validationRules = [
            'status' => [
                'rules' => 'required|numeric',
                'label' => 'Status'
            ]
        ];


        foreach ($this->langList as $lang => $lTitle) {
            $validationRules["title_{$lang}"]['rules'] = 'required|trim';
            $validationRules["title_{$lang}"]['label'] = "Title ({$lTitle})";
        }


        if ($this->request->getPost('submit')) {

            if ($this->validate($validationRules)) {

                $data = [
                    'status' => $this->request->getPost('status'),
                    'state' => intval($this->request->getPost('state'))
                ];


                $data['slug'] = UrlHelper::slugify(urldecode($this->request->getPost('title_en')));

                if ($id) {
                    $model->update($id, $data);

                } else {

                    $model = new CityModel();
                    $lid = $model->insert($data);

                }

                // 2. Update each language version
                foreach ($this->langList as $lang => $lTitle) {
                    $data = [
                        'parent_id' => !$id ? $lid : $id,
                        'lang' => $lang,
                        'title' => $this->request->getPost('title_' . $lang)
                    ];


                    // Update existing translation
                    $modelML->replace($data);

                }

                return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();

            } else {
                $this->pageData['validation'] = $this->validator;
            }
        }


        $this->pageData['id'] = intval($id);


        $stateModel = new StatesModel();
        $states = $stateModel->getAllItems('en', 0, [], ['col' => 'pos', 'sort' => 'ASC']);
        $this->pageData['states'] = array_column($states, 'title', 'id');

        return $this->render();

    }

    /**
     * @param int $id
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function toggle($id = 0): \CodeIgniter\HTTP\RedirectResponse
    {

        if (intval($id)) {

            $model = new CityModel();
            DbUtils::toggle($model->table, $id);
        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
    }


    public function delete($id = 0): \CodeIgniter\HTTP\RedirectResponse
    {

        if (intval($id)) {

            DbUtils::deleteMl(new CityModel(), new CityMLModel(), intval($id));

        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
    }

}
