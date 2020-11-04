<?php
session_start();
if (isset($_POST['login-btn'])) {
    require 'dbh.inc.php';

    $regnum = $_POST['regnum'];
    $pass = $_POST['std-pass'];
    //$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

    if (!empty($regnum) && !empty($pass)) {
        $query = "SELECT * FROM signup_dets WHERE regnum='$regnum'";
        $query_run = mysqli_query($conn, $query);

        $num_of_rows = mysqli_num_rows($query_run);

        if ($num_of_rows > 0) {
            // there are details in the db
            while ($details = mysqli_fetch_array($query_run)) {
                $hashed_password = $details['pass'];

                if (password_verify($pass, $hashed_password)) {

                    $_SESSION['regnum'] = $regnum;
                } else {
                    $_SESSION['message'] = "Invalid Regstration number or password";
                }
            }
        }else{
            // there is no record of entered details
            $_SESSION['message'] = "Registration number $regnum does not exist.";
        }

        header('Location: ../index.php');
    } else {
        $_SESSION['message'] = "Please enter all the fields";
        header('Location: ../index.php');
    }
}
