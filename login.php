<?php
session_start();
require_once "connection.php";
$idproduk = isset($_GET['id'])?$_GET['id']:"";
$idproduk = mysqli_real_escape_string($conn,$idproduk);
$sql = "SELECT * FROM siswa WHERE id='$idproduk' ";
$query = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($query);

?>

<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        
        <div class="main_login">
            <div class="gambar">
            <img src="assets/illustration.png" width="100%">
            </div>
           
            <form class="form" method="post" action="sv_login.php";>
                <div class="text_login">
                <h1>Login</h1>
                </div>
                <div class="login">
                <input type="email" name="email" id="email" placeholder="Email" class="input"><br><br>
                <span class="error"> </span>
                <input type="password" name="password" id="password" placeholder="Password" class="input"><br><br>
                <span class="error"> </span>
                <input type="submit" name="submit" id="submit" class="submit"    onclick="window.location.href= 'inside.php'"; >
                </div>
            </form>
            <?php

            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">' .$error. '</span>';
                };
            };
            ?>
        </div>
    </body>
</html>