<?php
session_start();
include "config/database.php";

if(!isset($_SESSION['user_id']))
{
header("Location: login.php");
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT files.* FROM shares
JOIN files ON shares.file_id = files.id
WHERE shares.shared_with='$user_id'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Shared Files</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>

<body class="container mt-5">

<h3>Files Shared With Me</h3>

<table class="table table-bordered">

<tr>
<th>File Name</th>
<th>Download</th>
</tr>

<?php
while($row = $result->fetch_assoc())
{
?>

<tr>

<td><?php echo $row['file_name']; ?></td>

<td>
<a href="download.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">
Download
</a>
</td>

</tr>

<?php
}
?>

</table>

<a href="dashboard.php" class="btn btn-secondary">Back</a>

</body>
</html>