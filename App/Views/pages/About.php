<?php

use App\Controllers\View;
$title = 'Обо мне';
View::part('header', $title);
?>
    <h1>About</h1>
<?php
View::part('footer');
?>