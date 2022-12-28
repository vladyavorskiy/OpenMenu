<?
	session_start();
	require_once("connect.php");
	$name_institution = $_POST['name_institution'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$login = $_POST['login'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];
	$count=0;
	$result = mysqli_query($connect, "SELECT * FROM user");
	while ($row = mysqli_fetch_row($result)){
		if ($row[2] == $login) {
			$_SESSION['message'] = 'Профиль с таким логином уже существует';
			$count++;
		}
		else if($row[4] == $email || $row[3] == $phone){
			$_SESSION['message'] = 'К данной электронной почте или номеру телефона уже привязан аккаунт';
			$count++;
		}
	}
	if ($count==0) {
		if ($password === $password_confirm) {
			$password = md5($password);
			mysqli_query($connect, "INSERT INTO user (name_institution, login, phone, email, password) VALUES ('$name_institution', '$login', '$phone', '$email', '$password')");
			$_SESSION['message'] = 'Регистрация прошла успешно';
			header('Location: ../index.php');
		}
		else{
			$_SESSION['message'] = 'Пароли не совпадают';
			header('Location: ../register.php');
		}
	}
	else{
		header('Location: ../register.php');
	}
?>