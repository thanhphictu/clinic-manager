<?php

namespace Controllers;

use lib\DController;
use lib\Session;
use Models\LoginAccountsModel;
use Models\UsersModel;

// use Models;

class LoginController extends DController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->loginPage();
    }
    public function loginPage()
    {
        $this->load->viewAdmin("login", null);
    }
    public function checkLogin()
    {
        if (
            isset($_POST['user']) && isset($_POST['password'])
            &&  $_POST['user'] && $_POST['password']
        ) {
            $user = $_POST['user'];
            $password = md5($_POST['password']);
            $checkUser = LoginAccountsModel::where('user', $user)
                ->first();
            $checkPass = LoginAccountsModel::where('password', $password)
                ->first();
            if (!$checkUser) {
                $this->load->viewAdmin("login", 'Tài khoản này chưa tạo');
            } else if ($checkUser && !$checkPass) {
                $this->load->viewAdmin("login", 'Sai mật khẩu');
            } else if ($checkUser && $checkPass) {
                $_SESSION['userLogin'] = $checkUser->user;
                $_SESSION['nameLogin'] = $checkUser->name;
                $_SESSION['imageLogin'] = $checkUser->image;
                header('Location: ' . BASE_URL);
            }
        }
    }
    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}
