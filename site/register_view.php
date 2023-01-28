<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']) {
    header('Location: ' . 'index.php');
}
?>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="col-md-10 mx-auto col-lg-5">
                <h1 class="text-center">Register</h1>
            <form action="register.php" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                <hr class="my-4">
                <small class="text-muted"><a href="login_view.php">I already have an account</a></small>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
