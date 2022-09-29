<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php session_start();?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
if($_POST["Username"] == '' || $_POST["Password"] == ''){
  echo "<script>alert('You need to enter both Username and Password'); location ='giaodien.php?action=login';</script>";
}
else if(isset($_POST['Username']) && isset($_POST['Password'])){
  $Name = $_POST["Username"];
  $Pass = $_POST["Password"];
  try {
    $conn = new PDO("mysql:host=$servername;dbname=thongtin", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ab = "SELECT * FROM login WHERE Username = '$Name' AND Password = '$Pass'";
    $bc = $conn->query($ab);
    $_SESSION['name'] = $_POST['Username'];
    $_SESSION['pass'] = $_POST['Password'];
    foreach($bc as $x){
      $_SESSION['role'] = $x['Role'];
      if($x['Role'] == '1'){
        header("location: admin.php");
      }
      else{
        header("location: user.php");
      }
    }

  }
  catch(PDOException $e){
    echo "Conection failed: ".$e -> getMessage;
  }
}
?>



</body>
</html>