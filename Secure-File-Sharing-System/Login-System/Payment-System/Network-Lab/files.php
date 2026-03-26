<?php
session_start();
include "config/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get user files
$sql = "SELECT * FROM files WHERE user_id='$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Files</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand">Secure File System</span>
    <a href="dashboard.php" class="btn btn-primary">Dashboard</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>
</nav>

<div class="container mt-5">
<h3>My Files</h3>

<table class="table table-bordered">
<tr>
<th>File Name</th>
<th>Download</th>
<th>Delete</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['file_name']; ?></td>
<td>
<a href="download.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Download</a>
</td>
<td>
<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
</td>
</tr>
<?php } ?>

</table>

<a href="dashboard.php" class="btn btn-secondary">Back</a>

</div>

</body>
</html>