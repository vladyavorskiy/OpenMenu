<?php
    session_start();
    require_once("vendor/connect.php");
    if (!$_SESSION['id_user']) {
        header('Location: index.php');
    }
    elseif (!$_SESSION['id_name_menu']) {
        header('Location: menu.php');
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
    ul{
        margin-left: 20px;
    }
</style>
<body>
    <!-- Категории Меню -->
    <div class="menu">
        <a class="Amenu" href="menusetting.php">Меню</a><a class="Amenu" href="profile.php">Профиль</a>
    </div>
    <div class="menuset">
        <a class="Amenu" href="menusetting.php">Настройки</a><a class="Amenu" href="">Категории</a><a class="Amenu" href="positions.php">Позиции</a>
    </div>
        <p>OpenMenu</p>
    <form action="createcategory.php" method="POST">
        <!-- <input type="search" name="search"> -->
        <button type="submit">Создать категорию</button>
        <? 
            $category_output = mysqli_query($connect, "SELECT * FROM category WHERE id_name_menu = '$_SESSION[id_name_menu]'");
            while ($row = mysqli_fetch_row($category_output)){
                if ($row[2] == "Основная") {
                    echo "<ul>";
                    echo "<li>$row[1]</li>";
                    $category_output2 = mysqli_query($connect, "SELECT * FROM category WHERE id_name_menu = '$_SESSION[id_name_menu]' AND type_category = '$row[1]'");
                    while ($row = mysqli_fetch_row($category_output2)){
                        echo "<ul><li>$row[1]</li></ul>";
                    }
                    echo "</ul>";
                }
            }
        ?>



        <h2 style="margin: 10px 0;"><?= $_SESSION['id_user'] ?></h2>
    </form>
</body>
</html>