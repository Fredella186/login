<?php 
include "connection.php";

$idk = mysqli_real_escape_string($conn,$_GET['id']);
$emails=mysqli_real_escape_string($conn,$_POST['email']);

$sql = "DELETE FROM siswa WHERE alamatEmail='$emails' ";
mysqli_query($conn,$sql);

$url   = "index.php?menu=kategori";
$pesan = "Data berhasil dihapus";

echo "<script> alert('$pesan'); location='$url'; </script>";

?>
