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
    
        $rentalproperty_ID = !empty($_POST["rentalproperty_ID"]) ? $_POST["rentalproperty_ID"] : 'null';
        if ($rentalproperty_ID != 'null') {
            $sql = "DELETE FROM RentalProperty WHERE property_ID=$rentalproperty_ID;";
            if ($connection->query($sql) == TRUE) {
                echo "<p>Rental Property deleted successfully.</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
            }
        }

        $owner_ID = !empty($_POST["owner_ID"]) ? "'" . $_POST["owner_ID"] . "'" : 'null';
        if ($owner_ID != 'null') {
            $sql2 = "DELETE FROM Owner WHERE ID=$owner_ID";
            if ($connection->query($sql2) == TRUE) {
                echo "<p>Owner deleted successfully.</p>";
            } else {
                echo "<p>Error: " . $sql2 . "<br>" . $connection->error . "</p>";
            }
        }

        $propertymanager_ID = !empty($_POST["propertymanager_ID"]) ? "'" . $_POST["propertymanager_ID"] . "'" : 'null';
        if ($propertymanager_ID != 'null') {
            $sql3 = "DELETE FROM PropertyManager WHERE ID=$propertymanager_ID";
            if ($connection->query($sql3) == TRUE) {
            echo "<p>Property Manager deleted successfully.</p>";
            } else {
            echo "<p>Error: " . $sql3 . "<br>" . $connection->error . "</p>";
            }
        }

        $renter_ID = !empty($_POST["renter_ID"]) ? "'" . $_POST["renter_ID"] . "'" : 'null';
        if ($renter_ID != 'null') {
            $sql4 = "DELETE FROM Renter WHERE ID=$renter_ID";
            if ($connection->query($sql4) == TRUE) {
            echo "<p>Renter deleted successfully.</p>";
            } else {
            echo "<p>Error: " . $sql4 . "<br>" . $connection->error . "</p>";
            }
        }

        $property_ID = !empty($_POST["property_ID"]) ? $_POST["property_ID"] : 'null';
        $furnishing = !empty($_POST["furnishing"]) ? "'" . $_POST["furnishing"] . "'" : 'null';
        if ($property_ID != 'null' && $furnishing != 'null') {
            $sql5 = "DELETE FROM RoomFurnishings WHERE room_ID=$property_ID AND furnishings_list=$furnishing";
            if ($connection->query($sql5) == TRUE) {
            echo "<p>Room Furnishing deleted successfully.</p>";
            } else {
            echo "<p>Error: " . $sql5 . "<br>" . $connection->error . "</p>";
            }
        }

        $connection = NULL;
    ?>
   </div>

</body>
</html>