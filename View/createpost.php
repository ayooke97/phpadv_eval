<?php
include_once '../srv/config.php';

// $id =  base64_decode($_GET['user_id'], 1);
// $id = $_GET['idPostingan'];
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
// var_dump(user());
$user = user();

if (isset($_POST['submit'])) {
    // var_dump($_POST);
    // die();
    tambah_post();
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
                <form action="" method="post" class="d-flex flex-column">
                    <div class="form-group d-flex flex-column">
                        <label for="penerbit">Kategori</label>
                        <select name="kategori">
                            <!-- <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option> -->
                            <?php foreach ($kategori as $kat) : ?>
                                <option value="<?= $kat['idKategori'] ?>"><?= $kat['namaKategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="form-control">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="isi">Isi Postingan</label>
                        <textarea title="blog" name="isi" id="" cols="" rows=""></textarea>
                        <input type="hidden" name="id" value="<?= $user['user_id'] ?>">
                    </div>
                    <button class="mt-4 btn btn-success" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>