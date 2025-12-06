<?php

namespace App\Controllers;

use App\Controllers\Admin\FrontendLabels;
use App\Models\CityMLModel;
use App\Models\CityModel;
use App\Models\FrontendLabelsModel;
use App\Models\NewsModel;
use App\Models\UserModel;

class Cities extends MainController
{
    public string $currentView = 'news/index';

    public function index(): void
    {


        $cities = [

        ];

        $cities_hy = file_get_contents(FCPATH . '/cities_hy.json');
        $cities_hy = json_decode($cities_hy);
        $cities_en = file_get_contents(FCPATH . '/cities_en.json');
        $cities_en = json_decode($cities_en);
        $cities_ru = file_get_contents(FCPATH . '/cities_ru.json');
        $cities_ru = json_decode($cities_ru);


        $lang = 'hy';
        foreach ($cities_hy as $key => $value) {

            $cities[$value->id] = [
                'status' => 1,
                'id' => $value->id,
                'title' => [
                    $lang => $value->title,
                ],
                'parent_id' => 0,
            ];

            if (!empty($value->nodes)) {
                foreach ($value->nodes as $node) {

                    $cities[$node->id] = [
                        'id' => $node->id,
                        'status' => 1,
                        'title' => [
                            $lang => $node->title,
                        ],
                        'parent_id' => $value->id,
                    ];

                }
            }
        }


        $lang = 'en';
        foreach ($cities_en as $key => $value) {

            $cities[$value->id]['title'][$lang] = $value->title;

            if (!empty($value->nodes)) {
                foreach ($value->nodes as $node) {

                    $cities[$node->id]['title'][$lang] = $node->title;

                }
            }
        }

        $lang = 'ru';
        foreach ($cities_ru as $key => $value) {

            $cities[$value->id]['title'][$lang] = $value->title;

            if (!empty($value->nodes)) {
                foreach ($value->nodes as $node) {

                    $cities[$node->id]['title'][$lang] = $node->title;

                }
            }
        }

//        echo '<pre>';
//        var_dump($cities);


        $model = new CityModel();
        $modelMl = new CityMLModel();


        foreach ($cities as $key => $value) {
            try {
                $lid = $model->insert([
                    'status' => 1,
                    'parent_id' =>
                        $value['parent_id'],
                ]);

                if ($lid && count($value['title'])) {

                    foreach ($value['title'] as $lKey => $title) {
                        $modelMl->insert([
                            'parent_id' => $lid,
                            'title' => $title,
                            'lang' => $lKey
                        ]);
                    }

                }
            } catch (\Throwable $e) {
                var_dump($value);
            }
        }


    }

}
