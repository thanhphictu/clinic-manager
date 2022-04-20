<?php

namespace lib;

use lib\Load;
use Jenssegers\Blade\Blade;

class DController
{
    protected $load = array();
    public  function __construct()
    {
        $this->load = new Load();
    }
    public function render($view, $data = [])
    {
        $blade = new Blade(PATH_VIEWS, 'storage');
        echo $blade->make($view, $data)->render();
    }
}
