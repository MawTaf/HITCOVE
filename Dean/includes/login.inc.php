<?php 
    session_start();

    if(isset($_POST['login'])){
        require 'dbh.inc.php';
        $username = $_POST['username'];
        $pass = $_POST['pass']; 

        $stmt = mysqli_stmt_init($conn); 
            $sql= "SELECT username,pass,id FROM admins WHERE username=? AND pass=? ";
            $stmt -> prepare($sql);

            $stmt->bind_param('ss',$username,$pass);
				$stmt->execute();
				$stmt -> bind_result($username,$pass,$id);
            $rs = $stmt->fetch();
            $_SESSION['id'] = $id;
            if($rs){
                header("location: ../index.php");
            }

    
        }
    




?>