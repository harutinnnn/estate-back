<?php

namespace App\Controllers;

use App\Models\SiteUserModel;

class User extends MainController
{


    public function dashboard(): string|\CodeIgniter\HTTP\RedirectResponse
    {

        if (!isset($this->userData->id)) {
            return redirect()->to($this->_lang . '/sign-in')->send();
        }


        $this->currentView = 'user/dashboard';
        return $this->render('admin');
    }

    public function create(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (!isset($this->userData->id)) {
            return redirect()->to($this->_lang . '/sign-in')->send();
        }


        $this->currentView = 'user/create';
        return $this->render('admin');
    }

    public function messages(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (!isset($this->userData->id)) {
            return redirect()->to($this->_lang . '/sign-in')->send();
        }


        $this->currentView = 'user/messages';
        return $this->render('admin');
    }

    public function properties(): string|\CodeIgniter\HTTP\RedirectResponse
    {

        if (!isset($this->userData->id)) {
            return redirect()->to($this->_lang . '/sign-in')->send();
        }


        $this->currentView = 'user/properties';
        return $this->render('admin');
    }

    public function favorites(): string|\CodeIgniter\HTTP\RedirectResponse
    {


        if (!isset($this->userData->id)) {
            return redirect()->to($this->_lang . '/sign-in')->send();
        }


        $this->currentView = 'user/favorites';
        return $this->render('admin');
    }

}
