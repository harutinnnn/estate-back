<?php


namespace App\Models;


use CodeIgniter\Model;
use Faker\Factory;

class UserModel extends MainModel
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "first_name",
        "last_name",
        "email",
        "password",
        "role",
        "img",
        "remember_token"
    ];

    public $userRoles = [
        'admin' => 'admin',
        'editor' => 'editor',
        'user' => 'user'
    ];

    protected $useTimestamps = true;

    protected $returnType = 'object';

    public function userSeeder($count = 1)
    {

        $faker = Factory::create();

        for ($i = 0; $i < $count; $i++) {

            $this->insert(
                [
                    "name" => $faker->name,
                    "email" => $faker->email,
                    "password" => sha1($faker->password),
                    "img" => $faker->imageUrl(),
                ]
            );
        }
    }


    public function getUserByEmail(string $email)
    {


        return $this->where(['email' => $email])->first();

    }
}