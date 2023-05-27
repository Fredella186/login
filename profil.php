<?php
include "connection.php";
$idk = isset($_GET['id']) ? $_GET['id'] : "";
$idk = mysqli_real_escape_string($conn, $idk);
$sql = "SELECT * FROM siswa WHERE id='$idk' " or die (mysql_error());
$query = mysqli_query($conn, $sql);

if ($query->num_rows > 0) {
    $data  = mysqli_fetch_array($query);
} else {
    echo "Profil tidak ditemukan";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pendaftaran Siswa Baru</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="mainForm">
        <h2>Edit Profil</h2>
        <form method="post" action="update.php">
            <input type="hidden" name="idk" value="<?php echo $data['id']; ?>">
            <input type="text" name="name" placeholder="Nama Lengkap" class="form" required value="<?php echo isset($data['namaLengkap']) ? $data['namaLengkap'] : ''; ?>">
            <br>
            <input type="text" name="address" placeholder="Alamat Tempat Tinggal" class="form" required required value="<?php echo isset($data['alamat']) ? $data['alamat'] : ''; ?>">
            <br>
            <input type="email" name="email" placeholder="email@gmail.com" class="form" required required value="<?php echo isset($data['alamatEmail']) ? $data['alamatEmail'] : ''; ?>">
            <br>
            <input type="text" name="telp" placeholder="081234567890" class="form" required value="<?php echo isset($data['nomorTelepon']) ? $data['nomorTelepon'] : ''; ?>">
            <br>
            <input type="password" name="password" placeholder="Password" class="form" id="password" required>
            <br>
            <input type="password" name="password2" placeholder="Konfirmasi Password" class="form" id="password2" required>
            <br>
            <p>Gender</p>
            <input type="radio" name="genders" value="perempuan" required <?php echo (isset($data['gender']) && $data['gender'] === 'perempuan') ? 'checked' : ''; ?>>
            <label for="perempuan">Perempuan</label>
            <input type="radio" name="genders" value="laki_laki" required <?php echo (isset($data['gender']) && $data['gender'] === 'laki_laki') ? 'checked' : ''; ?>>
            <label for="laki_laki">Laki-Laki</label>
            <br><br>
            <button type="submit" name="simpan">Simpan</button>
        </form>
    </div>
</body>
</html>
