<?php
include "config/database.php";

$id = $_GET['id'];

$sql = "SELECT * FROM files WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
session_start();

$user_id = $_SESSION['user_id'];

$conn->query("INSERT INTO logs(user_id,action,file_name)
VALUES('$user_id','DOWNLOAD','".$row['file_name']."')");

$file = $row['file_path'];
$current_hash = hash_file("sha256", $file);

if($current_hash != $row['file_hash'])
{
die("File integrity compromised!");
}

$key = "mysecretkey123";

$data = file_get_contents($file);

$iv = substr($data, 0, 16);
$encrypted = substr($data, 16);

$decrypted = openssl_decrypt($encrypted, "AES-256-CBC", $key, 0, $iv);

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$row['file_name']);

echo $decrypted;
?>