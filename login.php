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
                Movie Archive | Login
            </div>
            <div class="card-body">
                <form action="post_login.php" method="POST">
                    <div class="form-group mb-2">
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Enter Email" class="form-control"/>
                </div>
                <div class="form-group mb-2">
                    <label for="passkey">Password</label>
                   <input type="password" name="passkey" placeholder="Enter Password" class="form-control">
                </div>
                <input type="submit" name="login" value="LOGIN" class="btn btn-primary btn-block btn-sm">
                </form>
            </div>
        </div>
    </div>
</body>
</html>