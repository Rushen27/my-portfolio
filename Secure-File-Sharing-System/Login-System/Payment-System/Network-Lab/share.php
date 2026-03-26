<?php
include "config/database.php";

$file_id = $_GET['file_id'];

if(isset($_POST['share']))
{
$user_id = $_POST['user_id'];

$sql = "INSERT INTO shares(file_id,shared_with)
VALUES('$file_id','$user_id')";

$conn->query($sql);

echo "File Shared Successfully";
}

$users = $conn->query("SELECT * FROM users");
?>

<h3>Share File</h3>

<form method="POST">

<select name="user_id">

<?php
while($row = $users->fetch_assoc())
{
?>

<option value="<?php echo $row['id']; ?>">
<?php echo $row['username']; ?>
</option>

<?php
}
?>

</select>

<br><br>

<button type="submit" name="share">Share File</button>

</form>