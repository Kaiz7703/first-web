<? session_start() ?>
<?php
function setComments($conn)
{
    if(isset($_POST['CommentSubmit']))
    {
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        if(isset($_POST['message'])){
            $message = $_POST['message'];
            $ac = "INSERT INTO `comments`(`uid`, `date`, `message`) VALUES ('$uid','$date','$message')";
            $ca = $conn->query($ac);
        }
        else{header("location : admin.php");}
    } 
}

function getComments($conn)
{
    $result = $conn->query('SELECT * FROM comments');
    // $result->fetch(PDO::FETCH_ASSOC);
    // while ($row = $result->fetch()) 
    foreach($result as $row)
    {
        
        echo "<div class='comment-box'><p>";
            echo $row['uid']."<br>";
            echo $row['date']."<br>";
            echo nl2br($row['message']);
            $u1=$_SESSION['name'];
            $u2=$row['uid'];
            $role = $_SESSION['role'];
        if($u1 == $u2 || $role == 1)  { 
        echo "</p>
            <form class='delete-form' method='POST' action='".deleteComments($conn)."'>
                <input type='hidden' name='cid' value='".$row['cid']."'>
                <button type='submit' name ='CommentDelete'>Delete</button>
            </form>
            <form class='edit-form' method='POST' action='editcomment.php'>
                <input type='hidden' name='cid' value='".$row['cid']."'>
                <input type='hidden' name='uid' value='".$row['uid']."'>
                <input type='hidden' name='date' value='".$row['date']."'>
                <input type='hidden' name='message' value='".$row['message']."'>
                <button>Edit</button>
            </form>";
        }
        echo "<form class='cmt-form' method='POST' action='binhluan.php'>
        <input type='hidden' name='cid' value='".$row['cid']."'>
        <input type='hidden' name='uid' value='".$row['uid']."'>
        <input type='hidden' name='date' value='".$row['date']."'>
        <input type='hidden' name='message' value='".$row['message']."'>
        <button type='submit' name='comment'>Comment</button>
    </form></div>";


        $aa = "SELECT * FROM cmt WHERE postid = '$row[cid]' ";
        $result1 = $conn->query($aa);
        foreach($result1 as $row1){
            echo "<div class='binhluan-box'><p>";
                echo $row1['user']."<br>";
                echo $row1['date']."<br>";
                echo nl2br($row1['cmt'])."<br>";
            echo"</p>
            <form class='delete2-form' method='POST' action='".deleteBinhluan($conn)."'>
                <input type='hidden' name='id' value='".$row1['id']."'>
                <button type='submit' name ='delcom'>Delete</button>
            </form>
            <form class='edit2-form' method='POST' action='editbinhluan.php'>
                <input type='hidden' name='id' value='".$row1['id']."'>
                <input type='hidden' name='uid' value='".$row1['user']."'>
                <input type='hidden' name='date' value='".$row1['date']."'>
                <input type='hidden' name='cmt' value='".$row1['cmt']."'>
                <button>Edit</button>
            </form>
        </div>";
        }
    }
}

function editComments($conn)
{
    if(isset($_POST['CommentSubmit']))
    {
        $cid = $_POST['cid'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql= "UPDATE comments SET message='$message' WHERE cid='$cid'";
        $result = $conn ->query($sql);
        header("Location: post.php");
    } 
}

function deleteComments($conn)
{
    if(isset($_POST['CommentDelete']))
    {
        $cid = $_POST['cid'];

        $sql= "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn ->query($sql);
        echo "<script>alert'Deleted'</script>";
        header("Location: post.php");
    } 
}
function setbinhluan($conn)
{   
    if(isset($_POST['cmt'])){
        $com = $_POST['cmt'];
        $cid = $_POST['cid'];
        $uid = $_SESSION['name'];
        $date = $_POST['date2'];
        if(isset($_POST['comment'])){
            $cid = $_POST['cid'];
            $sql = "INSERT INTO `cmt`(`postid`, `cmt`,`date`,`user`) VALUES ('$cid','$com','$date','$uid')";
            $run = $conn->query($sql);
        }
        header("Location: post.php");
    }
}
function editBinhluan($conn)
{
    if(isset($_POST['Sub']))
    {
        $id = $_POST['id'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['cmt'];

        $sql= "UPDATE cmt SET cmt='$message' WHERE id='$id'";
        $result = $conn ->query($sql);
        header("Location: post.php");
    } 
}

function deleteBinhluan($conn)
{
    if(isset($_POST['delcom']))
    {
        $id = $_POST['id'];
        $sql= "DELETE FROM cmt WHERE id='$id'";
        $result = $conn ->query($sql);
        echo "<script>alert'Deleted'</script>";
        header("Location: post.php");
    } 
}