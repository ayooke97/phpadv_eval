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
            <?php include_once "./artikel.php"; ?>
            <aside class="col-4">
                Artikel terkait
                <div class="row px-3 d-flex gap-3">
                    <div class="w-100 border border-2 rounded-4">
                        <section>
                            <h3>Judul 1</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, doloremque?...</p>
                            <div class="d-flex w-100 align-items-center">

                                <div class="w-50">
                                    <p>Author</p>
                                    <p>Tanggal Posting</p>
                                </div>
                                <div class="w-50 text-end px-3">
                                    <a href="./judul">Read More...</a>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="w-100 border border-2 rounded-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit facilis illo mollitia hic atque, sit nisi assumenda tenetur qui, doloribus laboriosam quae pariatur numquam neque placeat fugiat, voluptatum dignissimos provident. In repellat expedita perferendis fugiat, tempora libero odit neque similique optio ratione dolore officiis accusantium esse explicabo, ipsam eligendi temporibus?
                    </div>
                    <div class="w-100 border border-2 rounded-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit facilis illo mollitia hic atque, sit nisi assumenda tenetur qui, doloribus laboriosam quae pariatur numquam neque placeat fugiat, voluptatum dignissimos provident. In repellat expedita perferendis fugiat, tempora libero odit neque similique optio ratione dolore officiis accusantium esse explicabo, ipsam eligendi temporibus?
                    </div>
                </div>
            </aside>
        </div>
    </main>
    <footer class="text-center my-3 py-5 border border-2">
        2023 Wes Makmur. All rights reserved.
    </footer>
</body>

</html>