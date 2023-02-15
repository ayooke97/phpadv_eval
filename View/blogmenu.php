<!DOCTYPE html>
<?php
include_once "../srv/config.php";
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'editor') {
        header("location:./admin.php");
    }
}
if (isset($_POST['logout'])) {
    logout();
}

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
            <div class="col-4">
                <article class="card w-100">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-success">Go somewhere</a>
                    </div>
                </article>
            </div>
            <div class="col-4">
                <article class="card w-100">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-success">Go somewhere</a>
                    </div>
                </article>
            </div>
            <div class="col-4">
                <article class="card w-100">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-success">Go somewhere</a>
                    </div>
                </article>
            </div>
        </div>
    </main>
</body>

</html>