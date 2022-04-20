<?php


require("vendor/autoload.php");
include_once('src/config/config.php');
require("system/lib/databse-config.php");

use Controllers\LoginController;
use lib\Main;
use lib\Session;

session_start();
// session_destroy();

if (isset($_GET['url']) && $_GET['url']) {
    $main = new Main();
} else {
    header("Location:" . BASE_URL . 'indexController');
}
