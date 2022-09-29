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
            <h2>New account</h2>
            <form method = "post" action="taotk.php">
                <span>Username</span>
                <input type="text" name="Username"><br>
                <span>Email</span>
                <input type="text" name="Email"><br>
                <span>Password</span>
                <input type="password" name="Password"><br>
                <span>Rewrite password</span>
                <input type="password" name="RePassword"><br>
                <input type="submit" value = "Submit">
            </form>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                
                if(isset($_POST['Username']) && isset($_POST['Password']) && isset($_POST['RePassword']) && $_POST["Password"] == $_POST["RePassword"]){
                    if($_POST['Password'] != $_POST['RePassword']){echo "Your Password does not match";}
                    else{
                        $Name = $_POST["Username"];
                        $Pass = $_POST["Password"];
                        $Email = $_POST["Email"];
                        try {
                            $conn = new PDO("mysql:host=localhost;dbname=thongtin", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $dem = "SELECT username FROM login WHERE username='$Name'";
                            $med = $conn->query($dem);
                            $count = $med->rowCount();
                            if($count>=1){
                                echo "<script>alert('Username has been used!');</script>";
                            }
                            else{
                            $ac = "INSERT INTO `login`(`Username`, `Password`, `Email`, `Role`) VALUES ('$Name','$Pass','$Email','0')";
                            $ca = $conn->query($ac);
                            echo "<script>alert('Your account added to system!');</script>";
                            }
                            
                            
                            
                
                        }
                        catch(PDOException $e){
                        echo "Conection failed: ".$e -> getMessage;
                        }
                    }
                }
            
        
    ?>
</body>
</html>