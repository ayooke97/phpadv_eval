<?php
include_once '../srv/config.php';
if (isset($_POST['register'])) {
    register();
}
if (isset($_SESSION['v_input'])) {
    $v_input = $_SESSION['v_input'];
}
if (isset($_SESSION['user'])) {
    header('Location:main.php');
}
if (isset($v_input['role'])) {
    $user = $v_input['role'];
} else {
    $user = '';
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
        <h3 class="text-center">Register</h3>
        <form class="w-50 mx-auto" action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="username">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Mendaftar sebagai</label>
                <div class="d-flex gap-2">
                    <!-- <input type="hidden" name="role" value=""> -->
                    <input type="radio" name="role" id="user" value="ordinaryuser" <?= $user == "ordinaryuser" ? 'checked' : 'checked' ?>>
                    <label for="user">User</label>
                    <input type="radio" name="role" id="admin" value="admin" <?= $user == "admin" ? 'checked' : '' ?>>
                    <label for="admin">Admin</label>
                    <input type="radio" name="role" id="editor" value="
                    editor" <?= $user == "editor" ? 'checked' : '' ?>>
                    <label for="editor">Editor</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Submit</button>
            <p>Already have account? <a href="login.php">Login Here!</a></p>
        </form>
    </section>
</body>

</html>