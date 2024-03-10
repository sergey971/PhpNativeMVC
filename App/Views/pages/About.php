<?php

use App\Controllers\ViewController;
$title = 'Обо мне';
ViewController::part('header', $title);
?>
    <h1>About</h1>
<?php
ViewController::part('footer');
?>