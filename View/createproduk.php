<?php
include_once '../srv/config.php';

// $id =  base64_decode($_GET['user_id'], 1);
// $id = $_GET['idPostingan'];
$query = mysqli_query($conn, "SELECT * FROM kategori");
$kategori = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
    // echo '<pre>';
    // var_dump($_POST, $_FILES);
    // die();
    tambah_produk();
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
                <form action="" method="post" class="d-flex flex-column" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nama_produk">Kategori</label>
                        <select name="kategori" id="">
                            <?php foreach ($query as $q) : ?>
                                <option value="<?= $q['idKategori'] ?>"><?= $q['namaKategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="desc">Deskripsi Produk</label>
                        <textarea name="desc" id="" cols="30" rows="10"></textarea>
                    </div>

                    <button class="mt-4 btn btn-success" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>