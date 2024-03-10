<?php
use App\Controllers\View;
$title = 'Главная страница';
View::part('header', $title);
?>
<h1>home</h1>
<?php
View::part('footer');
?>