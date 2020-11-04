<?php
include("includes/dbh.inc.php");
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "UPDATE applications SET score='0' where id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        header('Location: students.php'); 
    }
    else
    {
        header('Location: students.php'); 
    }    
}
?>