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
        if ($_SESSION['role'] == 0){ ?>
            <h2>Input your password to delete account</h2>
            <form method = "post" action="xoatk.php">
                <span>Password</span>
                <input type="password" name="Password"><br>
                <input type="submit" value = "Submit">
            </form>
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              if(isset($_POST['Password'])){
                  $Pass = $_POST["Password"];
                  try {
                      $conn = new PDO("mysql:host=$servername;dbname=thongtin", $username, $password);
            
                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $ab = "DELETE FROM login WHERE Password = '$Pass'";
                      $bc = $conn->query($ab);
                      echo "<script>alert('Your account is deleted');</script>";
            
                  }
                  catch(PDOException $e){
                  echo "<script>alert('Error');</script>".$e -> getMessage;
                  }
              }        
        }
        else { ?>
            <h2>Input Username</h2>
                <form method = "post" action="xoatk.php">
                <span>Username</span>
                <input type="text" name="Username"><br>
                <input type="submit" value = "Submit">
            </form>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                if(isset($_POST['Username'])){
                    $User = $_POST["Username"];
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=thongtin", $username, $password); 
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $ab = "DELETE FROM login WHERE Username = '$User'";
                        $bc = $conn->query($ab);
                        echo "<script>alert('Your account is deleted');</script>";
                    }
                    catch(PDOException $e){
                        echo "<script>alert('Error');</script>".$e -> getMessage;
                    }
                }
        }
    ?>        
</body>
</html>