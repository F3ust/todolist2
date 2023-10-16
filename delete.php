
<?php  
        session_start();
		include("connect.php");
        
		
		$id = $_GET["id"];
        $uid = $_SESSION['id'];
        //$sql ="SELECT * From todolist where id = '$id' and usid = '$uid'";
        $sql ="SELECT * From todolist where id = '$id'";
        $res = $connect->query($sql);
        $nrows = $res->num_rows;

        if ($uid == $_SESSION['id'] && $nrows == 1) {
            $sql = "DELETE FROM todolist WHERE id = '$id'";
		    $res = $connect->query($sql);
        
            echo "Xóa thành công." . " ";
            echo "<a href='index.php'>Nhấn vào đây để về trang chủ</a>";
        } else {
            echo "Sai thông tin." . " ";
            echo "<a href='index.php'>Nhấn vào đây để về trang chủ</a>";
        }
		

		$connect->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE</title>
</head>
<body>
    
</body>
</html>

