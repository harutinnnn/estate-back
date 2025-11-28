<?php

namespace App\Controllers\Admin;

use App\Libraries\FileUploadHelper;
use App\Models\ContentMLModel;
use App\Models\ContentModel;
use App\Libraries\DbUtils;

class Content extends AdminMainController
{

    public string $mod = 'content';

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

        $model = new ContentModel();

        $where = [];
        if ($this->request->getGet('table_search') && strlen(trim($this->request->getGet('table_search')))) {

            $where['like'] = [
                'tML.title' => trim($this->request->getGet('table_search')),
            ];
        }

        $pager = $this->paginationMl($model, ['t.id', 't.status', 'tML.title', 't.img'], $where);

        $this->pageData['pager'] = $pager['pager'];
        $this->pageData['items'] = $pager['items'];

        return $this->render();
    }

    public function edit($id = 0, $pageNum = 0)
    {
        $this->currentView = "Admin/{$this->mod}/edit";

        $this->pageData['isCropper'] = true;
        $item = new \stdClass();
        $itemsMl = [];

        $model = new ContentModel();
        $modelML = new ContentMLModel();

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


        $img = $this->request->getFile('img');


        $validationRules['img'] = [
            'label' => 'File',
            'rules' => 'is_image[img]|max_size[img,5120]|ext_in[img,jpg,jpeg,png,svg]',
            'errors' => [
                'uploaded' => 'No file selected',
                'max_size' => 'File size exceeds 2MB',
                'ext_in' => 'Only jpg, jpeg, png allowed'
            ]
        ];


        foreach ($this->langList as $lang => $lTitle) {
            $validationRules["title_{$lang}"]['rules'] = 'required|trim';
            $validationRules["title_{$lang}"]['label'] = "Title ({$lTitle})";
        }


        if ($this->request->getPost('submit')) {

            if ($this->validate($validationRules)) {

                $data = [
                    'status' => $this->request->getPost('status')
                ];

                if ($this->pageData['isCropper'] && $this->request->getPost('hidden_img')) {

                    $data = FileUploadHelper::croppedImageUpload('img', $this->mod, $data, $item, $this->request->getPost('hidden_img'));

                } else {

                    if ($img && $img->isValid()) {
                        $data = FileUploadHelper::imageUpload('img', $this->mod, $data, $item);
                    }

                }

                if ($id) {
                    $model->update($id, $data);

                } else {

                    $model = new ContentModel();
                    $lid = $model->insert($data);

                }

                // 2. Update each language version
                foreach ($this->langList as $lang => $lTitle) {
                    $data = [
                        'parent_id' => !$id ? $lid : $id,
                        'lang' => $lang,
                        'title' => $this->request->getPost('title_' . $lang),
                        'content' => $this->request->getPost('content_' . $lang),
                        'searchfield' => strip_tags($this->request->getPost("content_{$lang}")) .
                            strip_tags($this->request->getPost("title_{$lang}")),
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

        return $this->render();

    }

    /**
     * @param int $id
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function toggle($id = 0): \CodeIgniter\HTTP\RedirectResponse
    {

        if (intval($id)) {

            $model = new ContentModel();
            DbUtils::toggle($model->table, $id);
        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
    }


    public function delete($id = 0): \CodeIgniter\HTTP\RedirectResponse
    {

        if (intval($id)) {

            $model = new ContentModel();

            $item = $model->find($id);
            if (isset($item->img) && strlen($item->img)) {
                if (is_file(FCPATH . '/uploads/' . $this->mod . '/' . $item->img)) {
                    unlink(FCPATH . '/uploads/' . $this->mod . '/' . $item->img);
                }
            }

            DbUtils::deleteMl(new ContentModel(), new ContentMLModel(), intval($id));

        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
    }

}
