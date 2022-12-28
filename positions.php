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
        <a class="Amenu" href="menu.php">Меню</a><a class="Amenu" href="profile.php">Профиль</a>
    </div>
    <div class="menuset">
        <a class="Amenu" href="menusetting.php">Настройки</a><a class="Amenu" href="category.php">Категории</a><a class="Amenu" href="">Позиции</a>
    </div>
        <p>OpenMenu</p>
    <form action="createpositions.php" method="POST">
        <button type="submit">Создать позицию</button>
        <? 
            $dish_output = mysqli_query($connect, "SELECT * FROM dish WHERE id_dish_menu = '$_SESSION[id_name_menu]'");
            echo "<ul>";
            while ($row = mysqli_fetch_row($dish_output)){
                $category_output = mysqli_query($connect, "SELECT * FROM category WHERE id_category = '$row[3]'");
                while ($row1 = mysqli_fetch_row($category_output)) {
                    echo "<li>$row[1] - $row[2] руб. - $row1[1]</li>";
                }
                
            }
            echo "</ul>";
        ?>



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