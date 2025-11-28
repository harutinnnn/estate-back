<?php

namespace App\Controllers;

use App\Libraries\ImageHelper;
use App\Libraries\LangUtils;
use App\Models\NewsCategoryModel;
use App\Models\NewsModel;
use App\Models\PostsModel;
use Faker\Factory;

class Post extends MainController
{
    public string $currentView = 'posts/index';

    public function index($slug): string
    {

        $categoryModel = new NewsCategoryModel();
        $category = $categoryModel->where(['slug' => urldecode($slug)])->first();

        if (empty($category)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }


        $postsModel = new PostsModel();

        $pager = $postsModel->postsPagination(['lang' => $this->_lang, 'cat_id' => $category->id], ['col' => 'created_at', 'sort' => 'DESC']);


        $this->pageData['posts'] = $pager['items'];
        $this->pageData['pager'] = $pager['pager'];

        return $this->render();

    }


    public function view($slug, $id)
    {
        $langPageLinks = LangUtils::langLinksBuilderPost();
        if ($langPageLinks) {
            $this->pageData['langPageLinks'] = $langPageLinks;
        }

        $this->currentView = 'posts/view';

        $newsModel = new PostsModel();
        $item = $newsModel->where(['id' => $id, 'lang' => $this->_lang])->first();


        if (empty($item)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $this->pageData['item'] = $item;

        return $this->render();
    }


}
