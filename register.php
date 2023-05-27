<?php
session_start();
require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pendaftaran Siswa Baru</title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>
        <?php
            if(isset($_POST['submit'])){

                $names = mysqli_real_escape_string($conn,$_POST['name']);
                $addresss=mysqli_real_escape_string($conn,$_POST['address']);
                $telps=$_POST['telp'];
                $emails=mysqli_real_escape_string($conn,$_POST['email']);
                $passwords=md5($_POST['password']);
                $passwords2=md5($_POST['password2']);
                $genders=$_POST['genders'];

                $result = mysqli_query($conn,"SELECT * FROM siswa WHERE alamatEmail = '$emails' && password='$passwords' " );
                if ($passwords != $passwords2){
                    ?>
                    <script>
                    alert("Password and Confirm Password Not Match");
                    </script>
                    <?php
                    header("Refresh:0.1; url=register.php");
                
                }else{
                    if (mysqli_num_rows($result) > 0){
                        ?>
                        <script>
                            alert("Account Already Registered");
                        </script>
                        <?php
                        header("Refresh:2 url=login.php");
                    
                    }else{
                        $sql_insert = "INSERT INTO siswa(namaLengkap,alamat,alamatEmail,nomorTelepon,password,gender) 
                        VALUES ('$names','$addresss','$emails','$telps','$passwords','$genders')";
                        $run_query_check = mysqli_query($conn,$sql_insert);
                        if (!$run_query_check) {
                            die('Query error: ' . mysqli_error($conn));
                        }
                        ?>
                        <script>
                            alert("Registration Succsed");
                            location.href = "profil.php";
                        </script>
                        <?php
                    }
                }
            }
             
    ?>
        <div class="mainForm">
    <h2>Form Pendaftaran Siswa Baru</h2>
        <form method="post" action="">
            <p>Lengkapi data dibawah ini</p>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">' .$error. '</span>';
                };
            };
            ?>
            <input type="text" name="name" placeholder="Nama Lengkap" class="form" required>
            <span class="error"> </span><br>

            <input type="text" name="address" placeholder="Alamat Tempat Tinggal" class="form" required>
            <span class="error">  </span><br>

            <input type="email" name="email" placeholder="email@gmail.com" class="form" required>
            <span class="error">  </span><br>

            <input type="text" name="telp" placeholder="081234567890" class="form" required>
            <span class="error">  </span><br>

            <input type="password" name="password" placeholder="Password" class="form" id="password" required>
            <span class="error">  </span><br>

            <input type="password" name="password2" placeholder="Konfirmasi Password" class="form" id="password2" required>
            <span class="error">  </span>

            <p>Gender</p>
            <input type="radio"  name="genders" value="perempuan"  required>
            <label for="perempuan">Perempuan</label>
            <input type="radio"  name="genders" value="laki_laki"  required>
            <label for="laki_laki">Laki-Laki</label>
            <span class="error"> </span><br><br>
            <input type="submit" name="submit" >
        </form>
        </div>
    </body>
</html>


