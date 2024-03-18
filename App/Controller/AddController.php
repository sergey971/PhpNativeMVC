<?php

namespace App\Controller;

use Kernel\Controller\Controller;
class AddController extends Controller
{
    public function add()
    {
        $this->view('add');
    }

}