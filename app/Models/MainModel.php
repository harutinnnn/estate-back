<?php

namespace App\Models;

use CodeIgniter\Model;

class MainModel extends Model
{
    /**
     * @return string
     */
    public function getTable(): string
    {
        return (string)$this->table;
    }

}