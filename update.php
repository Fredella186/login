<?php
include "connection.php";

session_start();
$id = $_SESSION['id'];
$getData = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
$row = mysqli_fetch_assoc($getData);
$names = mysqli_real_escape_string($conn, $_POST['name']);
$addresss = mysqli_real_escape_string($conn, $_POST['address']);
$telps = $_POST['telp'];
$emails = mysqli_real_escape_string($conn, $_POST['email']);
$passwords = md5($_POST['password']);
$passwords2 = md5($_POST['password2']);
$genders = $_POST['gender'];

$idkSession = isset($_SESSION['email']) ? $_SESSION['email'] : "";
$idkSession = mysqli_real_escape_string($conn, $idkSession);

$sql = "UPDATE siswa SET namaLengkap='$names', alamat='$addresss', alamatEmail='$emails', nomorTelepon='$telps', password='$passwords', gender='$genders' WHERE id='$id'";
mysqli_query($conn, $sql);

$foto_cek = $_FILES['foto']['name'];
if ($foto_cek != "") {
    $folder = "./images/user"; //tempat diupload
    $foto_tmp = $_FILES['foto']['tmp_name']; //filenya diupload
    $foto_name = md5(date("YmdHis")); //nama foto yang baru
    $foto_split = explode('.', $foto_cek); //memecah nama foto
    $ext = end($foto_split);
    $foto = $foto_name . "." . $ext;
    move_uploaded_file($foto_tmp, "$folder/$foto");

    //hapus foto lama
    $getData = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
    $row = mysqli_fetch_array($getData);
    if (!empty($row['foto'])) {
        unlink("./images/user/$row[foto]"); //hapus file foto
    }

    //update foto baru
    $sql = "UPDATE siswa SET foto='$foto' WHERE id='$id'";
    mysqli_query($conn, $sql);
}

$url = "profil.php";
$pesan = "Data berhasil diubah";
echo "<script>alert('$pesan'); window.location.href = '$url';</script>";
?>
