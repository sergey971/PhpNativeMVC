<?php

namespace App\Controller;
use Kernel\Controller\Controller;
class HomeController extends Controller
{


    public function index()
    {
            $this->view('home');
    }


}
