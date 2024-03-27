<?php
/**
 * @var \Kernel\Views\View $view
 */
$view->components("start");
?>

<h1>Add post page</h1>
    <form action="/admin/articles/add" method="post">
        <label for="name">Введите что-то:</label>
        <input type="text" id="name" name="name">
        <button>Отправить</button>
    </form>
<?php
$view->components("end");
?>