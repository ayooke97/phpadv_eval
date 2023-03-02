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

            if ($row['role'] == 'admin') {
                header('location:admin.php');
            } else if ($row['role'] == 'editor') {
                header('location:main.php');
            } else {
                header('location:main.php');
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
    header('location:main.php');
}
function register()
{
    global $conn;
    $username = $_POST['username'];
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    // $rpass = mysqli_real_escape_string($conn, $_POST['rpass']);
    $role = $_POST['role'];
    if (empty($role)) {
        $role = '';
        echo "<script>alert('Silahkan pilih role')</script>";
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
        header('location:../View/main.php');
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
    $tanggal = $_POST['tanggal'];
    $query = "UPDATE post SET judul = '{$judul}', isi = '{$isi}', tanggalDibuat = '{$tanggal}' WHERE idPostingan=$id";
    $stmt = mysqli_query($conn, $query);
    return $stmt;
}

function delete_post()
{
    global $conn;
    $id = $_POST['id'];
    $query = mysqli_query($conn, "DELETE FROM post WHERE idPostingan= $id");
    if ($query) {
        header("Location:tables.php");
    }
    return $query;
}

function edit_produk($data, $id)
{
    $namaProduk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $desc = $_POST['desc'];
    global $conn;
    $query = "UPDATE produk SET namaProduk = '{$namaProduk}', foto = '{$foto}', harga = '{$harga}',descProduk = '{$desc}' WHERE id_produk=$id";
    $stmt = mysqli_query($conn, $query);
    return $stmt;
}

function delete_produk()
{
    global $conn;
    $id = $_POST['id'];
    $query = mysqli_query($conn, "DELETE FROM produk WHERE id_produk= $id");
    if ($query) {
        header("Location:tables.php");
    }
    return $query;
}

function tambah_produk()
{

    $namaProduk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['full_path'];
    $desc = $_POST['desc'];
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
                $query = mysqli_query($conn, "INSERT INTO produk (idProduk,namaProduk,foto,harga,descProduk) VALUES ('','$namaProduk','$random_name','$harga','$desc')");
                header('location:admin.php');
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
        $query = "INSERT INTO post (idPostingan,judul,isi,kategoriID,user_id) VALUES ('', '$judul', '$isi','$kategori','$userid')";
        if (isset($_SESSION['judul'])) {
            unset($_SESSION['judul']);
        }
        $exec = mysqli_query($conn, $query);

        echo "<script>alert('Blog berhasil ditambah!')</script>";

        // echo '<meta http-equiv="refresh" content="1; url=admin.php" />';
        sleep(3);
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
