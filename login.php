<?php
require "function/function.php";

if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $user = login($username, $pass);

    if($user){
        echo "<script>alert('Berhasil login!');</script>";

        if($user['role'] == '1'){
            echo "<script>document.location.href='admin.php'</script>";
        } else {
            echo "<script>document.location.href='index.php'</script>";
        }
    } else {
        echo "<script>alert('Login gagal. Cek kembali username dan password.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="img/regist (2).png" alt="sing up image"></figure>
                        <a href="regist.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Login"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="copyright">
            <p>&copy; 2023 PT PLN Persero</p>
        </div>



        <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('login-form').addEventListener('submit', function (event) {

                // Mendapatkan nilai input username dan password
                var username = document.getElementById('username').value;
                var password = document.getElementById('pass').value;

                // Menyimpan data di local storage
                localStorage.setItem('savedUsername', username);
                localStorage.setItem('savedPassword', password);
            });
        });
    </script>

</body>
</html>