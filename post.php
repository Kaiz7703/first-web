<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include 'comments.inc.php';
    include 'dbh.inc.php';
?>
<?php session_start()?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title> Comments </title>
        <link rel="stylesheet" href="stylecmt4.css">

    </head>
<body>
    <h1>Post sth here</h1>
    <?php 
    $uu = $_SESSION['name'];
    echo "<form method='POST' action='".setComments($conn)."'>
        <input type='hidden' name='uid' value='$uu'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <textarea name='message' required ></textarea><br>
        <button type='submit' name='CommentSubmit'>Post</button>
    </form>";
    getComments($conn);
    ?>

</body>
</html>