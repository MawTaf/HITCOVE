<?php

session_start();

include("includes/dbh.inc.php");
if($conn){
    // echo "Database connected";
}else{
    echo "failed to connect to database"; die();
}

?>