<?php
session_start();
include "config/database.php";

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password']))
        {
            // Generate OTP
            $otp = rand(100000, 999999);
            $expiry = date("Y-m-d H:i:s", strtotime("+5 minutes"));

            // Save OTP in database
            $update = "UPDATE users SET otp_code='$otp', otp_expiry='$expiry' WHERE email='$email'";
            $conn->query($update);

            // Save temporary session
            $_SESSION['otp_user_id'] = $user['id'];
            $_SESSION['otp_email'] = $user['email'];

            // Send OTP to email
            mail($email, "Your OTP Code", "Your OTP is: $otp");

            // Redirect to OTP page
            header("Location: otp.php");
            exit();
        }
        else
        {
            $error = "Wrong password";
        }
    }
    else
    {
        $error = "User not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-4">

<div class="card">

<div class="card-header text-center">
<h4>User Login</h4>
</div>

<div class="card-body">

<?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

<form method="POST">

<input type="email" name="email" class="form-control mb-3" placeholder="Email">

<input type="password" name="password" class="form-control mb-3" placeholder="Password">

<button type="submit" name="login" class="btn btn-primary w-100">
Login
</button>

</form>

<br>

<a href="register.php">Create account</a>

</div>

</div>

</div>

</div>

</div>

</body>
</html>