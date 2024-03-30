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
        
        // Insert Owner
        $owner_ID = !empty($_POST["owner_ID"]) ? "'" . $_POST["owner_ID"] . "'" : 'null';
        $owner_first_name = !empty($_POST["owner_first_name"]) ? "'" . $_POST["owner_first_name"] . "'" : 'null';
        $owner_last_name = !empty($_POST["owner_last_name"]) ? "'" . $_POST["owner_last_name"] . "'" : 'null';
        $owner_phone_number = !empty($_POST["owner_phone_number"]) ? "'" . $_POST["owner_phone_number"] . "'" : 'null';

        $store = array();

        if ($owner_first_name !== 'null') {
            $store[] = "first_name=$owner_first_name";
        }
        if ($owner_last_name !== 'null') {
            $store[] = "last_name=$owner_last_name";
        }
        if ($owner_phone_number !== 'null') {
            $store[] = "phone_number=$owner_phone_number";
        }

        $str = implode(", ", $store);

        $sql = "UPDATE Owner SET $str WHERE ID=$owner_ID";

        if ($connection->query($sql) == TRUE) {
            echo "<p>Owner updated successfully.</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
        }
        $connection = NULL;
    ?>
   </div>

</body>
</html>