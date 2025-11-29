<?php


namespace App\Libraries;



class AuthUtils
{

    public static function checkRememberMe()
    {

        $session = session();
        $userModel = new \App\Models\UserModel();

        if (!$session->get('adminUser') && isset($_COOKIE['remember_me'])) {
            $token = $_COOKIE['remember_me'];
            $user = $userModel->where('remember_token', $token)->first();

            if ($user) {
                $session->set('adminUser', $user);
            }
        }
    }

    public static function checkRememberMeFront()
    {

        $session = session();
        $userModel = new \App\Models\SiteUserModel();
        if (!$session->get('user') && isset($_COOKIE['f_remember_me'])) {
            $token = $_COOKIE['f_remember_me'];
            $user = $userModel->where('remember_token', $token)->first();

            if ($user) {
                $session->set('user', $user);
            }
        }
    }

}