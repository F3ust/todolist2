<?php
    session_start();
    include("connect.php");

    
    if (isset($_GET['id1'])) {
        $id1 = $_GET['id1'];
        $sql = "SELECT * FROM todolist where id = '$id1'";
        $res = $connect->query($sql);
        $nm = '';
        $id = '';
        $ab = '';
        while($row = $res->fetch_assoc()) {
            $nm = $row["nm"];
            $id = $row["id"];
            $ab = $row['ab'];
        }    
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#tinymce'
      });
    </script>
</head>
<body>


<?php
    
    if (isset($_GET['id1'])) {
        $uid = $_SESSION['id'];
        $sql ="SELECT * From todolist where id = '$id' and usid = '$uid'";
        $res = $connect->query($sql);
        $nrows = $res->num_rows;
        if ($nrows == 1) {

?>

    <form action="#" method="post">
            <input type="text" hidden name="id" value="<?php echo $id ?>">  
            Tiêu đề: <br> <input type="text" name="nm" size="100" value="<?php echo $nm ?>">
            <br>
            <br>
            Nội dung: <br>
            <textarea name="ab" id="tinymce"><?php echo $ab ?></textarea>
            <br>
            <input type="submit" name="dk" value="Thay đổi">
        </form>
<?php
        }
    } else if (isset($_GET['ok'])) {
        echo "Cập nhật thành công." . " ";
        echo "<a href='index.php'>Nhấn vào đây để về trang chủ</a>";
    } else {
        echo "Sai thông tin." . " ";
        echo "<a href='index.php'>Nhấn vào đây để về trang chủ</a>";
    }
?>


<?php
    if (isset($_POST['dk'])) {
        $nm = $_POST["nm"];
        $ab = $_POST["ab"];
        include("connect.php");
        $sql = "UPDATE todolist SET nm = '$nm', ab= '$ab' where id = '$id'";

        $res = $connect->query($sql);

        header("Location: update.php?ok=1");
        
    }
    $connect->close();
?>
</body>
</html>