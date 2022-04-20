<?php

namespace lib;

// use Models;

class Load
{
    public function __construct()
    {
    }
    public function viewAdmin($filename, ...$data)
    {
        include 'src/Views/admin/' . $filename . '.php';
    }
    public function model($filename)
    {
        $drModel = 'Models\\' . $filename;
        return new $drModel();
    }
}
