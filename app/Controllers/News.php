<?php

namespace App\Controllers;

use App\Controllers\Admin\FrontendLabels;
use App\Models\FrontendLabelsModel;
use App\Models\NewsModel;
use App\Models\UserModel;

class News extends MainController
{
    public string $currentView = 'news/index';

    public function index(): string
    {

        $newsModel = new NewsModel();
        $news = $newsModel->getAllItems($this->_lang, 0, false, ['col' => 'created_at', 'sort' => 'DESC']);
        $this->pageData['news'] = $news;

        return $this->render();

    }


    public function view($id)
    {
        $this->currentView = 'news/view';

        $newsModel = new NewsModel();
        $item = $newsModel->getItem($id, $this->_lang);


        if (empty($item)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $this->pageData['item'] = $item;



        return $this->render();
    }


}
