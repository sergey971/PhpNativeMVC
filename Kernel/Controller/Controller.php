<?php

namespace Kernel\Controller;

use Kernel\Views\View;
abstract class Controller
{

    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public  function view($name){
        $this ->view ->page($name);

    }



}