<?php
include "config/database.php";

if(isset($_POST['register']))
{
$username=$_POST['username'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_BCRYPT);

$sql="INSERT INTO users(username,email,password)
VALUES('$username','$email','$password')";

if($conn->query($sql))
{
$success="Registration successful";
}
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-4">

<div class="card">

<div class="card-header text-center">
<h4>User Registration</h4>
</div>

<div class="card-body">

<?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

<form method="POST">

<input type="text" name="username" class="form-control mb-3" placeholder="Username">

<input type="email" name="email" class="form-control mb-3" placeholder="Email">

<input type="password" name="password" class="form-control mb-3" placeholder="Password">

<button type="submit" name="register" class="btn btn-success w-100">
Register
</button>

</form>

<br>

<a href="login.php">Back to login</a>

</div>

</div>

</div>

</div>

</div>

</body>
</html>