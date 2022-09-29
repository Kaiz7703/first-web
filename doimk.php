<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Input your password to delete account</h2>
    <form method = "post" action="doimk.php">
        <span>Input your password</span>
        <input type="password" name="Password"><br>
        <span>Input new password</span>
        <input type="password" name="NPassword"><br>
        <span>Rewrite password</span>
        <input type="password" name="RePassword"><br>
        <input type="submit" value = "Submit">
    </form>
    <?php session_start() ?>
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      if(isset($_POST['Password']) && isset($_POST['NPassword']) && isset($_POST['RePassword'])){
        if($_POST['NPassword'] != $_POST['RePassword']){echo "Your Password does not match";}
        else{
          $User = $_SESSION['name'];
          $New = $_POST["NPassword"];
          try {
              $conn = new PDO("mysql:host=$servername;dbname=thongtin", $username, $password);
    
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              // $ab = "SELECT * FROM login WHERE Password = '$Pass'";
              // $bc = $conn->query($ab);
              $ba ="UPDATE login SET Password = '$New' WHERE Username = '$User'";
              $ca = $conn->query($ba);
              echo "Changed";
    
          }
          catch(PDOException $e){
          echo "Conection failed: ".$e -> getMessage();
          
          }
        } 
      }
  ?>
</body>
</html>