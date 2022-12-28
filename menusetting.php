<?php
    session_start();
    require_once("vendor/connect.php");
    if (!$_SESSION['id_user']) {
        header('Location: index.php');
    }
    elseif (!$_SESSION['id_name_menu']) {
        header('Location: menu.php');
    }
    $result = mysqli_query($connect, "SELECT * FROM menu WHERE id_menu = '$_SESSION[id_user]'");
    while ($row = mysqli_fetch_row($result)){
        $url = $row[1];
        $nameMenu = $row[2];
        $logo = $row[3];
        $qr_code = $row[4];
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
    img{
        width: 100px;
/*        display: inline-block;*/
    }
</style>
<body>
    <!-- Настройки Меню -->
    <div class="menu">
        <a class="Amenu" href="">Меню</a><a class="Amenu" href="profile.php">Профиль</a>
    </div>
    <div class="menuset">
        <a class="Amenu" href="">Настройки</a><a class="Amenu" href="category.php">Категории</a><a class="Amenu" href="positions.php">Позиции</a>
    </div>
        <p>OpenMenu</p>
    <form action="vendor/updatemenu.php" method="POST" enctype="multipart/form-data">
        <label for="url">Адрес вашего электронного меню</label>
        <input id="url" type="text" name="url" value="<?echo $url?>" disabled>
        <label for="nameMenu">Название вашего меню</label>
        <input id="nameMenu" type="text" name="nameMenu" value="<?echo $nameMenu?>" required>
        <label>Ваш QR-code</label>
        <img src="<?echo $qr_code?>">
        <label for="logo">Логотип</label>
        <img src="<?echo $logo?>">
        <input type="file" id="logo" name="logo">
        <button type="submit">Сохранить</button>
        <h2 style="margin: 10px 0;"><?= $_SESSION['id_user'] ?></h2>
    </form>
</body>
</html>
