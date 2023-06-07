<?php
session_start();
include "config/connection.php";

$names = mysqli_real_escape_string($conn,$_POST['name']);
$_SESSION['name'] = $name;
$addresss=mysqli_real_escape_string($conn,$_POST['address']);
$telps=$_POST['telp'];
$emails=mysqli_real_escape_string($conn,$_POST['email']);
$passwords=md5($_POST['password']);
$passwords2=md5($_POST['password2']);
$genders=$_POST['gender'];

$sql_select = "select * from siswa where alamatEmail='$emails' and password='$password'";
$query = mysqli_query($conn, $sql_select);
$num = mysqli_num_rows($query); //mengambil jumlah data yang muncul
$result = mysqli_fetch_array($query); //mengambil array data

if ($passwords != $passwords2){
    ?>
    <script>
    alert("Password and Confirm Password Not Match");
    </script>
    <?php
    header("Refresh:0.1; url=register.php");
    exit;

}else{
    if ($num > 0){
        ?>
        <script>
            alert("Account Already Registered");
        </script>
        <?php
        header("Refresh:2 url=register.php");
        exit;
    
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
            location.href="inside.php";
        </script>
        <?php
        exit;
    }
}
?>

