<?php

namespace App\Controllers;
class HomeController
{
    public static function index(){
        View::page('Home');
    }
}