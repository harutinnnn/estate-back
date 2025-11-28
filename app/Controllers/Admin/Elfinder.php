<?php

namespace App\Controllers\Admin;

use App\Controllers\MainController;
use CodeIgniter\Controller;

class Elfinder extends AdminMainController
{


    public function __construct()
    {
        parent::__construct();

        if (!$this->userData) {

            redirect()->to('/', 404)->send();
            exit;
        }
    }

    public function connector()
    {
        // Path to your files root
        $opts = [
            'roots' => [
                [
                    'driver' => 'LocalFileSystem',
                    'path' => FCPATH . 'uploads/',   // public/uploads
                    'URL' => base_url('uploads/'),
                    'accessControl' => [$this, 'access'],
                ]
            ]
        ];

        $connector = new \elFinderConnector(new \elFinder($opts));
        $connector->run();
    }

    public function popup()
    {
        return view('Admin/elfinder/popup');
    }

    // Disable accessing hidden files
    public function access($attr, $path, $data, $volume)
    {
        return strpos(basename($path), '.') === 0   // if file/folder begins with '.' (dot)
            ? !($attr == 'read' || $attr == 'write') // disable read+write
            : null; // otherwise keep default
    }
}
