<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<section>
    <div class="noi-dung">
        <div class="form">
            <h2>Log in</h2>
            <form method = "post" action="xuli.php">
                <div class="input-form">
                    <span>User name</span>
                    <input type="text" name="Username">
                </div>
                <div class="input-form">
                    <span>Password</span>
                    <input type="password" name="Password">
                </div>
                <div class="nho-dang-nhap">
                    <label><input type="checkbox" name=""> Remember my password</label>
                </div>
                <div class="input-form">
                    <input type="submit" name="Sub" value="Submit">
                </div>
                <div class="input-form">
                    <p>Don't have an account ?<a href="taotk.php">Sign up</a></p><br>
                </div>
                <div class="input-form">
                    <p>Forgot your password ? <a href="quenmk.php">Forgot</a></p>
                </div>
            </form>
            <h3>Đăng Nhập Bằng Mạng Xã Hội</h3>
            <ul class="icon-dang-nhap">
                <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                <li><i class="fa fa-google" aria-hidden="true"></i></li>
                <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
            </ul>
        </div>
    </div>
    
</section>


</body>
</html>