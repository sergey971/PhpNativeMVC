<?php

namespace App\Controller;

use Kernel\Controller\Controller;
class AboutController extends Controller
{
    public function index()
    {
        $this->view('about');
    }

}