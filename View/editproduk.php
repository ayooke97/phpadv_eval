<?php
include_once '../srv/config.php';

$id =  base64_decode($_GET['idProduk'], 1);
// $id = $_GET['user_id'];
$query = mysqli_query($conn, "SELECT * FROM produk WHERE idProduk=$id");
$produk = mysqli_fetch_assoc($query);
// echo "<pre>";
// var_dump($produk);
// die;

if (isset($_POST['submit'])) {
    edit_produk($_POST, $id);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="card my-3">
            <div class="card-body">
                <form action="" method="post" class="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="namaProduk">Nama Produk</label>
                        <input type="text" name="nama_produk" value="<?= $produk['namaProduk'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Produk</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" value="<?= $produk['harga'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="descProduk">Deskripsi</label>
                        <textarea name="desc" id="" cols="" rows="" class="form-control"><?= $produk['descProduk'] ?></textarea>
                    </div>

                    <button class="mt-4 btn btn-success btn-block" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>