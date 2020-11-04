<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include("security.php");
  include('header.php');
  if(!isset($_SESSION['regnum'])){
    header("location: index.php");
  }
  ?>

  <title>Apply</title>
  <link rel="stylesheet" href="styles/applystyle.css">
</head>

<body>
  <div class="fields">
    <div class="modal">
      <form action="includes/apply.inc.php" method="POST" autocomplete="off">
        <fieldset>
          <legend>
            <h2>Fill Details</h2>
          </legend>
          <div>
            
            <div style="margin-top: 10px;">
            <label for="gender">Gender </label>
              <select name="gender" id="gender">
                <option value=""></option>
                <option value="F">Female</option>
                <option value="M">Male</option>
              </select>

              <label for="hostel">   Choose hostel number</label>
              <select name="hostelnum" required onchange="validate_hostel(this);" >
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
              <option value="4">Four</option>
            </select>
            </div>
        
            <input type="text" name="addr" id="addr" placeholder="Address" required autofocus>
            <input type="text" name="city" id="city" placeholder="City" required>
            <input type="text" name="country" id="country" placeholder="Country" required>
            <input type="text" name="fullname" id="fullname" placeholder="FullName" required>
            <input type="text" name="program" id="program" placeholder="Program" maxlength="4" required>
            <input type="number" name="yearofstudy" id="yearofstudy" placeholder="Year of Study" maxlength="1" required>
            <input type="number" name="semester" id="semester" placeholder="Semester" maxlength="1" required>
            <input type="tel" name="cell" id="cell" placeholder="Cell number eg 0778..." maxlength="10" required>
            <input type="text" name="activities" id="activities" placeholder="Activities">
            <input type="text" name="disability" id="disability" placeholder="Disability">

            <h5 style="margin-top: 10px;">It is required that if you have commited an offence to state it</h5>


            <input type="text" name="offence1" id="offence1" maxlength="40" placeholder="First Offence">
            <input type="text" name="offence2" id="offence2" maxlength="40" placeholder="Second Offence">
            <input type="text" name="offence3" id="offence3" maxlength="40" placeholder="Third Offence">
            <hr style="margin-top: 10px;">

            <h3>Next of Kin</h3>
            <input type="text" name="kin_name" id="kin_name" placeholder="Full Name" required>
            <input type="text" name="kin_addr" id="kin_addr" placeholder="Address">
            <input type="text" name="kin_city" id="kin_city" placeholder="City" required>
            <input type="text" name="kin_country" id="kin_country" placeholder="Country" required>
            <input type="tel" name="kin_cell" id="kin_cell" maxlength="10" placeholder="Cell number" required>
            <br>
            <input type="submit" name="reg-btn" value="Apply">
      </form>
      </fieldset>
      <script type="text/javascript">
        function validate_hostel(elem) {
          let g = document.querySelectorAll("#gender")[0];
          if (g.value == "F") {
            if ((elem.value != 1) && (elem.value != 4)) {
              alert("You can only apply for hostels 1 and hostel 4 (females only)");
              elem.value = "";
              elem.select();
            }
          } else {
            if (elem.value == 4) {
              alert("You can only apply for hostel 1 (both males and females), 2 and 3 (males only)");
              elem.value = "";
              elem.select();
            }
          }
        }
      </script>
    </div>
  </div>
</body>

</html>