<?php

namespace Controllers;

use lib\DController;


class CovidController extends DController
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
            $this->covidHome();
        }
    }
    public function covidHome()
    {
        $this->load->viewAdmin("sidebarAdmin", null);
        $this->load->viewAdmin("headerAdmin", null);
        $this->load->viewAdmin("CovidHome", null);
        $this->load->viewAdmin("footerAdmin", null);
    }
}
