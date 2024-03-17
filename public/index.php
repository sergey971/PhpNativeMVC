<?php
require_once(dirname(__DIR__) . "/vendor/autoload.php");
// Константы
define("VIEW_PATH", dirname(__DIR__) . "/views");

use App\App;

$app = new App();
$app->dispatch();