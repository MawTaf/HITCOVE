<?php
session_start();
    include('dbh.inc.php');
if(1/*isset($_POST['update'])*/){
    $addr = $_POST['addr'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $full_name = $_POST['fullname'];
    $program = $_POST['program'];
    $yearofstudy= $_POST['yearofstudy'];
    $semester = $_POST['semester'];
    $cell = $_POST['cell'];
    $activities = $_POST['activities'];
    $disability = $_POST['disability'];   
    $offence1 = $_POST['offence1'];
    $offence2 = $_POST['offence2'];
    $offence3 = $_POST['offence3'];
    $kin_name = $_POST['kin_name'];
    $kin_addr = $_POST['kin_addr'];
    $kin_city = $_POST['kin_city'];
    $kin_country = $_POST['kin_country'];
    $kin_cell = $_POST['kin_cell'];
    $regnum = $_SESSION['regnum'];
    

    $query = "UPDATE applications SET addr='$addr', city='$city', country='$country', full_name='$full_name', program='$program', yearofstudy='$yearofstudy', semester='$semester', cell='$cell', activities='$activities', disability='$disability', offence1='$offence1', offence2='$offence2', offence3='$offence3', kin_name='$kin_name', kin_addr='$kin_addr', kin_city='$kin_city', kin_country='$kin_country', kin_cell='$kin_cell' WHERE regnum='$regnum'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = "Your profile has been updated";
    }else{
        $_SESSION['message'] = "Failed to update your profile";
    }
    header('Location: ../Update.php');
}
?>