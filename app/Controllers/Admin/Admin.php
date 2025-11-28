<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;

class Admin extends AdminMainController
{


    public function index(): string
    {

        $this->currentView = 'Admin/index';

        if (!$this->userData) {
            redirect()->to('/' . ADMIN_LINK . '/login')->send();
            exit;
        }


        return $this->render();
    }


    /**
     * @return \CodeIgniter\HTTP\RedirectResponse|string
     */
    public function login(): string|\CodeIgniter\HTTP\RedirectResponse
    {

        if ($this->userData) {
            redirect()->to('/' . ADMIN_LINK)->send();
            exit;
        }

        $this->currentView = 'Admin/login';
        $remember = $this->request->getPost('remember');

        $validationRules = [

            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'The Email field is required.',
                    'valid_email' => 'Please enter a valid email address.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'The Password field is required.',
                    'min_length' => 'Password must be at least 8 characters long.'
                ]
            ]
        ];

        if ($this->request->getPost('submit')) {

            if ($this->validate($validationRules)) {


                $userModel = new UserModel();
                $user = $userModel->getUserByEmail($this->request->getPost('email'));


                if (!empty($user)) {

                    if (password_verify($this->request->getPost('password'), $user->password)) {
                        // Password is correct

                        session()->set('adminUser', $user);

                        if ($remember) {
                            $token = bin2hex(random_bytes(16));
                            $userModel->update($user->id, ['remember_token' => $token]);
                            setcookie('remember_me', $token, time() + 60 * 60 * 24 * 30, "/"); // 30 days
                        }

                        return redirect()->to('/' . ADMIN_LINK)->send();

                    } else {
                        session()->setFlashdata('error_message', 'Wrong email/password');
                    }

                } else {
                    session()->setFlashdata('error_message', 'Wrong email/password');

                }


            } else {

                $this->pageData['validation'] = $this->validator;

            }
        }


        return $this->render('auth');
    }


    /**
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function logout(): \CodeIgniter\HTTP\RedirectResponse
    {
        $session = session();

        if (!$this->userData) {
            redirect()->to('/' . ADMIN_LINK)->send();
            exit;
        }

        $session->destroy();
        setcookie('remember_me', '', time() - 3600, "/");

        return redirect()->to('/' . ADMIN_LINK)->send();

    }

}
