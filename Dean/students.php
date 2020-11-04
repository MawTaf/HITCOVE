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
  <title>Tables</title>
  <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
</head>
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Students</h1>
<h3 class="h5 mb-2 text-gray-800">Notifications to students</h3>
<p><button type="button" id='sausage' class="btn btn-success">Send</button> <button type="button" id="mayo" class="btn btn-danger">Remove notifications</button></p>
        <script>

        function notify(value){
          $.get('includes/notify.php?notify_value=' + value, function(data,textStatus){
            if(textStatus == 'success'){
              alert(data);
            }else{
              alert('Request failed');
            }
        
          })
        }

        $('#sausage').click(()=>{
          notify(true);
        });

        $('#mayo').click(()=>{
          notify(false);
        });


</script>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Dean</h6>
  </div>
  <div class="card-body">

    <div class="table-responsive">
    <?php

        $query = "SELECT * FROM applications";
        $query_run = mysqli_query($conn, $query);
        
    ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
              <th> ID </th>
              <th>Hostel Number</th>
              <th>Address</th>
              <th>City</th>
              <th>Country</th>
              <th>Full Name</th>
              <th>Gender</th>
              <th>Program</th>
              <th>Regstration Number</th>
              <th>Year of Study</th>
              <th>Semester</th>
              <th>Cellphone Number</th>
              <th>Activities</th>
              <th>Disability</th>
              <th>First Offence</th>
              <th>Second Offence</th>
              <th>Third Offence</th>
              <th>Next of Kin Name</th>
              <th>Next of Kin Address</th>
              <th>Next of Kin City</th>
              <th>Next of Kin Country</th>
              <th>Next of Kin Cell</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($query_run) > 0)        
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
               ?>
          <tr>
            <td><?php  echo $row['id']; ?></td>
            <td><?php  echo $row['hostelnum']; ?></td>
            <td><?php  echo $row['addr']; ?></td>
            <td><?php  echo $row['city']; ?></td>
            <td><?php  echo $row['country']; ?></td>
            <td><?php  echo $row['full_name']; ?></td>
            <td><?php  echo $row['gender']; ?></td>
            <td><?php  echo $row['program']; ?></td>
            <td><?php  echo $row['regnum']; ?></td>
            <td><?php  echo $row['yearofstudy']; ?></td>
            <td><?php  echo $row['semester']; ?></td>
            <td><?php  echo $row['cell']; ?></td>
            <td><?php  echo $row['activities']; ?></td>
            <td><?php  echo $row['disability']; ?></td>
            <td><?php  echo $row['offence1']; ?></td>
            <td><?php  echo $row['offence2']; ?></td>
            <td><?php  echo $row['offence3']; ?></td>
            <td><?php  echo $row['kin_name']; ?></td>
            <td><?php  echo $row['kin_addr']; ?></td>
            <td><?php  echo $row['kin_city']; ?></td>
            <td><?php  echo $row['kin_country']; ?></td>
            <td><?php  echo $row['kin_cell']; ?></td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" name="del" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php
            } 
        }
        else {
            echo "No Record Found";
        }
        ?>
        </tbody>
      </table>
   
    </div>
  </div>
</div>

</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');

?>