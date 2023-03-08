<?php
session_start();
$db = 'jamu';
$username = 'root';
$password = '';
$host = 'localhost'; //
$conn = mysqli_connect($host, $username, $password, $db);

try {
    if ($conn) {
        // echo '<div class="ms-3">koneksi berhasil</div>';
    } else {
        throw new Exception('Koneksi Gagal');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

function login()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    global $conn;
    $checkadmin = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_num_rows($checkadmin) > 0) {
        $_SESSION['login_input'] = $_POST;
        $row = mysqli_fetch_assoc($checkadmin);
        $passcheck = password_verify($password, $row['password']);
        if ($passcheck == true) {
            // $_SESSION['user']['username'] = $row['username'];
            // $_SESSION['user']['role'] = $row['role'];
            $_SESSION['user'] = [
                'username' => $row['username'],
                'role' => $row['role'],
            ];
            unset($_SESSION['login_input']);

            if ($row['role'] == 'admin' || $row['role'] == 'editor') {
                header('location:admin.php');
            } else {
                header('location:blogmenu.php');
            }
        } else {
            echo '<script type="text/javascript">alert("Password Salah")</script>';
        }
    }
    // $checkeditor = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND role = 'editor'");
    // if (mysqli_num_rows($checkeditor) > 0) {
    //     $row = mysqli_fetch_assoc($checkeditor);
    //     $passcheck = password_verify($password, $row['password']);
    //     if ($passcheck == true) {
    //         header('location:main_editor.php');
    //     } else {
    //         echo '<script type="text/javascript">alert("Password Salah")</script>';
    //     }
    // }

}

function logout()
{
    unset($_SESSION['user']);
    header('location:login.php');
}
function register()
{
    global $conn;
    $username = $_POST['username'];
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    // $rpass = mysqli_real_escape_string($conn, $_POST['rpass']);
    $role = $_POST['role'];
    if (empty($role)) {
        $role = 'ordinaryuser';
        // echo "<script>alert('Silahkan pilih role')</script>";
    }

    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $check = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Email sudah terdaftar')</script>";
        $_SESSION['v_input'] = $_POST;
    } else {
        $query = mysqli_query($conn, "INSERT INTO user (user_id,username,password,role) VALUES ('','$username','$pass','$role')");
        if (isset($_SESSION['v_input'])) {
            unset($_SESSION['v_input']);
        }
        echo '<script>alert("Pendaftaran berhasil!")</script>';
        echo "<script>window.location.replace('main.php')</script>'";
        return $query;
    }
}

function read($data)
{
    global $conn;
    switch ($data) {
        case 'user':
            $data = 'user';
            break;
        case 'post':
            $data = 'post';
            break;
        case 'produk':
            $data = 'produk';
            break;
        case 'kategori':
            $data = 'kategori';
    }
    // var_dump($data);
    // die;
    $query = mysqli_query($conn, "SELECT * FROM $data");
    return $query;
}

function edit_user($data, $id)
{
    global $conn;
    $username = $data['username'];
    $pass = mysqli_real_escape_string($conn, $data['pass']);
    $rpass = mysqli_real_escape_string($conn, $data['rpass']);
    $role = $data['role'];
    if ($pass !== $rpass) {
        echo '<script>alert("Password tidak sama")</script>';
        $_SESSION['edit'] = $data;
    } else if ($pass == '' || $rpass == '') {
        echo '<script>alert("Password tidak boleh kosong")</script>';
        $_SESSION['edit'] = $data;
    } else {
        $h_pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = mysqli_query($conn, "UPDATE user SET username = '{$username}', password = '{$h_pass}', role = '{$role}' WHERE user_id=$id");
        echo '<script>alert("Edit berhasil")</script>';
        unset($_SESSION['edit']);
        header("Location:tables.php");
        return $query;
    }
}

function delete_user()
{
    global $conn;
    $id = $_POST['id'];
    $query = mysqli_query($conn, "DELETE FROM user WHERE user_id= $id");
    if ($query) {
        header("Location:tables.php");
    }
    return $query;
}

function edit_post($data, $id)
{
    global $conn;
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    // $tanggal = $_POST['tanggal'];
    $query = "UPDATE post SET judul = '{$judul}', isi = '{$isi}' WHERE idPostingan=$id";
    $stmt = mysqli_query($conn, $query);
    if ($stmt) {
        header("Location:tables_post.php");
    }
    return $stmt;
}

function delete_post()
{
    global $conn;
    $id = base64_decode($_POST['post_id']);
    $query = mysqli_query($conn, "DELETE FROM post WHERE idPostingan= $id");
    if ($query) {
        header("Location:tables_post.php");
    }
    return $query;
}

