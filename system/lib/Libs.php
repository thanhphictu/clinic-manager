<?php

namespace lib;

class Libs
{
    function debug($param)
    {
        echo "<pre>";
        print_r($param);
        echo "</pre>";
        die();
    }

    function printdata($param)
    {
        echo "<pre>";
        print_r($param);
        echo "</pre>";
    }
}
