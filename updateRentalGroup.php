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

        $rental_group_code = !empty($_POST["rental_group_code"]) ? $_POST["rental_group_code"] : 'null';
        $rental_num_bath = !empty($_POST["rental_num_bath"]) ? $_POST["rental_num_bath"] : 'null';
        $rental_num_bed = !empty($_POST["rental_num_bed"]) ? $_POST["rental_num_bed"] : 'null';
        $rental_cost_per_month = !empty($_POST["rental_cost_per_month"]) ? $_POST["rental_cost_per_month"] : 'null';
        $rental_home_ID = !empty($_POST["rental_home_ID"]) ? $_POST["rental_home_ID"] : 'null';
        $rental_lease_cost_per_month = !empty($_POST["rental_lease_cost_per_month"]) ? $_POST["rental_lease_cost_per_month"] : 'null';
        $rental_lease_date_signed = !empty($_POST["rental_lease_date_signed"]) ? "'" . $_POST["rental_lease_date_signed"] . "'" : 'null';
        $rental_lease_end_date = !empty($_POST["rental_lease_end_date"]) ? "'" . $_POST["rental_lease_end_date"] . "'" : 'null';

        $store = array();

        if ($rental_num_bath !== 'null') {
            $store[] = "num_bath=$rental_num_bath";
        }
        if ($rental_num_bed !== 'null') {
            $store[] = "num_bed=$rental_num_bed";
        }
        if ($rental_cost_per_month !== 'null') {
            $store[] = "cost_per_month=$rental_cost_per_month";
        }
        if ($rental_home_ID !== 'null') {
            $store[] = "home_ID=$rental_home_ID";
        }
        if ($rental_lease_cost_per_month !== 'null') {
            $store[] = "lease_cost_per_month=$rental_lease_cost_per_month";
        }
        if ($rental_lease_date_signed !== 'null') {
            $store[] = "lease_date_signed=$rental_lease_date_signed";
        }
        if ($rental_lease_end_date !== 'null') {
            $store[] = "lease_end_date=$rental_lease_end_date";
        }

        $str = implode(", ", $store);

        $sql = "UPDATE RentalGroup SET $str WHERE group_code=$rental_group_code";

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