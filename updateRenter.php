<!DOCTYPE html>

<html>
<head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="createDesign.css">

</head>

<body>

  <div class="container">
    <img src="backgroundweb.jpg" class="background"/>
    <img src="kingstonLogo.png" class="kingstonLogo"/>
  </div>

  <div class="dropdown">
    <a href="http://localhost/rental.php">
      <button class="dropbtn">DASHBOARD</button>
    </a>
  </div>

  <div class="dropdown">
    <button class="dropbtn">CREATE     <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
    <a href="http://localhost/createHouse.html">CREATE: House Rental Property - Owner - Property Manager</a>
    <a href="http://localhost/createApartment.html">CREATE: Apartment Rental Property - Owner - Property Manager</a>
    <a href="http://localhost/createRoom.html">CREATE: Room Rental Property - Owner - Property Manager</a>
    <a href="http://localhost/createRenters.html">CREATE: Renter - Rental Group</a>
    </div>
  </div>

  <div class="dropdown">
      <button class="dropbtn">READ     <i class="fa fa-caret-down"></i></button>
      <div class="dropdown-content">
      <a href="http://localhost/readOwnerManager.php">READ: Property ID - Owner Name - Property Manager Name</a>
        <a href="http://localhost/readRentalPropertiesGroups.php">READ: Rental Properties - Rental Groups</a>
        <a href="http://localhost/readPropertyManager.php">READ: Propety Managers</a>
        <a href="http://localhost/readRentalGroup.php">READ: Rental Group</a>
        <a href="http://localhost/readRenters.php">READ: Renters</a>
        <a href="http://localhost/readFurnishingsList.php">READ: Furnishings List</a>
      </div>
  </div>

  <div class="dropdown">
      <button class="dropbtn">UPDATE     <i class="fa fa-caret-down"></i></button>
      <div class="dropdown-content">
      <a href="http://localhost/updateOwner.html">UPDATE: Owner</a>
      <a href="http://localhost/updatePropertyManager.html">UPDATE: Property Manager</a>
      <a href="http://localhost/updateRentalGroup.html">UPDATE: Rental Group</a>
      <a href="http://localhost/updateRenter.html">UPDATE: Renter</a>
      </div>
  </div>

  <div class="dropdown">
    <a href="http://localhost/deleteItem.html">
      <button class="dropbtn">DELETE </button>
    </a>
  </div>

  <div class="white-box">
    <?php
        include "connectdb.php";

        $renter_ID = !empty($_POST["renter_ID"]) ? "'" . $_POST["renter_ID"] . "'" : 'null';
        $renter_student_ID = !empty($_POST["renter_student_ID"]) ? "'" . $_POST["renter_student_ID"] . "'" : 'null';
        $renter_first_name = !empty($_POST["renter_first_name"]) ? "'" . $_POST["renter_first_name"] . "'" : 'null';
        $renter_last_name = !empty($_POST["renter_last_name"]) ? "'" . $_POST["renter_last_name"] . "'" : 'null';
        $renter_phone_number = !empty($_POST["renter_phone_number"]) ? "'" . $_POST["renter_phone_number"] . "'" : 'null';
        $renter_program_of_study = !empty($_POST["renter_program_of_study"]) ? "'" . $_POST["renter_program_of_study"] . "'" : 'null';
        $renter_graduation_year = !empty($_POST["renter_graduation_year"]) ? $_POST["renter_graduation_year"] : 'null';
        $renter_group_code = !empty($_POST["renter_group_code"]) ? $_POST["renter_group_code"] : 'null';

        $store = array();

        if ($renter_student_ID !== 'null') {
            $store[] = "student_ID=$renter_student_ID";
        }
        if ($renter_first_name !== 'null') {
            $store[] = "first_name=$renter_first_name";
        }
        if ($renter_last_name !== 'null') {
            $store[] = "last_name=$renter_last_name";
        }
        if ($renter_phone_number !== 'null') {
            $store[] = "phone_number=$renter_phone_number";
        }
        if ($renter_program_of_study !== 'null') {
            $store[] = "program_of_study=$renter_program_of_study";
        }
        if ($renter_graduation_year !== 'null') {
            $store[] = "graduation_year=$renter_graduation_year";
        }
        if ($renter_group_code !== 'null') {
            $store[] = "group_ID=$renter_group_code";
        }

        $str = implode(", ", $store);

        $sql = "UPDATE Renter SET $str WHERE ID=$renter_ID";

        if ($connection->query($sql) == TRUE) {
            echo "<p>Rental Group updated successfully.</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
        }
        $connection = NULL;

    ?>
   </div>

</body>
</html>