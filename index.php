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
<!-- Форма авторизации -->
	<form action="vendor/signin.php" method="POST">
		<legend>Авторизация</legend>
			<label for="login">Логин</label>
			<input type="text" id="login" name="login" required pattern="[a-zA-Z0-9-_]{3,50}">
			<label for="password">Пароль</label>
			<input type="password" id="password" name="password" required pattern="[a-zA-Z0-9-_]{3,100}">
			<button type="submit">Войти</button>
			<p>
	            У вас нет аккаунта? - <a href="/register.php">зарегистрируйтесь</a>!
	        </p>
	        <?php
	            if ($_SESSION['message']) {
	                echo '<p class="msg">'.$_SESSION['message'].'</p>';
	            }
	            unset($_SESSION['message']);
	        ?>
	</form>
</body>
</html>