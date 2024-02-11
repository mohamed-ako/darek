<?php
include 'conx.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['authenticated'] = false;

$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if ($result && $row = mysqli_fetch_assoc($result)) {
    // $_SESSION['id_user'] = $row['id'];
    $_SESSION['authenticated'] = true;
    $_SESSION['conn'] = $conn;
    // After successful login
$_SESSION['user_info'] = $row['id'] . ',' . $row['first_name'] . ',' . $row['last_name'];

    header("Location: profile.php");
    exit();
} else {
    $_SESSION['error'] = 'Invalid username or password';
    header("Location: login.php?error=Invalid%20username%20or%20password");
}
?>
