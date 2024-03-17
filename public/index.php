<?php
require_once(dirname(__DIR__) . "/vendor/autoload.php");
// Константы
define("CSS_PATH", __DIR__ . "/assets/css");
define("VIEW_PATH", dirname(__DIR__) . "/views");

use App\App;

$app = new App();
$app->dispatch();