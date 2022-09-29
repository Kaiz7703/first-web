<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Input your Email to reset password</h2>
    <form method = "post" action="quenmk.php">
        <span>Input your email</span>
        <input type="text" name ="Emaill"><br>
        <input type="submit" value = "Submit">
    </form>
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      if(isset($_POST['Emaill'])){
        
          $Mail = $_POST["Emaill"];
          
          try {
              $conn = new PDO("mysql:host=$servername;dbname=thongtin", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $ad = "UPDATE login SET Password = 'abc123' WHERE Email = '$Mail'";
              $da = $conn->query($ad);
              echo"<script>alert'Your reset password is abc123'</script>";
          }
          catch(PDOException $e){
          echo "Conection failed: ".$e -> getMessage;
          }
        
      }
  ?>
</body>
</html>