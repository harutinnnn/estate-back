<?php

namespace App\Controllers\Admin;

use App\Libraries\ContentBuilder;
use App\Libraries\FileUploadHelper;
use App\Libraries\UrlHelper;
use App\Libraries\DbUtils;
use App\Models\NewsCategoryModel;
use App\Models\PostsModel;

class Posts extends AdminMainController
{

    public string $mod = 'posts';

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

        $model = new PostsModel();

        $where = ["{$model->table}.related_id" => 0];
        if ($this->request->getGet('table_search') && strlen(trim($this->request->getGet('table_search')))) {

            $where['like'] = [
                "{$model->table}.title" => trim($this->request->getGet('table_search')),
            ];
        }


        $pager = $model->postsPagination($where, ['col' => 'created_at', 'sort' => 'DESC']);


        foreach ($pager['items'] as $item) {
            if ($item->related_id == 0) {
                $item->nodes = [];
                $relItems = $model->where(['related_id' => $item->id])->findAll();
                foreach ($relItems as $relItem) {
                    $item->nodes[$relItem->lang] = $relItem;
                }
            }
        }


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

        $model = new PostsModel();

        $this->pageData['lang'] = $this->request->getGet('lang') ?? ADMIN_DEF_LANG;
        $this->pageData['related_id'] = $this->request->getGet('related_id') ?? 0;
        $this->pageData['related_item'] = $model->first($this->pageData['related_id']);


        if ($id) {
            $item = $model->where(['id' => intval($id)])->first();

            $this->pageData['editor_json_data'] = $item->editor_json_data;

        }

        $this->pageData['item'] = $item;


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
                    'title' => $this->request->getPost('title'),
                    'cat_id' => intval($this->request->getPost('cat_id')),
                    'editor_json_data' => $this->request->getPost('editor_json_data'),
                    'related_id' => intval($this->request->getPost('related_id'))
                ];


                if (!$id) {
                    $data['lang'] = $this->request->getPost('lang');
                }


                if ($this->pageData['isCropper'] && $this->request->getPost('hidden_img')) {

                    $data = FileUploadHelper::croppedImageUpload('img', $this->mod, $data, $item, $this->request->getPost('hidden_img'));

                } else {

                    if ($img && $img->isValid()) {
                        $data = FileUploadHelper::imageUpload('img', $this->mod, $data, $item);
                    }
                }


                $editor_json_data = json_decode($this->request->getPost('editor_json_data'));


                if (isset($editor_json_data->blocks) && !empty($editor_json_data->blocks)) {

                    $data['content'] = ContentBuilder::objectToHtml($editor_json_data->blocks);
                    $data['searchfield'] = $data['title'] . strip_tags($data['content']);
                }

                $data['slug'] = UrlHelper::slugify(urldecode($this->request->getPost('title')));

                if ($id) {
                    $model->update($id, $data);

                } else {

                    $model = new PostsModel();
                    $model->insert($data);

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

            $model = new PostsModel();
            DbUtils::toggle($model->table, $id);
        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
    }


    public function delete($id = 0): \CodeIgniter\HTTP\RedirectResponse
    {

        if (intval($id)) {

            $model = new PostsModel();

            $item = $model->find($id);
            if (isset($item->img) && strlen($item->img)) {
                if (is_file(FCPATH . '/uploads/' . $this->mod . '/' . $item->img)) {
                    unlink(FCPATH . '/uploads/' . $this->mod . '/' . $item->img);
                }
            }

            DbUtils::deleteMl(new PostsModel(), new PostsModel(), intval($id));

        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
    }

}
