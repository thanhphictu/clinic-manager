<?php

namespace Controllers;

use lib\DController;
use lib\Session;
use Models\UsersModel;

// use Models;

class UserController extends DController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if (!isset($_SESSION['userLogin'])) {
            header('Location: ' . BASE_URL . 'LoginController');
        } else {
            $this->userPage();
        }
    }
    public function userPage()
    {
        // $userModel = $this->load->model("UserModel");
        // Session::init();
        // $isCreate = Session::getSession('isCreate');
        $this->load->viewAdmin("sidebarAdmin", null);
        $this->load->viewAdmin("headerAdmin", null);
        $this->load->viewAdmin("userPage", null);
        $this->load->viewAdmin("footerAdmin", null);
    }
    public function createUser()
    {
        if (
            isset($_POST['email']) && isset($_POST['password']) &&
            isset($_POST['firstName']) && isset($_POST['lastName']) &&
            isset($_POST['description'])  && isset($_FILES['image']) &&
            $_POST['email'] && $_POST['password'] &&
            $_POST['firstName'] && $_POST['lastName']
            && $_POST['description'] && $_FILES['image']
        ) {
            $data = $_POST;
            $userModel = new UsersModel();
            $userModel->fill($data);

            $target_file = PATH_UPLOAD_IMAGES . basename($_FILES["image"]["name"]);

            $uploadOk = 1;
            if (isset($_POST["image"])) {
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            }
            $userModel->password = md5($_POST['password']);
            $userModel->image = $_FILES["image"]["name"];
            $userModel->save();
  

            echo json_encode(array("status" => 0));

        } else {
           
            echo json_encode(array("status" => 1));
           
        }
    }

    public function notFoundPage()
    {
        $this->load->viewAdmin('404', null);
    }
}
