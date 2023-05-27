<?php
session_start();
include "connection.php";
$id = isset($_GET['id'])?$_GET['id']:"";
$id= mysqli_real_escape_string($conn,$id);
$sql = "SELECT * FROM siswa WHERE id='$id' ";
$query = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($query);

?>
<html>
    <body>
        <h1>Hi!  <?= $_SESSION['name'];?></h1>
        <button><a href="profil.php?id=$row['id'] ?>" >Edit Profil</a></button>
        <button><a href="delete.php?id=$row['id'] ?>">Hapus Akun</a></button>
        <button><a href="logout.php">Logout</a></button>
    </body>
</html>

