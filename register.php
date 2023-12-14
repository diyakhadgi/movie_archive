<?php
    if(isset($_POST['register'])) {
        $email = '';
        $passkey = '';
        $email_msg = '';
        $passkey_msg = '';

        if(isset($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            $email_msg = "Email field is required";
        }

        if(isset($_POST['passkey'])) {
            $passkey = $_POST['passkey'];
        } else {
            $passkey_msg = "Password field is required";
        }

        if(isset($_POST['email']) && isset($_POST['passkey'])) {
            // hashing user password
            $passkey_hash = password_hash($passkey, PASSWORD_BCRYPT);
 
            // insert query
            $query = "INSERT INTO ma_user(`email`, `password_encrypt`, `passkey_backup`)
            VALUES('$email', '$passkey_hash', '$passkey')";

            // database connection
            $connect = mysqli_connect('localhost', 'root', '', 'movie_archive_db');

            // registering user data to database
            $response = mysqli_query($connect, $query);
            if($response) {
                header('location: home.php?msg=Success');
            }

        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card mt-3 p-5">
            <div class="card-header card-title">
                Movie Archive | Register
            </div>
            <div class="card-body">
                <form action="register.php" method="POST">
                    <div class="form-group mb-2">
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Enter Email" class="form-control"/>
                </div>
                <div class="form-group mb-2">
                    <label for="passkey">Password</label>
                   <input type="password" name="passkey" placeholder="Enter Password" class="form-control">
                </div>
                <input type="submit" name="register" value="REGISTER" class="btn btn-primary btn-block btn-sm">
                </form>
            </div>
        </div>
    </div>
</body>
</html>