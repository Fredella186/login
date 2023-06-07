<?php
session_start();
include "connection.php";
$id = $_SESSION['id'];
$getData = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
$row = mysqli_fetch_assoc($getData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profil Siswa Baru</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="mainForm">
        <h2>Edit Profil</h2>
        <form method="post" action="update.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
            <input type="text" name="name" placeholder="Nama Lengkap" class="form" required value="<?php echo isset($row['namaLengkap']) ? $row['namaLengkap'] : ''; ?>">
            <br>
            <input type="text" name="address" placeholder="Alamat Tempat Tinggal" class="form" required value="<?php echo isset($row['alamat']) ? $row['alamat'] : ''; ?>">
            <br>
            <input type="email" name="email" placeholder="email@gmail.com" class="form" required value="<?php echo isset($row['alamatEmail']) ? $row['alamatEmail'] : ''; ?>">
            <br>
            <input type="text" name="telp" placeholder="081234567890" class="form" required value="<?php echo isset($row['nomorTelepon']) ? $row['nomorTelepon'] : ''; ?>">
            <br>
            <input type="password" name="password" placeholder="Password" class="form" id="password" required>
            <br>
            <p>Gender</p>
            <input type="radio" name="gender" value="perempuan" required <?php echo (isset($row['gender']) && $row['gender'] === 'perempuan') ? 'checked' : ''; ?>>
            <label for="perempuan">Perempuan</label>
            <input type="radio" name="gender" value="laki_laki" required <?php echo (isset($row['gender']) && $row['gender'] === 'laki_laki') ? 'checked' : ''; ?>>
            <label for="laki_laki">Laki-Laki</label>
            <br>
            <br>
            <input type="file" name="foto" placeholder="Foto Profil" class="form">
            <br><br>
            <button type="submit" name="simpan" id="submit" class="submit">Simpan</button>
            <br>
            <br>
        </form>
    </div>
</body>
</html>
