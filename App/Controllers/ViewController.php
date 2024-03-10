<?php

namespace App\Controllers;

class ViewController
{
    public static function page($name): void{
        require_once VIEWS_PATH . '/pages/' . $name . '.php';
    }
    public static function part($name, $title = ''): void{
        require_once VIEWS_PATH . '/parts/' . $name . '.php';
    }
}