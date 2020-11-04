<?php
include("includes/header.php");
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                  <div class="text-center">
                  <img src="hit logo.png" style="height:50px;"alt="Logo">
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
                    <input type="text" class="form-control " name="username" placeholder="Username" required>
                  </div>
                  <div class="form-group col">
                    <input type="password" name='pass' class="form-control " placeholder="Password" required>
                  </div>
                 <button type="submit" name="login" class="btn btn-outline-primary justify-content-between col-4 form-control col" style="left:34%;">Login</button>
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

</div>
</body>
<?php
include("includes/scripts.php");
?>
