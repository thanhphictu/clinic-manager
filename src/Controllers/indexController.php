<?php

namespace Controllers;


use lib\DController;
use Models\AllcodesModel;
use Models\UsersModel;

class indexController extends DController
{
    public $data = array();
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if (!isset($_SESSION['userLogin'])) {
            header('Location: ' . BASE_URL . 'LoginController');
        } else {
            $UsersModel = UsersModel::all()
                ->sortDesc();

            $this->homePage($UsersModel);
        }
    }
    public function homePage($data)
    {
        if (!isset($_GET['update']) && !isset($_GET['delete'])) {
            $this->load->viewAdmin("sidebarAdmin", null);
            $this->load->viewAdmin("headerAdmin", null);
            $this->render("admin.homePage", ['data' => $data]);
            $this->load->viewAdmin("userPage", "update");
            $this->load->viewAdmin("footerAdmin", null);
            // 
            // 
        } else if (isset($_GET['update']) && $_GET['update']) {
            $idUpdate = $_GET['update'];
            $dataById = UsersModel::find($idUpdate);

            $this->load->viewAdmin("sidebarAdmin", null);
            $this->load->viewAdmin("headerAdmin", null);
            $this->render("admin.homePage", ['data' => $data]);
            $this->render("admin.handleHomePage", ['dataById' => $dataById]);
            $this->load->viewAdmin("footerAdmin", null);
            // 
            // 
        } else if (isset($_GET['delete']) && $_GET['delete']) {
            $idDelete = $_GET['delete'];
            $dataById = UsersModel::find($idDelete);
            $imgById = $dataById->image;
            // remove old image
            $target_file_img = PATH_UPLOAD_IMAGES . $imgById;
            unlink($target_file_img);
            UsersModel::destroy($idDelete);

            header('Location: ' . BASE_URL);
        }
    }
    public function updateUserById()
    {
        if (isset($_POST['idUpdate']) && $_POST['idUpdate']) {
            $idUpdate = $_POST['idUpdate'];
            $dataById = UsersModel::find($idUpdate);
            $data = $_POST;
            $dataById->fill($data);

            $imgName = basename($_FILES["image"]["name"]);

            // remove old image
            $oldImgName = ($_POST["oldImg"]);
            if ($imgName && $oldImgName) {

                $target_file_old_img = PATH_UPLOAD_IMAGES . $oldImgName;
                unlink($target_file_old_img);
            }
            // upload new image
            if ($imgName) {
                $target_file = PATH_UPLOAD_IMAGES . $imgName;
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

                $dataById->image = $imgName;
            }

            $dataById->save();
            header('Location: ' . BASE_URL);
        }
    }

    public function notFoundPage()
    {
        $this->load->viewAdmin('404', null);
    }
}
