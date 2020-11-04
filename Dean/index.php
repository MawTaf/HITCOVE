<?php

include('includes/dbh.inc.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
  include("security.php");
  ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
</head>

<body>

  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> <form action="includes/logout.inc.php" method="post"><button type="button" style="background-color:#FFB833;" name="logout-btn"  class="btn btn-default">Logout</button></form> 
    </div>
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <?php
                $result = mysqli_query($conn, "SELECT count(*) FROM applications");
                $num_rows = mysqli_fetch_row($result)[0];
                ?>
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h3><?php echo $num_rows; ?></h3></div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">Applications</div>
              </div>
            </div>
          </div>
        </div>
        <a href="students.php" class="block-anchor panel-footer">Full Details <i class="fa fa-arrow-right"></i></a>
        
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>

  </div>
  <?php
  include('includes/scripts.php');
  include('includes/footer.php');

  ?>
</body>

</html>