<?php
include_once '../srv/config.php';

if (isset($_POST['login'])) {
    login();
}
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'editor') {
        header('location:admin.php');
    } else {
        header('location:blogmenu.php');
    }
    // header('Location:main.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php include_once "./navbar.php"; ?>
    <section class="container">
        <h3 class="text-center">Login</h3>
        <form action="" method="post" class="w-50 mx-auto">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" id="email" name="username" value="<?= isset($_SESSION['login_input']) ? $_SESSION['login_input']['username'] : '' ?>" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberme">
                <label class="form-check-label" for="rememberme">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Submit</button>
            <p>Don't have account? <a href="register.php">Register Here!</a></p>
        </form>
    </section>
</body>

</html>