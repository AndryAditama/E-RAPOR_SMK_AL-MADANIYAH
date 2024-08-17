<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $authModel;
    public function __construct()
    {
        $this->authModel = new AuthModel();
    }
    public function login()
    {
        return view('login');
    }

    public function cek_login()
    {
        $username = $this->request->getVar("username");
        $password = $this->request->getVar("password");

        $cek_data = $this->authModel->login($username, $password);

        if ($cek_data) {
            session()->set("log", true);
            session()->set("id_user", $cek_data["id_user"]);
            session()->set("role", $cek_data["role"]);
            if ($cek_data["role"] == 1) {
                return redirect()->to(site_url("admin/dashboard"));
            } else {
                return redirect()->to(site_url("guru/dashboard"));
            }
        } else {
            session()->setFlashdata("pesan_error", "Username atau password salah");
            return redirect()->to(site_url("auth/login"));
        }
    }

    public function logout()
    {
        session()->remove("log");
        session()->remove("id_user");
        session()->remove("role");

        return redirect()->to(site_url("auth/login"));
    }
}
