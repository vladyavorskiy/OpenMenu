<?
session_start();
    require_once("connect.php");
        // print_r($_FILES);
        print_r($_FILES['picture']);
        $path = 'uploads/'. time().$_FILES['picture']['name'];
        echo $path;
        if(!move_uploaded_file($_FILES['picture']['tmp_name'], "../".$path)){
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


        if(!mysqli_query($connect, "INSERT INTO dish (name_dish, price, id_category, description, URL_picture) VALUES ('$nameposition', '$price' '$id_category', '$description', '$path')")){
            printf("Сообщение ошибки: %s\n", mysqli_error($connect));
        } 

        // header('Location: ../createpositions.php');

    ?>