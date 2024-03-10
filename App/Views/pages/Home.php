<?php
use App\Controllers\ViewController;
$title = 'Главная страница';
ViewController::part('header', $title);
?>
<h1>home</h1>
<?php
ViewController::part('footer');
?>