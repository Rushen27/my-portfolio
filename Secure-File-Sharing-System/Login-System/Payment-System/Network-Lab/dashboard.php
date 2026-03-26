<?php
session_start();
include "config/database.php";

if(!isset($_SESSION['user_id']))
{
header("Location: login.php");
}

$user_id = $_SESSION['user_id'];

$search = "";

if(isset($_GET['search']))
{
$search = $_GET['search'];

$sql = "SELECT * FROM files 
WHERE user_id='$user_id' 
AND file_name LIKE '%$search%'";
}
else
{
$sql = "SELECT * FROM files WHERE user_id='$user_id'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Dashboard</span>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>

<div class="container mt-4">

<div class="row">

<div class="col-md-3">
<div class="card bg-primary text-white">
<div class="card-body">
<h5>Upload File</h5>
<a href="upload.php" class="btn btn-light btn-sm">Go</a>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-success text-white">
<div class="card-body">
<h5>My Files</h5>
<a href="files.php" class="btn btn-light btn-sm">Go</a>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-warning text-white">
<div class="card-body">
<h5>Shared Files</h5>
<a href="shared.php" class="btn btn-light btn-sm">Go</a>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-dark text-white">
<div class="card-body">
<h5>Activity Logs</h5>
<a href="logs.php" class="btn btn-light btn-sm">Go</a>
</div>
</div>
</div>

</div>

</div>

</body>
</html>