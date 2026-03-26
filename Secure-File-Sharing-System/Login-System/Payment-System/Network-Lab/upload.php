<?php
session_start();
include "config/database.php";

if(!isset($_SESSION['user_id']))
{
header("Location: login.php");
}

function encryptFile($source,$destination,$key)
{
$data=file_get_contents($source);

$iv=random_bytes(16);

$encrypted=openssl_encrypt($data,"AES-256-CBC",$key,0,$iv);

file_put_contents($destination,$iv.$encrypted);
}

if(isset($_POST['upload']))
{
$file=$_FILES['file']['name'];
$temp=$_FILES['file']['tmp_name'];
$file_hash = hash_file("sha256",$temp);
$size = $_FILES['file']['size'];

$allowed_types = ['pdf','docx','jpg','png','txt'];

$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

if(!in_array($ext,$allowed_types))
{
echo "File type not allowed";
exit();
}

if($size > 5000000)
{
echo "File too large (Max 5MB)";
exit();
}

$folder="uploads/".$file.".enc";

$key="mysecretkey123";

encryptFile($temp,$folder,$key);

$user_id=$_SESSION['user_id'];

$sql="INSERT INTO files(user_id,file_name,file_path,file_hash)
VALUES('$user_id','$file','$folder','$file_hash')";

$conn->query($sql);
$conn->query("INSERT INTO logs(user_id,action,file_name)
VALUES('$user_id','UPLOAD','$file')");

echo "File Encrypted & Uploaded Successfully";
}
?>

<h2>Upload File</h2>

<form method="POST" enctype="multipart/form-data">

<input type="file" name="file" required><br><br>

<button type="submit" name="upload">Upload</button>

</form>

<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
<div class="card">
<div class="card-header">Upload File</div>
<div class="card-body">

<form method="POST" enctype="multipart/form-data">
<input type="file" name="file" class="form-control mb-3">
<button type="submit" name="upload" class="btn btn-primary">Upload</button>
</form>

<a href="dashboard.php" class="btn btn-secondary mt-3">Back</a>

</div>
</div>
</div>

</body>
</html>