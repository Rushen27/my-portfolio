<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Secure File Sharing System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-dark text-white">

<nav class="navbar navbar-dark bg-black">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Secure File System</span>
        <div>
            <a href="login.php" class="btn btn-outline-light">Login</a>
            <a href="register.php" class="btn btn-primary">Register</a>
        </div>
    </div>
</nav>

<div class="container text-center mt-5">
    <h1 class="display-4">Secure File Sharing System</h1>
    <p class="lead mt-3">Upload, Share and Download Files Securely</p>
    <a href="login.php" class="btn btn-lg btn-primary mt-3">Get Started</a>
</div>

</body>
</html>