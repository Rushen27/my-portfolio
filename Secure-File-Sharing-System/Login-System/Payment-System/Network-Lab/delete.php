<?php
include "config/database.php";

$id = $_GET['id'];

$sql = "SELECT * FROM files WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
session_start();

$user_id = $_SESSION['user_id'];

$conn->query("INSERT INTO logs(user_id,action,file_name)
VALUES('$user_id','DELETE','".$row['file_name']."')");

$file = $row['file_path'];

if(file_exists($file)){
unlink($file);
}

$conn->query("DELETE FROM files WHERE id='$id'");

header("Location: dashboard.php");
?>