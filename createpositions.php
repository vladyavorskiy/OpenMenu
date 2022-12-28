<?php
    session_start();
    require_once("vendor/connect.php");
    if (!$_SESSION['id_user']) {
        header('Location: index.php');
    }
    elseif (!$_SESSION['id_name_menu']) {
        header('Location: menu.php');
    }

    if(isset($_POST['create'])){
        // print_r($_FILES);
        $path = 'uploads/'. time().$_FILES['picture']['name'];
        if(!move_uploaded_file($_FILES['picture']['tmp_name'], $path)){
            $_SESSION['message'] = 'Ошибка при загрузке изображения';
            header('Location: ../positions.php');
        }

        $nameposition = $_POST['nameposition'];
        $price = $_POST['price'];
        $id_category = $_POST['choiseTYPE'];
        $description =$_POST['description'];

        $result = mysqli_query($connect, "SELECT * FROM category WHERE name_category = '$id_category'");
        while ($row = mysqli_fetch_row($result)) {
            $id_category = $row[0];
        }


        if(!mysqli_query($connect, "INSERT INTO dish (name_dish, price, id_category, description, URL_picture, id_dish_menu) VALUES ('$nameposition', '$price', '$id_category', '$description', '$path', '$_SESSION[id_name_menu]')")){
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
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="nameposition" required placeholder="Позиция 1">
        <input type="text" name="price" required pattern="[0-9]+">
        <select name="choiseTYPE">
            <!-- <option>Основная</option> -->
            <?
            $result = mysqli_query($connect, "SELECT * FROM category WHERE id_name_menu = '$_SESSION[id_name_menu]'");
            while ($row = mysqli_fetch_row($result)) {
                echo "<option>$row[1]</option>";
            }
        ?></select>
        <textarea name="description" required></textarea>
        <input type="file" id="picture" name="picture" required>
        <button type="submit" name="create">Создать</button>


        <h2 style="margin: 10px 0;"><?= $_SESSION['id_user'] ?></h2>
        <a href="positions.php">НАЗАД</a>
    </form>
</body>
</html>


<pre>
    <?
        // print_r($_SESSION);
        // print_r($_FILES)
    ?>
</pre>