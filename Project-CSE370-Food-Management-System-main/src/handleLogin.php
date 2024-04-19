<?php
require_once('DBconnect.php');

if(isset($_POST['email']) && isset($_POST['password'])){
    $e = $_POST['email'];
    $p = $_POST['password'];
    $sql = "SELECT * FROM user WHERE email = '$e' AND password = '$p'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) != 0){
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];
        $username = $row['username']; 
        $email = $row['email'];
        setcookie('username', '', time() + (86400 * 30), "/");
        setcookie('username', $username, time() + (86400 * 30), "/");
        setcookie('email', '', time() + (86400 * 30), "/");
        setcookie('email', $email, time() + (86400 * 30), "/");
        setcookie('role', '', time() + (86400 * 30), "/");
        setcookie('role', $role, time() + (86400 * 30), "/");
        if ($role == 'admin'){
            header("Location: adminHome.php");
            exit(); // Stop further execution
        }
        else if ($role == 'student'){
            header("Location: customerHome.php");
            exit(); // Stop further execution
        }
    }
    else{
        // Redirect back to login page with error message
        header("Location: login.php?error=invalid");
        exit(); // Stop further execution
    }
}
?>
