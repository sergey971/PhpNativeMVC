<?php

namespace App\Controllers;
class HomeController
{
    public static function index(){
        ViewController::page('Home');
    }
}