<?php
function editUser($data, $id, $conn)
{
    $username = $data['username'];
    $pass = mysqli_real_escape_string($conn, $data['pass']);
    $rpass = mysqli_real_escape_string($conn, $data['rpass']);

    if ($pass === '' || $rpass === '') {
        return false;
    } elseif ($pass !== $rpass) {
        return false;
    } else {
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
        $query = "UPDATE user SET username = '{$username}', password = '{$hashedPassword}' WHERE user_id={$id}";
        mysqli_query($conn, $query);
        return true;
    }
}

function alert($message, $isSuccess)
{
    if (!$isSuccess) {
        echo '<script>
    alert("Password tidak boleh kosong atau password tidak sama")
</script>';
    } else {
        echo '<script>
    alert("Edit berhasil")
</script>';
        header("Location:tables.php");
    }
}

$data = $_SESSION['edit'];
$id = $_POST['id'];
$conn = mysqli_connect($host, $username, $password, $db);

$isSuccess = editUser($data, $id, $conn);
alert($message, $isSuccess);
