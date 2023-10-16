<?php
    session_start();
    include("connect.php");
    $uid = $_GET['uid'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Work</title>
    
</head>
<body>
<?php 
    if ($uid != $_SESSION['id']) {
        echo "Sai thông tin ";
        echo "<a href='index.php'>Nhấn vào đây để về trang chủ</a>";
    } else {
?>

    <form method="post">
        Tiêu đề: <br> <input type="text" name="nm" size="100">
        <br>
        <br>
        Nội dung: <br>
        <textarea name="ab" id="mytextarea"></textarea>
        <br>
        <input type="submit" name="dk" value="Thêm">
    </form>
    
<?php 
    }
?>
<?php
    if (isset($_POST['dk'])) {
        $fn = $_POST["nm"];
        $ab = $_POST["ab"];
        include("connect.php");
        $sql = "INSERT INTO todolist VALUES(NULL, '$fn', '$ab', '$uid')";

        $res = $connect->query($sql);
		
        $connect->close();
	    header("Location: index.php");
    }
?>
</body>
</html>
