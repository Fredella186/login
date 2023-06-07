<?php
session_start();
include "connection.php";
if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;

        $password = md5($_POST['password']);

        $query = mysqli_query($conn, "SELECT * FROM siswa WHERE alamatEmail = '$email'");

        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $id = $row['id'];
            $_SESSION['id'] = $id;
            $hashedPassword = $row['password'];

            if ($password == $hashedPassword) {
                // Password matches
                // Perform actions after successful login
                // Example: Redirect the user to the home page
                header("Location: inside.php");
                
            } else {
                // Incorrect password
                ?>
                <script>
                    alert ("Password Salah");
                    location.href = "login.php";
                </script>
                <?php
            }
        } else {
            // Username not found
            ?>
            <script>
                alert ("Email Tidak Ditemukan");
                location.href = "login.php";
            </script>
            <?php
        }
    }
}
?>
