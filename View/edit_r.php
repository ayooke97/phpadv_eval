<?php
include_once '../srv/config.php';

// $id =  base64_decode($_GET['user_id'], 1);
$id = $_GET['user_id'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id_blog=$id");
$user = mysqli_fetch_assoc($query);
// var_dump($result);

if (isset($_POST['submit'])) {
    var_dump($_POST);
    edit($_POST, $id);
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
        <div class="card">
            <div class="card-body">
                <form action="" method="post" class="">
                    <div class="form-group">
                        <label for="Judul">Judul blog</label>
                        <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Isi</label>
                        <textarea name="sinopsis" id="" cols="" rows="10" class="form-control"><?= $result['sinopsis'] ?></textarea>
                    </div>
                    <label for="tglposting">Tanggal Posting</label>
                    <input type="text" name="rpass" value="" class="form-control" disabled>
                    <button class="mt-4 btn btn-success btn-block" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>