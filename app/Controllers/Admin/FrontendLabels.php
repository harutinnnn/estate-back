<?php

namespace App\Controllers\Admin;

use App\Libraries\DbUtils;
use App\Models\FrontendLabelsMLModel;
use App\Models\FrontendLabelsModel;

class FrontendLabels extends AdminMainController
{

    public string $mod = 'frontend_labels';

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

        $model = new FrontendLabelsModel();

        $where = [];
        if ($this->request->getGet('table_search') && strlen(trim($this->request->getGet('table_search')))) {

            $where['like'] = [
                't.key' => trim($this->request->getGet('table_search')),
                'tML.text' => trim($this->request->getGet('table_search')),
            ];
        }

        $pager = $this->paginationMl($model, ['t.id', 't.key', 'tML.text', 't.type'], $where);

        $this->pageData['pager'] = $pager['pager'];
        $this->pageData['items'] = $pager['items'];

        return $this->render();
    }

    public function edit($id = 0, $pageNum = 0)
    {
        $this->currentView = "Admin/{$this->mod}/edit";

        $item = new \stdClass();
        $itemsMl = [];

        $contentModel = new FrontendLabelsModel();
        $contentMLModel = new FrontendLabelsMLModel();

        if ($id) {

            $item = $contentModel->where(['id' => intval($id)])->first();


            $itemsMLTmp = $contentMLModel->where(['parent_id' => intval($id)])->findAll();
            foreach ($itemsMLTmp as $itemML) {
                $itemsMl[$itemML->lang] = $itemML;
            }
        }

        $this->pageData['item'] = $item;
        $this->pageData['itemsMl'] = $itemsMl;


        if (!intval($id)) {

            $validationRules = [
                'key' => [
                    'rules' => "required|is_unique[{$contentModel->table}.key]|trim",
                    'label' => 'Key'
                ]
            ];
        }

        foreach ($this->langList as $lang => $lTitle) {
            $validationRules["text_{$lang}"]['rules'] = 'required|trim';
            $validationRules["text_{$lang}"]['label'] = "Text ({$lTitle})";
        }


        if ($this->request->getPost('submit')) {

            if ($this->validate($validationRules)) {

                if ($id) {

                    // 1. Update the main content table
                    $contentModel->update($id, [
                        'type' => $this->request->getPost('type')
                    ]);

                    // 2. Update each language version
                    foreach ($this->langList as $lang => $lTitle) {
                        $data = [
                            'parent_id' => $id,
                            'lang' => $lang,
                            'text' => $this->request->getPost('text_' . $lang),
                        ];

                        // Update existing translation
                        $contentMLModel->replace($data);
                    }

                } else {

                    $contentModel = new FrontendLabelsModel();
                    $lid = $contentModel->insert([
                        'key' => $this->request->getPost('key'),
                        'type' => $this->request->getPost('type')
                    ]);


                    if ($lid) {
                        foreach ($this->langList as $lang => $lTitle) {
                            $contentMLModel = new FrontendLabelsMLModel();
                            $contentMLModel->insert([
                                'parent_id' => $lid,
                                'lang' => $lang,
                                'text' => $this->request->getPost('text_' . $lang),
                            ]);
                        }
                    }

                }

                return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();

            } else {
                $this->pageData['validation'] = $this->validator;
            }
        }


        $this->pageData['label_types'] = [
            LABEL_INPUT => translate(LABEL_INPUT),
            LABEL_CONTENT => translate(LABEL_CONTENT),
        ];

        $this->pageData['id'] = $id;

        return $this->render();

    }

    public function delete($id = 0): \CodeIgniter\HTTP\RedirectResponse
    {

        if (intval($id)) {

            DbUtils::deleteMl(new FrontendLabelsModel(), new FrontendLabelsMLModel(), intval($id));

        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
    }

}
