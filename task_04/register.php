<?php
include 'db.php';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password

    // Check if email already exists
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($check->num_rows > 0){
        echo "<script>alert('Email already registered'); window.location='register.php';</script>";
    } else {
        $insert = $conn->query("INSERT INTO users (username,email,password) VALUES('$username','$email','$password')");
        if($insert){
            echo "<script>alert('Registration Successful'); window.location='login.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Register</h2>
<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="register">Register</button>
</form>
<p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>