<?php

namespace App\Controllers\Admin;

use App\Libraries\ContentBuilder;
use App\Libraries\FileUploadHelper;
use App\Models\NewsCategoryModel;
use App\Models\PostMLModel;
use App\Models\PostModel;
use App\Libraries\DbUtils;

class Post extends AdminMainController
{

    public string $mod = 'post';

    public function __construct()
    {
        parent::__construct();

        $this->pageData['mod'] = $this->mod;

        if (!$this->userData) {
            redirect()->to('/' . ADMIN_LINK . '/login')->send();
            exit;
        }

        $newsCategoriesModel = new NewsCategoryModel();
        $this->pageData['categories'] = array_column($newsCategoriesModel->getAllItems(ADMIN_DEF_LANG), 'title', 'id');
    }

    public function index(): string
    {

        $this->currentView = "Admin/{$this->mod}/index";

        $model = new PostModel();

        $where = ['related_id' => 0];
        if ($this->request->getGet('table_search') && strlen(trim($this->request->getGet('table_search')))) {

            $where['like'] = [
                'tML.title' => trim($this->request->getGet('table_search')),
            ];
        }

        $pager = $model->paginationMl($where);

        $this->pageData['pager'] = $pager['pager'];
        $this->pageData['items'] = $pager['items'];

        return $this->render();
    }

    public function edit($id = 0, $pageNum = 0)
    {
        $this->currentView = "Admin/{$this->mod}/edit";
        $this->_addScript('assets/admin/js/post-editor.js');

        $this->pageData['editor_json_data'] = json_encode(json_decode($this->request->getPost('editor_json_data')));

        $item = new \stdClass();
        $itemsMl = [];

        $model = new PostModel();
        $modelML = new PostMLModel();

        $this->pageData['lang'] = $this->request->getGet('lang') ?? ADMIN_DEF_LANG;
        $this->pageData['related_id'] = $this->request->getGet('related_id') ?? 0;
        if ($this->pageData['related_id']) {
            $this->pageData['related_item'] = $model->getItem($this->pageData['related_id'], ADMIN_DEF_LANG);
        }

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
            ],
            'cat_id' => [
                'rules' => 'required|numeric',
                'label' => 'Category'
            ],
            'title' => [
                'label' => 'Title',
                'rules' => 'required|trim'
            ],
            'img' => [
                'label' => 'File',
                'rules' => 'is_image[img]|max_size[img,5120]|ext_in[img,jpg,jpeg,png,svg]',
                'errors' => [
                    'uploaded' => 'No file selected',
                    'max_size' => 'File size exceeds 2MB',
                    'ext_in' => 'Only jpg, jpeg, png allowed'
                ]
            ]
        ];


        $img = $this->request->getFile('img');


        if ($this->request->getPost('submit')) {

            if ($this->validate($validationRules)) {


                $data = [
                    'status' => $this->request->getPost('status'),
                    'cat_id' => intval($this->request->getPost('cat_id')),
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

                    $model = new PostModel();
                    $lid = $model->insert($data);

                }

                // 2. Update each language version

                $editor_json_data = json_decode($this->request->getPost('editor_json_data'));
                $content = ContentBuilder::objectToHtml($editor_json_data->blocks);

                $data = [
                    'parent_id' => !$id ? $lid : $id,
                    'lang' => $this->request->getPost('lang'),
                    'title' => $this->request->getPost('title'),
                    'editor_json_data' => json_encode($editor_json_data),
                    'content' => $content,
                    'searchfield' => $this->request->getPost('title') . strip_tags($content),
                ];

                $modelML->replace($data);

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

            $model = new PostModel();
            DbUtils::toggle($model->table, $id);
        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
    }


    public function delete($id = 0): \CodeIgniter\HTTP\RedirectResponse
    {

        if (intval($id)) {

            $model = new PostModel();

            $item = $model->find($id);
            if (isset($item->img) && strlen($item->img)) {
                if (is_file(FCPATH . '/uploads/' . $this->mod . '/' . $item->img)) {
                    unlink(FCPATH . '/uploads/' . $this->mod . '/' . $item->img);
                }
            }

            DbUtils::deleteMl(new PostModel(), new PostMLModel(), intval($id));

        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
    }

}
