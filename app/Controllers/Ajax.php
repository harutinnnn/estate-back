<?php

namespace App\Controllers;

use App\Controllers\Admin\FrontendLabels;
use App\Models\CityModel;
use App\Models\FrontendLabelsModel;
use App\Models\UserModel;

class Ajax extends MainController
{
    public function getCities(): string|\CodeIgniter\HTTP\RedirectResponse
    {

        $html = '';
        $state = $this->request->getPost('state');

        if (intval($state)) {

            $cityModel = new CityModel();

            $states = $cityModel->getAllItems($this->_lang, 0, [$cityModel->getTable() . '.state' => intval($state)], ['col' => 'title', 'sort' => 'ASC']);
            foreach ($states as $state) {
                $html .= '<option value="' . $state->id . '">' . $state->title . '</option>';
            }

        }

        return $html;

    }


}
