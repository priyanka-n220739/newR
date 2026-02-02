<?php
include 'db.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check->num_rows > 0) {
        echo "<script>alert('Email already registered');</script>";
    } else {
        $insert = $conn->query(
            "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')"
        );
        if ($insert) {
            echo "<script>alert('Registration Successful'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>

<style>
/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", sans-serif;
}

/* Page background */
body {
    height: 100vh;
    background: #efe9ff; /* light lavender */
    display: flex; 
    align-items: center;
    justify-content: center;
}

/* Card */
.register-container {
    background: #ffffff;
    padding: 30px 35px;
    width: 360px;
    border-radius: 12px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    animation: fadeIn 0.8s ease-in-out;
}

/* Title */
.register-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #5b3db4;
}

/* Labels */
.register-container label {
    display: block;
    margin-bottom: 5px;
    color: #444;
    font-weight: 500;
}

/* Inputs */
.register-container input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    outline: none;
    transition: 0.3s;
}

.register-container input:focus {
    border-color: #7b5cff;
    box-shadow: 0 0 5px rgba(123,92,255,0.4);
}

/* Button */
.register-container button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: linear-gradient(135deg, #7b5cff, #5b3db4);
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

.register-container button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(91,61,180,0.4);
}

/* Footer */
.register-container p {
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
}

.register-container a {
    color: #7b5cff;
    text-decoration: none;
    font-weight: 500;
}

.register-container a:hover {
    text-decoration: underline;
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

</head>
<body>

<div class="register-container">
    <h2>Create Account</h2>

    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" placeholder="Enter username" required>

        <label>Email</label>
        <input type="email" name="email" placeholder="Enter email" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Create password" required>

        <button type="submit" name="register">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login</a></p>
</div>

</body>
</html>
