<?php
    session_start();
    require_once("vendor/connect.php");
    if (!$_SESSION['id_user']) {
        header('Location: index.php');
    }
    $result = mysqli_query($connect, "SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'");
    while ($row = mysqli_fetch_row($result)){
        $name_institution = $row[1];
        $email = $row[4];
        $phone = $row[3];
        $login = $row[2];
        $password = $row[5];
    }
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <!-- Профиль -->
    <div class="menu">
        <a class="Amenu" href="menu.php">Меню</a><a class="Amenu" href="">Профиль</a>
    </div>
        <p>OpenMenu</p>
    <form action="vendor/update.php" method="POST">
        <label for="name_institution">Название заведения</label>
        <input type="text" id="name_institution" name="name_institution" value="<?echo $name_institution?>" required pattern="[a-zA-Zа-яА-ЯЁё0-9 -]{3,50}">
        <label for="email">Почта</label>
        <input type="email" id="email" name="email" value="<?echo $email?>" required>
        <label for="phone">Номер телефона</label>
        <input type="tel" id="phone" name="phone" value="<?echo $phone?>" required pattern="^8[0-9]{10}$" placeholder="80000000000">
        <label for="login">Логин</label>
        <input type="text" id="login" name="login" value="<?echo $login?>" required pattern="[a-zA-Z0-9-_]{3,50}">
        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" value="<?echo $password?>" required pattern="[a-zA-Z0-9-_]{3,100}">
        <button type="submit">Сохранить</button>
        <h2 style="margin: 10px 0;"><?= $_SESSION['id_user'] ?></h2>
        <a href="vendor/logout.php" class="logout">Выход</a>
    </form>
</body>
</html>