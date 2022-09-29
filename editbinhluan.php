<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include 'comments.inc.php';
    include 'dbh.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title> Comments </title>
        <link rel="stylesheet" type="text/css" href="stylecmt4.css">
    </head>
<body> 
    <?php 
    $id = $_POST['id'];
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = $_POST['cmt'];
    echo "<form method='POST' action='".editBinhluan($conn)."'>
        <input type='hidden' name='id' value='".$id."'>
        <input type='hidden' name='uid' value='".$uid."'>
        <input type='hidden' name='date' value='".$date."'>
        <textarea name='cmt' required >".$message."</textarea><br>
        <button type='submit' name='Sub'>Edit</button>
    </form>";
    ?>
</body>
</html>