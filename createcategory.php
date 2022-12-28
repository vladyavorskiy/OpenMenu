<?php
    session_start();
    require_once("vendor/connect.php");
    if (!$_SESSION['id_user']) {
        header('Location: index.php');
    }
    elseif (!$_SESSION['id_name_menu']) {
        header('Location: menu.php');
    }

    // $mastypeCAT = array("Основная");
    // $masCAT = array();
    if(isset($_POST['create'])){
        $namecategory = $_POST['namecategory'];
        $typecategory = $_POST['choiseTYPE'];
        $id_name_menu = $_SESSION['id_name_menu'];
        if(!mysqli_query($connect, "INSERT INTO category (name_category, type_category, id_name_menu) VALUES ('$namecategory', '$typecategory', '$id_name_menu')")){
            printf("Сообщение ошибки: %s\n", mysqli_error($connect));
        }   
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
    <!-- Категории Меню -->
        <p>OpenMenu</p>
    <form action="" method="POST">
        <input type="text" name="namecategory" placeholder="Категория 1">
        <select name="choiseTYPE">
            <option>Основная</option><?
            $result = mysqli_query($connect, "SELECT * FROM category WHERE id_name_menu = '$_SESSION[id_name_menu]' AND type_category = 'Основная'");
            while ($row = mysqli_fetch_row($result)) {
                echo "<option>$row[1]</option>";
            }
        ?></select>
        <button type="submit" name="create">Создать</button>

        <h2 style="margin: 10px 0;"><?= $_SESSION['id_user'] ?></h2>
        <a href="category.php">НАЗАД</a>
    </form>
</body>
</html>


