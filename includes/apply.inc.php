<?php
session_start();
//if the button is pressed 
if (isset($_POST['reg-btn'])) {

    require 'dbh.inc.php';

    $addr = trim(strtolower($_POST['addr']));
    $hostelnum = trim(strtolower($_POST['hostelnum']));
    $city = trim(strtolower($_POST['city']));
    $country =trim(strtolower( $_POST['country']));
    $full_name =trim(strtolower($_POST['fullname']));
    $gender = trim(strtolower($_POST['gender']));
   $program = trim(strtolower($_POST['program']));
    $regnum =trim(strtolower($_SESSION['regnum']));
    $yearofstudy = trim(strtolower($_POST['yearofstudy']));
    $semester = trim(strtolower($_POST['semester']));
    $cell =trim(strtolower( $_POST['cell']));
   $activities =trim(strtolower($_POST['activities']));
    $disability =trim(strtolower( $_POST['disability']));
    $offence1 =trim(strtolower( $_POST['offence1']));
    $offence2 =trim(strtolower( $_POST['offence2']));
    $offence3 =trim(strtolower( $_POST['offence3']));
    $kin_name =trim(strtolower( $_POST['kin_name']));
    $kin_addr =trim(strtolower( $_POST['kin_addr']));
    $kin_city =trim(strtolower( $_POST['kin_city']));
    $kin_country =trim(strtolower($_POST['kin_country']));
    $kin_cell =trim(strtolower($_POST['kin_cell']));
    
    $score = 0;

    if ($city != "harare") {
        $score += 2;
    }
    if($country != "zimbabwe"){
        $score +=5;
    }

    switch ($yearofstudy) {
        case 1: 
            $score += 4;
            break;
        case 2: 
            $score += 1;
            break;
        case 3: 
            $score += 2;
            break;
        case 4: 
            $score += 4;
            break;
    }

    if (strlen($activities) > 0) {
        $score += 2;
    }

    if (strlen($disability) > 0) {
        $score += 5;
    }

    $has_an_offence = False;

    if (strlen($offence1) > 0) {
        $has_an_offence = True;
    }
    else if (strlen($offence2) > 0) {
        $has_an_offence = True;
    }
    else if (strlen($offence3) > 0) {
        $has_an_offence = True;
    }


    if ($has_an_offence) {
        $score -= 3;
    }


    $check_duplicate = "SELECT $regnum FROM applications WHERE regnum = '$regnum' ";
    $result = mysqli_query($conn, $check_duplicate);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $_SESSION['message'] = "You have already sent your details";
        header("Location: ../Update.php");
    }else{

    $query = "INSERT INTO applications(score, addr, hostelnum, city, country, full_name, gender,program, regnum, yearofstudy, semester, cell, activities, 
        disability, offence1, offence2, offence3, kin_name, kin_addr, kin_city, kin_country, kin_cell) VALUES ('$score', '$addr', '$hostelnum', '$city', '$country', '$full_name', '$gender', '$program', '$regnum', '$yearofstudy', '$semester', '$cell', '$activities', '$disability', '$offence1', '$offence2', '$offence3', '$kin_name', '$kin_addr', '$kin_city', '$kin_country', '$kin_cell')";

    $query_run = mysqli_query($conn, $query);

    if ($query_run == TRUE) {
        $_SESSION['message'] = "Your application has been sent";
        header("Location: ../Update.php");
    } else {
        $_SESSION['message'] = "Something went wrong";
    }
    header("Location: ../Apply.php");
}
}
?>