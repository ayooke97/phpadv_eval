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
    global $conn;
    $username = $_POST['username'];
    $password = $_POST['password'];
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

function read($data = '')
{
    global $conn;
    if (empty($data)) {
        $data = 'user';
    }
    // var_dump($data);
    // die;
    $query = mysqli_query($conn, "SELECT * FROM $data");
    return $query;
}

function edit($data, $id)
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

function delete()
{
    global $conn;
    $id = $_POST['id'];
    $query = mysqli_query($conn, "DELETE FROM user WHERE user_id= $id");
    if ($query) {
        header("Location:tables.php");
    }
    return $query;
}
