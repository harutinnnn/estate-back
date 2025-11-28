<?php

namespace App\Controllers\Admin;

use App\Libraries\DbUtils;
use App\Libraries\FileUploadHelper;
use App\Libraries\UrlHelper;
use App\Models\ContentModel;
use App\Models\MenuMLModel;
use App\Models\MenuModel;
use App\Models\MenuSectionsModel;
use App\Models\WebsiteSettingsModel;

class Menu extends AdminMainController
{

    public string $mod = 'menu';

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

        $model = new MenuSectionsModel();
        $menuModel = new MenuModel();

        $items = $model->findAll();


        foreach ($items as $item) {
            $item->haveNodes = $menuModel->where('section_id', $item->id)->countAllResults();
        }

        $this->pageData['items'] = $items;

        return $this->render();
    }

    public function edit($id = 0, $pageNum = 0)
    {
        $this->currentView = "Admin/{$this->mod}/edit";

        $item = new \stdClass();

        $model = new MenuSectionsModel();

        if ($id) {

            $item = $model->where(['id' => intval($id)])->first();
        }

        $this->pageData['item'] = $item;


        $validationRules = [

            'status' => [
                'rules' => 'required|numeric',
                'label' => 'Status'
            ],
            'title' => [
                'rules' => 'required|trim',
                'label' => translate('title')
            ]
        ];

        if (!intval($id)) {

            $validationRules['url'] = [
                'rules' => "required|is_unique[{$model->table}.url]|trim",
                'label' => translate('url')
            ];
        }


        if ($this->request->getPost('submit')) {

            if ($this->validate($validationRules)) {

                if ($id) {

                    $model->update($id, [
                        'status' => intval($this->request->getPost('status')),
                        'title' => $this->request->getPost('title'),

                    ]);

                } else {

                    $model = new MenuSectionsModel();
                    $model->insert([
                        'status' => intval($this->request->getPost('status')),
                        'url' => $this->request->getPost('url'),
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

            DbUtils::deleteMl(new MenuSectionsModel(), new WebsiteSettingsModel(), intval($id));

        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
    }

    public function section($sectionId = 0)
    {
        $this->currentView = "Admin/{$this->mod}/section";
        $this->_addScript('assets/admin/js/menu.js');

        $sectionModel = new MenuSectionsModel();

        $section = $sectionModel->find($sectionId);


        if (empty($section)) {
            return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod)->send();
        }
        $this->pageData['section'] = $section;


        $model = new MenuModel();
        $items = $model->getAllItems(ADMIN_DEF_LANG, 0, 0, ['t.pid' => 0, 't.section_id' => $sectionId]);


        foreach ($items as $item) {

            $item->children = $model->getAllItems(ADMIN_DEF_LANG, 0, 0, ['t.pid' => $item->id]);

            if (!empty($item->children)) {
                foreach ($item->children as $node1) {
                    $node1->children = $model->getAllItems(ADMIN_DEF_LANG, 0, 0, ['t.pid' => $node1->id]);
                }
            }

        }

        $this->pageData['items'] = $items;

        $this->pageData['sectionId'] = $sectionId;

        return $this->render();
    }

    public function edit_menu($sectionId = 0, $id = 0, $pageNum = 0)
    {

        $this->currentView = "Admin/{$this->mod}/edit_menu";
        $this->_addScript('assets/admin/js/menu.js');

        $item = new \stdClass();

        $modelML = new MenuMLModel();
        $model = new MenuModel();
        $itemsMl = [];

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
        ];


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

            $validationRules["url_{$lang}"]['rules'] = 'required|trim';
            $validationRules["url_{$lang}"]['label'] = "Url ({$lTitle})";
        }


        if ($this->request->getPost('submit')) {
            if ($this->validate($validationRules)) {

                $data = [
                    'section_id' => intval($sectionId),
                    'status' => intval($this->request->getPost('status')),
                    'show' => intval($this->request->getPost('show')),
                    'pos' => intval($this->request->getPost('pos')),
                    'cid' => intval($this->request->getPost('cid')),
                ];

                $img = $this->request->getFile('img');

                if ($img && $img->isValid()) {
                    $data = FileUploadHelper::imageUpload('img', $this->mod, $data, $item);
                }

                if ($id) {
                    $model->update($id, $data);
                } else {
                    $model = new MenuModel();
                    $lid = $model->insert($data);
                }

                // 2. Update each language version
                foreach ($this->langList as $lang => $lTitle) {

                    $data = [
                        'parent_id' => !$id ? $lid : $id,
                        'lang' => $lang,
                        'title' => $this->request->getPost('title_' . $lang),
                        'meta_title' => $this->request->getPost('meta_title_' . $lang),
                        'meta_desc' => $this->request->getPost('meta_desc_' . $lang),
                        'meta_keywords' => $this->request->getPost('meta_keywords_' . $lang),
                        'url' => $this->request->getPost('url_' . $lang),
                    ];

                    $modelML->replace($data);

                }

                return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod . '/section/' . $sectionId)->send();

            } else {
                $this->pageData['validation'] = $this->validator;
            }
        }

        $this->pageData['id'] = $id;

        $contentModel = new ContentModel();
        $this->pageData['contents'] = [0 => translate('select_content')] + array_column($contentModel->getAllItems(ADMIN_DEF_LANG), 'title', 'id');


        return $this->render();

    }

    public function menu_remove($sectionId = 0, $id = 0)
    {
        if (intval($id)) {

            $model = new MenuModel();

            $item = $model->find($id);
            if (isset($item->img) && strlen($item->img)) {
                if (is_file(FCPATH . '/uploads/' . $this->mod . '/' . $item->img)) {
                    unlink(FCPATH . '/uploads/' . $this->mod . '/' . $item->img);
                }
            }

            DbUtils::deleteMl($model, $model, intval($id));

        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod . '/section/' . $sectionId)->send();

    }


    public function menu_toggle($sectionId = 0, $id = 0): \CodeIgniter\HTTP\RedirectResponse
    {

        if (intval($id)) {

            $model = new MenuModel();

            DbUtils::toggle($model->table, $id);
        }

        return redirect()->to('/' . ADMIN_LINK . '/' . $this->mod . '/section/' . $sectionId)->send();
    }

    public function sort_menu($section_id = 0)
    {
        if ($section_id && $this->request->getPost('menus')) {
            $menus = $this->request->getPost('menus');

            $menuModel = new MenuModel();

            foreach ($menus as $menu) {
                $menuModel->update($menu['id'], ['pos' => $menu['pos'], 'pid' => $menu['parent']]);

                if (isset($menu['children']) && !empty($menu['children'])) {
                    foreach ($menu['children'] as $menuChild) {
                        $menuModel->update($menuChild['id'], ['pos' => $menuChild['pos'], 'pid' => $menuChild['parent']]);
                        if (isset($menuChild['children']) && !empty($menuChild['children'])) {
                            foreach ($menuChild['children'] as $menuChildI) {
                                $menuModel->update($menuChildI['id'], ['pos' => $menuChildI['pos'], 'pid' => $menuChildI['parent']]);
                            }
                        }
                    }
                }
            }
        }
    }


    public function slugify()
    {

        $obj = new \stdClass();
        $obj->title = $this->request->getPost('title');
        $obj->url = null;
        $obj->lang = $this->request->getPost('lang');
        $obj->id = intval($this->request->getPost('id'));
        $obj->error = false;

        try {

            $slug = UrlHelper::slugify(urldecode($this->request->getPost('title')));

            $menuMLModel = new MenuMLModel();
            $count = $menuMLModel->where('url', $slug)->countAllResults();

            if ($count) {
                $obj->url = UrlHelper::slugify(urldecode($this->request->getPost('title'))) . rand(9999, 9999999);
            } else {
                $obj->url = UrlHelper::slugify(urldecode($this->request->getPost('title')));
            }


        } catch (\Throwable $e) {
            $obj->error = true;
        }

        return $this->response->setJSON($obj);
    }

}
