<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="#">
    <span>Type file name</span>
    <input type="text" name="filename">
    <input type="submit" name="sub" value="Submit">
</form>

<?php
if(isset($_POST['filename'])){
    $name=$_POST['filename'];
    $path_info = pathinfo($name);
    $check = $path_info['extension'];
    if($check == 'png' || $check == 'jpg'){  
        $path = "img/".$name ; 
        $status = unlink($path);
        if ($status){
            echo "File bị xóa thành công!";
        } else {
            echo "Error: File không bị xóa.";
        }
    }
    else{
        $path = "file/".$name ; 
        $status = unlink($path);
        if ($status){
            echo "<script>alert('File bị xóa thành công!')</script>";
        } else {
            echo "Error: File không bị xóa.";
        }
    }
}
?> 
</body>
</html>