<?
	session_start();
	require_once("connect.php");
	$nameMenu = $_POST['nameMenu'];
	$url = "https://OpenMenu/".$nameMenu;
	$qr_code = "http://chart.apis.google.com/chart?cht=qr&chs=150x150&chl=".$url;
	$path = 'uploads/'. time().$_FILES['logo']['name'];
	if(!move_uploaded_file($_FILES['logo']['tmp_name'], '../'.$path)){
		mysqli_query($connect, "UPDATE menu SET URL_menu = '$url', name_menu = '$nameMenu', QR_code = '$qr_code' WHERE id_menu = '$_SESSION[id_user]'");
		header('Location: ../menusetting.php');
	}
	else{
		mysqli_query($connect, "UPDATE menu SET URL_menu = '$url', name_menu = '$nameMenu', logo = '$path', QR_code = '$qr_code' WHERE id_menu = '$_SESSION[id_user]'");
	}
	header('Location: ../menusetting.php');	
?>