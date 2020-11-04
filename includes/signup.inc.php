<?php
session_start();
if(isset($_POST['signup-btn'])){
    
    require 'dbh.inc.php';

    $regnum = $_POST['regnum'];
    $pass = $_POST['pass'];
    $passAgain = $_POST['passAgain'];

    if(empty($regnum)||empty($pass)||empty($passAgain)){
        $_SESSION['message'] = "Please enter all the fields";
    }elseif($pass !== $passAgain){
        $_SESSION['message'] = "Passwords do not match";
        
    }
    else{
        $sql = "SELECT regnum FROM signup_dets WHERE regnum=?";
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt,$sql)){
            $_SESSION['status'] = "Failed";
            header("Location: ../index.php");
        }else{
            mysqli_stmt_bind_param($stmt, "s", $regnum);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if($resultCheck > 0){
                $_SESSION['message'] = "Sorry the Registration number is taken";
            }else{
                $sql ="INSERT INTO signup_dets (regnum, pass) VALUES (?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    $_SESSION['message']="Sorry failed to add";
            }else{
            $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ss", $regnum, $hashedPwd);
            mysqli_stmt_execute($stmt);
            $_SESSION['message'] = "You have signed up";
            $_SESSION['regnum'] = $regnum;
            header("Location: ../index.php");
            exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    //mysqli_stmt_close($conn);
}

}else{
    echo 'Database not found';
}
