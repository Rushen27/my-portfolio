<?php
session_start();
include "config/database.php";

$sql = "SELECT logs.*, users.username
FROM logs
JOIN users ON logs.user_id = users.id
ORDER BY action_time DESC";

$result = $conn->query($sql);
?>

<h3>Activity Logs</h3>

<table border="1">

<tr>
<th>User</th>
<th>Action</th>
<th>File</th>
<th>Time</th>
</tr>

<?php
while($row=$result->fetch_assoc())
{
?>

<tr>

<td><?php echo $row['username']; ?></td>
<td><?php echo $row['action']; ?></td>
<td><?php echo $row['file_name']; ?></td>
<td><?php echo $row['action_time']; ?></td>

</tr>

<?php
}
?>

</table>