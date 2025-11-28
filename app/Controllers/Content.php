<?php

namespace App\Controllers;

use App\Controllers\Admin\FrontendLabels;
use App\Models\FrontendLabelsModel;
use App\Models\UserModel;
use Config\Services;

class Content extends MainController
{

    public string $currentView = 'content/index';


    public function index(): string
    {


        if (!isset($this->pageData['menuObj'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $this->render();
    }


    public function page_not_found()
    {


    }

    public function emailSend(){
        $email = Services::email();

        // You can also set these dynamically instead of using .env
        $email->setFrom('noreply@yourdomain.com', 'My App');
        $email->setTo('user@example.com');
        $email->setCC('copy@example.com');
        $email->setBCC('hidden@example.com');

        $email->setSubject('Test Email from CodeIgniter 4');
        $email->setMessage('<h2>Hello!</h2><p>This is a test email sent from CI4.</p>');

        if ($email->send()) {
            echo '✅ Email successfully sent.';
        } else {
            echo '❌ Email sending failed.<br><pre>';
            print_r($email->printDebugger(['headers']));
        }
    }

}
