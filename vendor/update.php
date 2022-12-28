<?
session_start();
require_once("connect.php");
$name_institution = $_POST['name_institution'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$login = $_POST['login'];
$password = $_POST['password'];
mysqli_query($connect, "UPDATE user SET name_institution = '$name_institution', login = '$login', phone = '$phone', email = '$email', password = '$password' WHERE id_user = '$_SESSION[id_user]'");
// unset($_SESSION['namemenu']);
header('Location: ../profile.php');
?>