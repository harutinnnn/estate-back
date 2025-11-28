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

}