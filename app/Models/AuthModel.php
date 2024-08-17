<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $db;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
    }
    public function login($username, $password)
    {
        $builder = $this->db->table("users")->where(["username" => $username, "password" => $password]);
        $get_data = $builder->get()->getRowArray();
        return $get_data;
    }
}
