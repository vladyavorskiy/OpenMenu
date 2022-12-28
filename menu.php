<?php
    session_start();
    require_once("vendor/connect.php");
    if (!$_SESSION['id_user']) {
        header('Location: index.php');
    }
    elseif ($_SESSION['id_name_menu']) {
        header('Location: menusetting.php');
    }

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Меню</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<style>
</style>
<body>
    <!-- Меню -->
    <div class="menu">
        <a class="Amenu" href="">Меню</a><a class="Amenu" href="profile.php">Профиль</a>
    </div>
        <p>OpenMenu</p>

    <form action="vendor/createmenu.php" method="POST" enctype="multipart/form-data">
        <h4>Давайте создадим ваше первое QR-меню</h4>
        <label for="url">Адрес вашего электронного меню</label>
        <input id="url" type="text" name="url" placeholder="https://OpenMenu/Название_Вашего_Меню" disabled>
        <label for="nameMenu">Название вашего меню</label>
        <input id="nameMenu" type="text" name="nameMenu" required>
        <label for="logo">Логотип</label>
        <input type="file" id="logo" name="logo" required>
        <button type="submit">Создать</button>
        <h2 style="margin: 10px 0;"><?= $_SESSION['id_user'] ?></h2>
        <?
            if ($_SESSION['message']) {
                echo '<p class="msg">'.$_SESSION['message'].'</p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>
