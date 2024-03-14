<?php
require_once(dirname(__DIR__) . "/vendor/autoload.php");

use App\App;

$app = new App();
$app->dispatch();