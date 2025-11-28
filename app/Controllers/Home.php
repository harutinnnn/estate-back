<?php

namespace App\Controllers;

use App\Controllers\Admin\FrontendLabels;
use App\Models\FrontendLabelsModel;
use App\Models\UserModel;

class Home extends MainController
{
    public function index(): string
    {
        $this->currentView = 'index';


        $labels = new FrontendLabelsModel();
        $this->pageData['labels'] = $labels->getAllItems(ADMIN_DEF_LANG);


        return $this->render();
    }


}
