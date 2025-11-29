<?php

namespace App\Controllers;

use App\Models\SiteUserModel;

class Auth extends MainController
{
    public function signIn(): string|\CodeIgniter\HTTP\RedirectResponse
    {

        if ($this->userData) {
            redirect()->to('/' . $this->_lang)->send();
            exit;
        }

        $remember = $this->request->getPost('remember');

        $this->currentView = 'auth/sign-in';


        $validationRules = [

            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'The Email field is required.',
                    'valid_email' => 'Please enter a valid email address.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'The Password field is required.',
                    'min_length' => 'Password must be at least 8 characters long.'
                ]
            ]
        ];


        if ($this->request->getPost('submit')) {
            if ($this->validate($validationRules)) {


                $userModel = new SiteUserModel();
                $user = $userModel->getUserByEmail($this->request->getPost('email'));

                if (!empty($user)) {

                    if (password_verify($this->request->getPost('password'), $user->password)) {
                        session()->set('user', $user);

                        if ($remember) {
                            $token = bin2hex(random_bytes(16));
                            $userModel->update($user->id, ['remember_token' => $token]);
                            setcookie('f_remember_me', $token, time() + 60 * 60 * 24 * 30, "/"); // 30 days
                        }

                        return redirect()->to($this->_lang . '/user/dashboard')->send();
                    }

                } else {
                    session()->setFlashdata('error_message', 'Wrong email/password');
                }

            } else {
                session()->setFlashdata('error_message', 'Wrong email/password');
            }
        }

        $this->pageData['validation'] = $this->validator;


        return $this->render();
    }


    public function signUp(): string|\CodeIgniter\HTTP\RedirectResponse
    {

        if ($this->userData) {
            redirect()->to('/' . $this->_lang)->send();
            exit;
        }

        $this->currentView = 'auth/sign-up';


        $validationRules = [

            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Name field is required.',
                ]
            ],
            'phone' => [
                'rules' => 'required|regex_match[/^\(0\d{2}\)\s\d{2}-\d{2}-\d{2}$/]',
                'errors' => [
                    'required' => 'The Phone field is required.',
                    'regex_match' => 'The Phone format is invalid. Please enter a valid phone number. like (099) 99-99-99',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'The Email field is required.',
                    'valid_email' => 'Please enter a valid email address.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'The Password field is required.',
                    'min_length' => 'Password must be at least 8 characters long.'
                ]
            ],
            'password_confirm' => [
                'rules' => 'required|min_length[6]|matches[password]',
                'errors' => [
                    'required' => 'The Password field is required.',
                    'min_length' => 'Password must be at least 8 characters long.',
                    'matches' => 'Password and Confirm password does not match.'
                ]
            ]
        ];


        if ($this->request->getPost('submit')) {


            if ($this->validate($validationRules)) {


                $userModel = new SiteUserModel();

                $user = $userModel->getUserByEmail($this->request->getPost('email'));

                if (empty($user)) {

                    $userData = [
                        'role' => $this->request->getPost('role'),
                        'name' => $this->request->getPost('name'),
                        'phone' => $this->request->getPost('phone'),
                        'email' => $this->request->getPost('email'),
                        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    ];


                    $userId = $userModel->insert($userData);

                    if ($userId) {

                        return redirect()->to($this->_lang . '/sign-in')->send();
                    } else {

                        session()->setFlashdata('error_message', 'Some thing went wrong. Please try lather.');
                    }


                } else {
                    session()->setFlashdata('error_message', 'This email already used!');
                }

            }
        }

        $this->pageData['validation'] = $this->validator;


        return $this->render();
    }


    public function signOut()
    {

        session()->destroy();
        setcookie('f_remember_me', '', time() - 3600, "/");
        return redirect()->to('/' . $this->_lang)->send();

    }


}
