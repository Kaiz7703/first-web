<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php session_start() ?>
    <?php 
        if($_SESSION['role'] == 0 ){ ?>
            <h2> Upload your file here </h2><br>
            <h1> Image </h1>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="imgfile"  id="fileUpload" accept=".jpg, .png">
                <input type="submit" name="submit" >
            </form>
            <?php
                if(isset($_POST['submit'])){
                    if(isset($_FILES['imgfile'])){
                        move_uploaded_file($_FILES['imgfile']['tmp_name'], './img/' .$_FILES['imgfile']['name']);
                    }
                } ?>
            <h1> File </h1>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="Upfile"  id="fileUpload" accept=".txt, .doc" >
                <input type="submit" name="submit" >
            </form>
            <?php
                if(isset($_POST['submit'])){
                    if(isset($_FILES['Upfile'])){
                        move_uploaded_file($_FILES['Upfile']['tmp_name'], './file/' .$_FILES['Upfile']['name']);
                    }
                }
        }    
        else { ?>
            <form method = "POST" >
                <input type = "submit" name = "check" value = "check">
            </form>
            <a href = "xoafile.php">Delete a file here</a><br>
<?php
            if(isset($_POST['check'])){
                $file2 = scandir('./file');
                $file1 = scandir('./img');
                $max1 = count ($file1);
                $max2 = count ($file2);
                for($i=2;$i<=$max1 - 1;$i++){
                    echo '<a href="img/'.$file1[$i].'">'.$file1[$i].'</a><br>' ;
                }
                for($i=2;$i<=$max2 - 1;$i++){
                    echo '<a href="file/'.$file2[$i].'">'.$file2[$i]."<br>" ;
                }
        
            }
        }
?>

        
</body>
</html>