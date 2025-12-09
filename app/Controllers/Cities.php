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

        die;
        $cities = [];
        $cities['en'] =
            [
                "Jermuk",
                "Vayk",
                "Yeghegnadzor",
                "Aghavnadzor",
                "Aghnjadzor",
                "Areni",
                "Arpi",
                "Artabuynk",
                "Chiva",
                "Gladzor",
                "Gndevaz",
                "Hermon",
                "Khachik",
                "Malishka",
                "Rind",
                "Shatin",
                "Taratumb",
                "Yeghegis",
                "Yelpin",
                "Zaritap",
                "Zedea",
            ];
        $cities['hy'] =
            [
                "Ջերմուկ",
                "Վայք",
                "Եղեգնաձոր",
                "Աղավնաձոր",
                "Աղնջաձոր",
                "Արենի",
                "Արփի",
                "Արտաբույնք",
                "Չիվա",
                "Գլաձոր",
                "Գնդեվազ",
                "Հերմոն",
                "Խաչիկ",
                "Մալիշկա",
                "Ռինդ",
                "Շատին",
                "Թառաթումբ",
                "Եղեգիս",
                "Ելփին",
                "Զառիթափ",
                "Զեդեա",
            ];
        $cities['ru'] =
            [
                "Джермук",
                "Вайк",
                "Егегнадзор",
                "Агавнадзор",
                "Агнджадзор",
                "Арени",
                "Арпи",
                "Артабуйнк",
                "Чива",
                "Гладзор",
                "Гндеваз",
                "Эрмон",
                "Хачик",
                "Малишка",
                "Ринд",
                "Шатин",
                "Таратумб",
                "Ехегис",
                "Елпин",
                "Заритап",
                "Зедеа",
            ];

        echo '<table border="1">';


        $model = new CityModel();
        $modelMl = new CityMLModel();

        foreach ($cities['en'] as $i => $cityName) {
            echo '<tr>';


            foreach ($cities as $kLang => $cityLangList) {


                try {


                    echo '<td>';
                    echo $cities[$kLang][$i];
                    echo '</td>';


                } catch (\Throwable $e) {
                    var_dump($e->getMessage());
                }
            }
            echo '</tr>';

        }
        echo '</table>';

        die;

        $stateId = 11;

        foreach ($cities['en'] as $i => $cityName) {
            $lid = $model->insert([
                'state' => $stateId,
                'status' => 1,
            ]);

            foreach ($cities as $kLang => $cityLangList) {


                try {


                    if ($lid) {
                        $modelMl->insert([
                            'parent_id' => $lid,
                            'lang' => $kLang,
                            'title' => $cities[$kLang][$i],
                        ]);
                    }


                } catch (\Throwable $e) {
                    var_dump($e->getMessage());
                }
            }

        }

    }

}
