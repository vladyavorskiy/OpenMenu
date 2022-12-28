<?php
    session_start();
    require_once("connect.php");
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    $check_user = mysqli_query($connect, "SELECT * FROM user WHERE login = '$login' AND password = '$password'");
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['id_user'] = $user['id_user'];
        header('Location: ../profile.php');
    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../index.php');
    }
?>
