<?php
include "connection.php";

session_start();
$id = $_SESSION['id'];
$getData = mysqli_query ($conn, "select * from siswa where id='$id'");
$row = mysqli_fetch_assoc($getData);
$names = mysqli_real_escape_string($conn, $_POST['name']);
$addresss = mysqli_real_escape_string($conn, $_POST['address']);
$telps = $_POST['telp'];
$emails = mysqli_real_escape_string($conn, $_POST['email']);
$passwords = md5($_POST['password']);
$passwords2 = md5($_POST['password2']);
$genders = $_POST['gender'];


if(!empty($row['foto'])){
    unlink("./images/user/$row[foto]"); //hapus file foto
}

$idkSession = isset($_SESSION['email']) ? $_SESSION['email'] : "";
$idkSession = mysqli_real_escape_string($conn, $idkSession);

$sql = "DELETE FROM siswa WHERE id='$id' ";
mysqli_query($conn, $sql);

$url = "profil.php";
$pesan = "Data berhasil dihapus";
echo "<script>alert('$pesan'); window.location.href = '$url';</script>";
?>

