<!DOCTYPE html>

<html>
<head>

  <title> Rental Database Homepage</title>
  <link rel="stylesheet" type="text/css" href="rental.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
    <h1 style = "text-align: center; color: darkred">Average Rent </h1>
    <table style="text-align:center; width: 100%;">
    <tr><th>Average House Rent</th><th>Average Apartment Rent</th><th>Average Room Rent</th></tr>
    <?php
      include 'connectdb.php';
      $result = $connection->query("SELECT house_avg.average_cost AS house_average_cost, apartment_avg.average_cost AS apartment_average_cost, room_avg.average_cost AS room_average_cost FROM
                                  (SELECT AVG(cost_per_month) AS average_cost FROM RentalProperty JOIN House ON RentalProperty.property_ID = House.house_ID) AS house_avg,
                                  (SELECT AVG(cost_per_month) AS average_cost FROM RentalProperty JOIN Apartment ON RentalProperty.property_ID = Apartment.apartment_ID) AS apartment_avg,
                                  (SELECT AVG(cost_per_month) AS average_cost FROM RentalProperty JOIN Room ON RentalProperty.property_ID = Room.room_ID) AS room_avg;");
      while ($row = $result->fetch()) {
        echo "<tr><td>$".number_format($row["house_average_cost"], 2)."</td><td>$".number_format($row["apartment_average_cost"], 2)."</td><td>$".number_format($row["room_average_cost"], 2)."</td></tr>";
      }
      $connection = NULL;
    ?>
    </table>

    <br>
    <br>

    <h1 style = "text-align: center; color: darkred">Maximum and Minimum Rent</h1>
    <table style="text-align:center; width: 100%;">
    <tr><th>Max. House Rent</th><th>Min. House Rent</th><th>Max. Apartment Rent</th><th>Min. Apartment Rent</th><th>Max. Room Rent</th><th>Min. Room Rent</th></tr>
    <?php
      include 'connectdb.php';
      $result = $connection->query("SELECT house_max.max_cost AS house_max_cost, house_min.min_cost AS house_min_cost, apartment_max.max_cost AS apartment_max_cost, apartment_min.min_cost AS apartment_min_cost, room_max.max_cost AS room_max_cost, room_min.min_cost AS room_min_cost
                                  FROM
                                  (SELECT MAX(cost_per_month) AS max_cost FROM RentalProperty JOIN House ON RentalProperty.property_ID = House.house_ID) AS house_max,
                                  (SELECT MAX(cost_per_month) AS max_cost FROM RentalProperty JOIN Apartment ON RentalProperty.property_ID = Apartment.apartment_ID) AS apartment_max,
                                  (SELECT MAX(cost_per_month) AS max_cost FROM RentalProperty JOIN Room ON RentalProperty.property_ID = Room.room_ID) AS room_max,
                                  (SELECT MIN(cost_per_month) AS min_cost FROM RentalProperty JOIN House ON RentalProperty.property_ID = House.house_ID) AS house_min,
                                  (SELECT MIN(cost_per_month) AS min_cost FROM RentalProperty JOIN Apartment ON RentalProperty.property_ID = Apartment.apartment_ID) AS apartment_min,
                                  (SELECT MIN(cost_per_month) AS min_cost FROM RentalProperty JOIN Room ON RentalProperty.property_ID = Room.room_ID) AS room_min;");
      while ($row = $result->fetch()) {
        echo "<tr><td>$".$row["house_max_cost"]."</td><td>$".$row["house_min_cost"]."</td><td>$".$row["apartment_max_cost"]."</td><td>$".$row["apartment_min_cost"]."</td><td>$".$row["room_max_cost"]."</td><td>$".$row["room_min_cost"]."</td></tr>";
      }
      $connection = NULL;
    ?>
    </table>

    <br>
    <br>

    <h1 style = "text-align: center; color: darkred">Number of Rental Propterties </h1>
    <table style="text-align:center; width: 100%;">
    <tr><th>Number of Houses</th><th>Number of Apartments</th><th>Number of Rooms</th></tr>
    <?php
      include 'connectdb.php';
      $result = $connection->query("SELECT 
                                  (SELECT COUNT(house_ID) FROM House) AS house_count, 
                                  (SELECT COUNT(apartment_ID) FROM Apartment) AS apartment_count, 
                                  (SELECT COUNT(room_ID) FROM Room) AS room_count;");
      while ($row = $result->fetch()) {
        echo "<tr><td>".$row["house_count"]."</td><td>".$row["apartment_count"]."</td><td>".$row["room_count"]."</td></tr>";
      }
      $connection = NULL;
    ?>
    </table>

    <br>
    <br>

    <h1 style = "text-align: center; color: darkred">Number of People</h1>
    <table style="text-align:center; width: 100%;">
    <tr><th>Number of Owners</th><th>Number of Property Managers</th><th>Number of Renter</th></tr>
    <?php
      include 'connectdb.php';
      $result = $connection->query("SELECT 
                                  (SELECT COUNT(ID) FROM Owner) AS owner_count, 
                                  (SELECT COUNT(ID) FROM PropertyManager) AS propertymanager_count, 
                                  (SELECT COUNT(ID) FROM Renter) AS renter_count;");
      while ($row = $result->fetch()) {
        echo "<tr><td>".$row["owner_count"]."</td><td>".$row["propertymanager_count"]."</td><td>".$row["renter_count"]."</td></tr>";
      }
      $connection = NULL;
    ?>
    </table>
  </div>

  <br>
  <br>

</body>
</html>
