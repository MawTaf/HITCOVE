<?php
include("security.php");
include('includes/dbh.inc.php');

if (isset($_POST['changepwd'])) {
	$op = $_POST['oldpassword'];
	$np = $_POST['newpassword'];

	$sql = "SELECT password FROM admin where password=?";
	$chngpwd = $mysqli->prepare($sql);
	$chngpwd->bind_param('s', $op);
	$chngpwd->execute();
	$chngpwd->store_result();
	$row_cnt = $chngpwd->num_rows;;
	if ($row_cnt > 0) {
		$con = "update admin set password=?,updation_date=?  where id=?";
		$chngpwd1 = $mysqli->prepare($con);
		$chngpwd1->bind_param('ssi', $np, $udate, $ai);
		$chngpwd1->execute();
		$_SESSION['msg'] = "Password Changed Successfully !!";
	} else {
		$_SESSION['msg'] = "Old Password not match !!";
	}
}
?>
<head>
<script>
		function valid() {

			if (document.changepwd.newpassword.value != document.changepwd.cpassword.value) {
				alert("Password and Re-Type Password Field do not match  !!");
				document.changepwd.cpassword.focus();
				return false;
			}
			return true;
		}
	</script>

</head>

<?php 
include("includes/header.php");
include('includes/navbar.php');

?>
<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                  <div class="text-center">
                  <br>
                  <h1 class="h4 text-grey-900 mb-4">Dean</h1>
                  </div>
                  <?php
                  if(isset($_SESSION['status'])&& $_SESSION['status'] !=''){
                    echo '<h2 class="bg-danger text white>"> '.$_SESSION['status'].'</h2>';
                    unset($_SESSION['status']);
				  }
				  
                  ?>
                <form class="mt" action="includes/login.inc.php" method="POST">
                
                  <div class="form-group col">
                    <input type="text" class="form-control " name="oldpassword" placeholder="Old Password" required>
                  </div>
                  <div class="form-group col">
                    <input type="password" name='newpassword' class="form-control " placeholder="New Password" required>
                  </div>
                 <button type="submit" name="login" class="btn btn-outline-success justify-content-between col-4 form-control col" style="left:34%;">Update</button>
                </form>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</body>

</html>