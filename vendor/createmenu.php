<?
	session_start();
    require_once("connect.php");
	$nameMenu = $_POST['nameMenu'];
	$check_namemenu = mysqli_query($connect, "SELECT * FROM menu WHERE name_menu = '$nameMenu'");
	if (mysqli_num_rows($check_namemenu) > 0) {
		$_SESSION['message'] = 'Такое название меню уже существует';
		header('Location: ../menu.php');
	}
	else{
		$url = "https://OpenMenu/".$nameMenu;
	    $path = 'uploads/'.time().$_FILES['logo']['name'];
	    // echo $path;
	    if(!move_uploaded_file($_FILES['logo']['tmp_name'], '../'.$path)){
	    	$_SESSION['message'] = 'Ошибка при загрузке изображения';
	    	header('Location: ../menu.php');
	    }
	    $qr_code = "http://chart.apis.google.com/chart?cht=qr&chs=150x150&chl=".$url;
	    mysqli_query($connect, "INSERT INTO menu (id_menu, URL_menu, name_menu, logo, QR_code) VALUES ( '$_SESSION[id_user]', '$url', '$nameMenu', '$path', '$qr_code')");
	    // $_SESSION['nameMenu'] = $nameMenu;
    	$writeID = mysqli_query($connect, "SELECT * FROM menu WHERE name_menu = '$nameMenu'");
	    while ($row = mysqli_fetch_row($writeID)){
	    	$id_name_menu = $row[0];
	    }
	    $_SESSION['id_name_menu'] = $id_name_menu;
	    header('Location: ../menusetting.php'); 
	}  
?>
