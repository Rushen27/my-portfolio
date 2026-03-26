<?php
session_start();
include "config/database.php";

if(!isset($_SESSION['otp_user_id']))
{
    header("Location: login.php");
    exit();
}

if(isset($_POST['verify']))
{
    $otp = $_POST['otp'];
    $user_id = $_SESSION['otp_user_id'];

    $sql = "SELECT * FROM users WHERE id='$user_id' AND otp_code='$otp' AND otp_expiry > NOW()";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header("Location: dashboard.php");
        exit();
    }
    else
    {
        $error = "Invalid or Expired OTP";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>OTP Verification</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
<div class="container">
<div class="row justify-content-center mt-5">
<div class="col-md-4">
<div class="card">
<div class="card-header text-center">
<h4>Enter OTP</h4>
</div>
<div class="card-body">

<?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

<form method="POST">
<input type="text" name="otp" class="form-control mb-3" placeholder="Enter OTP">
<button type="submit" name="verify" class="btn btn-primary w-100">Verify OTP</button>
</form>

</div>
</div>
</div>
</div>
</div>
</body>
</html>