<?php


namespace App\Models;


use CodeIgniter\Model;
use Faker\Factory;

class SiteUserModel extends MainModel
{
    protected $table = "siteUsers";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "name",
        "email",
        "phone",
        "password",
        "role",
        "img",
        "remember_token"
    ];

    public $userRoles = [
        'company' => 'company',
        'broker' => 'broker',
        'user' => 'user'
    ];

    protected $useTimestamps = true;

    protected $returnType = 'object';


    public function getUserByEmail(string $email)
    {
        return $this->where(['email' => $email])->first();

    }
}