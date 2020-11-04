<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Notifications</title>
	<?php
    include('security.php');
    include('header.php');
    if(!isset($_SESSION['regnum'])){
        header("location: index.php");
      }

	?>
</head>

<body>
    <style>
        #littlesomething{
            border-style:solid;
            border-width:0px;
            padding:20px;
            box-shadow:0 0px 10px rgba(0,0,0,.3);
            background-color:#ffffff;
            border-radius:10px;
            position:relative;
            top:100px;
            margin:0px 50px 0px 50px;
        }
        </style>
<div id="littlesomething">
		<?php
        include('includes/dbh.inc.php');
        
        if (isset($_SESSION['regnum'])) {
            $regnum = $_SESSION['regnum'];

            $query = mysqli_query($conn,"SELECT * FROM applications WHERE regnum = '$regnum' AND notify = true ") or die("something went wrong");
            $rowCount = mysqli_num_rows($query);

            if($rowCount > 0){
                $data = $query = mysqli_fetch_array($query);
                $score = $data['score']; // the students' score

                // check if score is in accepted criteria or not.
                if($score >= 3){
                    echo '<h2>Congradulations!, You are eligiable to get Accommodation.</h2>';
                }else{
                    echo '<h2>Sorry you are eligiable to get accommodation.\</h2>';
                }

            }else{
                echo '<h2>You have no notifications</h2>';
            }
          
        }else{
            echo '<h2>You are not logged in</h2>';
        }
        
        ?>
</div>
</body>
