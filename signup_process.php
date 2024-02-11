<?php
session_start(); // Start the session

include "conx.php";
// Process the signup form data
function isStrongPassword($password) {
    // Implement your password strength criteria here
    // For example, check minimum length, presence of uppercase, lowercase, numbers, etc.
    return strlen($password) >= 8 && preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password) && preg_match('/[0-9]/', $password);
}

// Process the signup form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Check password strength
    if (!isStrongPassword($password)) {
        // Weak password, redirect back to signup with an error message
        $_SESSION['signup_error'] = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.";
        header("Location: signup.php");
        exit();
    }

    // Hash the password for security
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the User table
    $sql = "INSERT INTO User (first_name, last_name, username, password, email, publisher) VALUES ('$first_name', '$last_name', '$username', '$password', '$email', 0)";
    $_SESSION['authenticated'] = false;

    if ($conn->query($sql) === TRUE) {
        // Successful registration
        $user_id_query = "SELECT id FROM User WHERE username = '$username'";
        $result = $conn->query($user_id_query);
        $sql2 = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result2 = mysqli_query($conn, $sql2);

        if ($result && $result->num_rows > 0) {
            // $user_info = $result->fetch_assoc();
        $row = mysqli_fetch_assoc($result2);
        $_SESSION['user_info'] = $row['id'] . ',' . $row['first_name'] . ',' . $row['last_name'];

            // $user_id = $user_info['id'];

            // Store the user ID in the session
            $_SESSION['user_id'] = $user_id;
    $_SESSION['authenticated'] = true;

            header("Location: profile.php");
            exit();
        } else {
            // Handle error if user ID is not found
            $_SESSION['signup_error'] = "User ID not found.";
            header("Location: signup.php");
            exit();
        }
    } else {
        // Handle registration error
        $_SESSION['signup_error'] = "Error: " . $conn->error;
        header("Location: signup.php");
        exit();
    }
}

$conn->close();
?>