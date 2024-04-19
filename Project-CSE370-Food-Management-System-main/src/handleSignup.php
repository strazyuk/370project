<?php
require_once('DBconnect.php');

if (isset($_POST['role']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $role = $_POST['role'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email or username already exists
    $check_query = "SELECT * FROM user WHERE email='$email' OR username='$username'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "Account already exists.";
    } else {
        // Insert new user if account doesn't exist
        $sql = "INSERT INTO user (email, username, password, role) VALUES ('$email', '$username', '$password', '$role')";
        $result = mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn)) {
            if ($role == 'student') {
                $tokens = 0;
                // Continue with inserting new customer
                $sql = "INSERT INTO student (email, tokenCnt) VALUES ('$email', '$tokens')";
                $result = mysqli_query($conn, $sql);
            } else if ($role == 'admin') {
                $revenue = 0;
                $wrkHr = "0";
                // Continue with inserting new seller
                $sql = "INSERT INTO admin (email ,password , revenue ,wrkHrs) VALUES ('$email', '$password', '$revenue', '$wrkHr')";
                $result = mysqli_query($conn, $sql);
            }
            header("Location: login.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} else {
    echo "All fields are required.";
}
?>
