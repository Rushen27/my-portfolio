<?php
session_start();

if($_SESSION['role'] != 'admin')
{
die("Access Denied");
}
?>
<?php
include "config/database.php";

$users = $conn->query("SELECT * FROM users");
$files = $conn->query("SELECT * FROM files");
?>

<h3>All Users</h3>

<table border="1">

<tr>
<th>ID</th>
<th>Username</th>
<th>Email</th>
</tr>

<?php
while($row=$users->fetch_assoc())
{
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['email']; ?></td>

</tr>

<?php
}
?>

</table>

<h3>All Files</h3>

<table border="1">

<tr>
<th>ID</th>
<th>File Name</th>
</tr>

<?php
while($row=$files->fetch_assoc())
{
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['file_name']; ?></td>

</tr>

<?php
}
?>

</table>