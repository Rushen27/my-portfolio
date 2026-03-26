<?php
session_start();
include "config/database.php";

if(!isset($_SESSION['user_id']))
{
header("Location: login.php");
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
<title>Profile</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">

<h3>User Profile</h3>

<table class="table table-bordered">

<tr>
<th>Username</th>
<td><?php echo $user['username']; ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo $user['email']; ?></td>
</tr>

</table>

<a href="dashboard.php" class="btn btn-secondary">Back</a>

</body>

</html>