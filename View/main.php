<!DOCTYPE html>
<?php
include_once "../srv/config.php";
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'editor') {
        header("location:./admin.php");
    }
}
if (isset($_GET['logout'])) {
    logout();
}
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>
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
    <main class="container">
        <div class="row my-3">
            <?php include_once "./artikel.php"; ?>
            <aside class="col-4">
                Artikel terkait
            </aside>
        </div>
    </main>
    <footer class="text-center my-3 py-5 border border-2">
        2023 Wes Makmur. All rights reserved.
    </footer>
</body>

</html>