<?php
session_start();
include "connection.php";
        if(isset($_POST['submit'])){
            
$names = mysqli_real_escape_string($conn,$_POST['name']);
$_SESSION['name'] = $name;
            $email=$_POST['email'];
            $password=md5($_POST['password']);
    
            $result = mysqli_query($conn,"SELECT * FROM siswa WHERE alamatEmail = '$email' && password='$password' " );
    
            if (!$result) {
                die('Query error: ' . mysqli_error($conn)); // menampilkan pesan error jika query gagal
            }
    
            if (mysqli_num_rows($result) > 0){
                $error[] = 'Sudah Terdaftar!';
                header('Location:inside.php');
    
            } else {
                header('Loaction:login.php');
            }
        }
    

    
    ?>