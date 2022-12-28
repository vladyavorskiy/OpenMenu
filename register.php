<?php
    session_start();
    if ($_SESSION['id_user']) {
        header('Location: profile.php');
    }
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<!-- Форма регистрации -->
	<form action="vendor/signup.php" method="POST">
        <legend>Регистрация</legend>
            <label for="name_institution">Название заведения</label>
            <input type="text" id="name_institution" name="name_institution" required pattern="[a-zA-Zа-яА-ЯЁё0-9 -]{3,50}">
            <label for="email">Почта</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Номер телефона</label>
            <input type="tel" id="phone" name="phone" required pattern="^8[0-9]{10}$" placeholder="80000000000">
            <label for="login">Логин</label>
            <input type="text" id="login" name="login" required pattern="[a-zA-Z0-9-_]{3,50}">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required pattern="[a-zA-Z0-9-_]{3,100}">
            <label for="password">Подтверждение пароля</label>
            <input type="password" id="password_confirm" name="password_confirm" required pattern="[a-zA-Z0-9-_]{3,100}">
            <button type="submit">Зарегистрироваться</button>
            <p>
                У вас уже есть аккаунт? - <a href="/index.php">авторизируйтесь</a>!
            </p>
            <?
                if ($_SESSION['message']) {
                    echo '<p class="msg">'.$_SESSION['message'].'</p>';
                }
                unset($_SESSION['message']);
            ?>
    </form>
</body>
</html>