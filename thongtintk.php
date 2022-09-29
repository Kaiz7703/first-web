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
        if($_SESSION['role']==0){
            echo 'Username:' . $_SESSION['name'];
            echo "<br/>";
            echo 'Your password:' . $_SESSION['pass'];?>
            <p>Delete your account <a href="xoatk.php">Delete</a></p><br>
            <p>Change your password <a href="doimk.php">Changes</a></p><br>

        <?php
        }
        else{
            $conn = new PDO("mysql:host=localhost;dbname=thongtin", "root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $data = $conn->query("SELECT Username, Email FROM login");
            $d = $data ->fetchAll(); ?>
            <div class ="card-header">
                <h2> User list <h2>
            </div>
            <div class="container">
            <table class >
            <thead>
              <tr>
                <th class="header"> ID </th>
                <th class="header"> Username </th>
                <th class="header"> Email </th>
                <th class="header"> Fix </th>
                <th class="header"> Delete </th>
            </tr>
            </thead>
            <tbody>
              <?php 
                $i=1;
                foreach($d as $row ) { ?>
                  <tr>
                    <td> <?php echo $i++; ?> </td>
                    <td> <?php echo $row['Username'] ?></td> 
                    <td> <?php echo $row['Email']; ?> </td>
                    <td> <a href="suattin.php">Fix</a> &nbsp; </td>
                    <td> <a href="xoatk.php">Delete</a> </td>
                  </tr>
               <?php } ?>
              </tbody>
                </table>
                </div>
                <a href="adminaddacc.php">Add new user </a><br>
              <!-- <a href="dashboard-admin.php">Go Back To Dashboard</a> -->
       <?php } ?>
</body>
</html>