function edit_produk($data, $id)
{
    $namaProduk = $data['nama_produk'];
    $harga = $data['harga'];
    $foto = $_FILES['foto']['name'];
    $desc = $data['desc'];
    global $conn;
    if ($foto != "") {
        $allowed_ext = ["jpg", "jpeg", "png"];
        $x = explode('.', $foto);
        $ext = strtolower(end($x));
        $file_temp = $_FILES['foto']['tmp_name'];
        $random_name = rand(1, 999) . '-' . $foto;
        $size = $_FILES["foto"]["size"];
        if ($size > 5242880) {
            echo "<script>alert('File terlalu besar')</script>";
            echo '<script>window.location.replace("create.php");</script>';
        } else {
            if (in_array($ext, $allowed_ext) === true) {
                move_uploaded_file($file_temp, "../View/img/" . $random_name);
                $query = mysqli_query($conn, "UPDATE produk SET namaProduk = '{$namaProduk}', foto = '{$foto}', harga = '{$harga}',descProduk = '{$desc}' WHERE idProduk=$id");
                header('location:admin.php');
            } else {
                echo "<script>alert('File wajib berformat .jpg, .jpeg dan .png')</script>";
            }
        }
    } else {
        $query = "UPDATE produk SET namaProduk = '{$namaProduk}', harga = '{$harga}',descProduk = '{$desc}' WHERE idProduk=$id";
        $stmt = mysqli_query($conn, $query);
        header('location:admin.php');
    }

    return $stmt;
}

function delete_produk()
{
    global $conn;
    $id = $_POST['id'];
    $query = mysqli_query($conn, "DELETE FROM produk WHERE idProduk= $id");
    if ($query) {
        header("Location:tables_produk.php");
    }
    return $query;
}

function tambah_produk()
{
    $namaProduk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['full_path'];
    $desc = $_POST['desc'];
    $kategori = $_POST['kategori'];
    global $conn;
    if ($foto != "") {
        $allowed_ext = ["jpg", "jpeg", "png"];
        $x = explode('.', $foto);
        $ext = strtolower(end($x));
        $file_temp = $_FILES['foto']['tmp_name'];
        $random_name = rand(1, 999) . '-' . $foto;
        $size = $_FILES["foto"]["size"];
        if ($size > 5242880) {
            echo "<script>alert('File terlalu besar')</script>";
            echo '<script>window.location.replace("create.php");</script>';
            $_SESSION['produk'] = $_POST;
        } else {
            if (in_array($ext, $allowed_ext) === true) {
                move_uploaded_file($file_temp, "../View/img/" . $random_name);
                $query = mysqli_query($conn, "INSERT INTO produk (idProduk,namaProduk,foto,harga,descProduk,kategoriID) VALUES ('','$namaProduk','$random_name','$harga','$desc',$kategori)");
                unset($_SESSION['produk']);
                header('Location:admin.php');
            } else {
                echo "<script>alert('File wajib berformat .jpg, .jpeg dan .png')</script>";
                $_SESSION['produk'] = $_POST;
            }
        }
    }
}

function read_produk($data = '')
{
    global $conn;
    if (empty($data)) {
        $data = 'produk';
    }
    // var_dump($data);
    // die;
    $query = mysqli_query($conn, "SELECT * FROM $data");
    return $query;
}

function read_post($data = '')
{
    global $conn;
    if (empty($data)) {
        $data = 'post';
    }
    // var_dump($data);
    // die;
    $query = mysqli_query($conn, "SELECT * FROM $data");
    return $query;
}

function tambah_post()
{
    global $conn;
    $queryid = mysqli_query($conn, "SELECT * FROM post ORDER BY idPostingan DESC");
    $res = mysqli_fetch_assoc($queryid);
    $postid = $res['idPostingan'] + 1;
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $userid = $_POST['id'];
    $kategori = $_POST['kategori'];
    $tanggal = date("Y-m-d");
    if (empty($judul)) {
        echo "<script>alert('Judul wajib diisi')</script>";
    }
    $check = mysqli_query($conn, "SELECT * FROM post WHERE judul = '$judul'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Judul sudah ada')</script>";
        $_SESSION['judul'] = $_POST;
    } else {
        $query = "INSERT INTO post (idPostingan,judul,isi,kategoriID,user_id) VALUES ($postid, '$judul', '$isi','$kategori','$userid')";
        if (isset($_SESSION['judul'])) {
            unset($_SESSION['judul']);
        }
        $exec = mysqli_query($conn, $query);

        sleep(3);
        echo "<script>alert('Blog berhasil ditambah!')</script>";

        // echo '<meta http-equiv="refresh" content="1; url=admin.php" />';
        // header('location:../View/admin.php');
        echo "<script>window.location.replace('admin.php')</script>";
        return $exec;
    }
    // $stmt = mysqli_query($conn, $query);
    // return $stmt;
}

function user()
{
    global $conn;
    $username = $_SESSION['user']['username'];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    return mysqli_fetch_assoc($query);
}
