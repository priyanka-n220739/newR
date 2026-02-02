 <?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>alert('Incorrect Password');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>

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
.login-container {
    background: #ffffff;
    padding: 30px 35px;
    width: 360px;
    border-radius: 12px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    animation: fadeIn 0.8s ease-in-out;
}

/* Title */
.login-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #5b3db4;
}

/* Labels */
.login-container label {
    display: block;
    margin-bottom: 5px;
    color: #444;
    font-weight: 500;
}

/* Inputs */
.login-container input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    outline: none;
    transition: 0.3s;
}

.login-container input:focus {
    border-color: #7b5cff;
    box-shadow: 0 0 5px rgba(123,92,255,0.4);
}

/* Button */
.login-container button {
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

.login-container button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(91,61,180,0.4);
}

/* Footer */
.login-container p {
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
}

.login-container a {
    color: #7b5cff;
    text-decoration: none;
    font-weight: 500;
}

.login-container a:hover {
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

<div class="login-container">
    <h2>Login</h2>

    <form method="POST">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <button type="submit" name="login">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register</a></p>
</div>

</body>
</html>
