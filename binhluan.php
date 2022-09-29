<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include 'comments.inc.php';
    include 'dbh.inc.php';
    session_start()
?>
 <?php
    $cid = $_POST['cid'];
    $uid = $_SESSION['name'];
    echo 
    "<form class='cmt-form' method='POST' action='".setbinhluan($conn)."'>
        <input type='hidden' name='cid' value='".$cid."'>
        <input type='hidden' name='uid' value='".$uid."'>
        <input type='hidden' name='date2' value='".date('Y-m-d H:i:s')."'>
        <input type='text' name='cmt'>
        <button type='submit' name='comment'>Comment</button>
</form>"
?>
</body>
</html>