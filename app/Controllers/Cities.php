<?php

namespace App\Controllers;

use App\Controllers\Admin\FrontendLabels;
use App\Models\FrontendLabelsModel;
use App\Models\NewsModel;
use App\Models\UserModel;

class Cities extends MainController
{
    public string $currentView = 'news/index';

    public function index(): void
    {


        $cities_hy = file_get_contents(FCPATH.'/cities_hy.json');
        $cities_en = file_get_contents(FCPATH.'/cities_en.json');
        $cities_ru = file_get_contents(FCPATH.'/cities_ru.json');

//        var_dump(json_decode($cities_hy));


    }

}
