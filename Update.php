<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
	<?php
	include('security.php');
	include('header.php');
	if(!isset($_SESSION['regnum'])){
		header("location: index.php");
	  }

	?>
	<link rel="stylesheet" href="styles/upd.css">
</head>

<body>
		<?php
		include('includes/dbh.inc.php');
		$query = "SELECT * FROM applications";
		$query_run = mysqli_query($conn, $query);
		if (mysqli_num_rows($query_run) > 0) {
			while ($row = mysqli_fetch_array($query_run)) {
				echo '
			   <form action="Update.php" method="POST">
			   <input type="hidden" name="edit_id" value="' . $row['id'] . '">
			   </form>';
			}
		}
		?>
		<?php
		if (isset($_SESSION['regnum'])) {
			//$id = $_POST['edit_id'];
			$regnum = $_SESSION['regnum'];

			$query = "SELECT * FROM applications WHERE regnum='$regnum' ";
			$query_run = mysqli_query($conn, $query);

			foreach ($query_run as $row) {
				echo '
<div class="fields">
<div class="modal">
<form action="includes/update.inc.php" method="POST"> 
	<fieldset>
		<legend><h2>' . $_SESSION['regnum'] . '</h2></legend>
	<div class="form-group row" >
    	
    	Address: <div class="col-sm-10">
      		<input type="text" class="form-control" name="addr" value="' . $row['addr'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">City:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="city" value="' . $row['city'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Country:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="country" value="' . $row['country'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Full name:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="fullname" value="' . $row['full_name'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Program:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="program" value="' . $row['program'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Year of Study:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="yearofstudy" value="' . $row['yearofstudy'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Semester:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="semester" value="' . $row['semester'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Cell number:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="cell" value="' . $row['cell'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Activities:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="activities" value="' . $row['activities'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Disability:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="disability" value="' . $row['disability'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">First Offence:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="offence1" value="' . $row['offence1'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Second Offence:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="offence2" value="' . $row['offence2'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Third Offence:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="offence3" value="' . $row['offence3'] . '">
	</div>
	</div>
	<hr>
	<h3>Next of Kin</h3>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Full name:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="kin_name" value="' . $row['kin_name'] . '">
		</div>
	</div>	
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Address:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="kin_addr" value="' . $row['kin_addr'] . '">
		</div>
	</div>	
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">City:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="kin_city" value="' . $row['kin_city'] . '">
	</div>
	</div>	
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Country:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="kin_country" value="' . $row['kin_country'] . '">
	</div>
	</div>
	<div class="form-group row">
    	<label for="colFormLabel" class="col-sm-2 col-form-label">Cell Number:</label>
    	<div class="col-sm-10">
      		<input type="text" class="form-control" name="kin_cell" value="' . $row['kin_cell'] . '">
    	</div>
	  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <input type="submit" value="Update" name="edit_btn">
	</div>
	</div>
	</div>';
			}
		}
		?>
		</form>
		</fieldset>
	</div>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>