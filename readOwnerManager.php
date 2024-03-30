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
        <h1>Property IDs With Associated Owners and Property Managers: </h1>
        <table style="text-align:center; width: 100%;">
        <tr><th>Property ID</th><th>Owner First Name</th><th>Owner Last Name</th><th>Manager First Name</th><th>Manager Last Name</th></tr>
        <?php
            include 'connectdb.php';
            $result = $connection->query("SELECT property_id, Owner.first_name AS owner_first_name, Owner.last_name AS owner_last_name, PropertyManager.first_name AS manager_first_name, PropertyManager.last_name AS manager_last_name 
                                        FROM Owns 
                                        JOIN Owner ON Owns.owner_ID = Owner.ID
                                        JOIN RentalProperty ON Owns.home_ID = RentalProperty.property_ID
                                        JOIN PropertyManager ON RentalProperty.manager_ID = PropertyManager.ID
                                        ORDER BY property_id ASC;");
            while ($row = $result->fetch()) {
                echo "<tr><td>".$row["property_id"]."</td><td>".$row["owner_first_name"]."</td><td>".$row["owner_last_name"]."</td><td>".$row["manager_first_name"]."</td><td>".$row["manager_last_name"]."</td></tr>";
            }
            $connection = NULL;
        ?>
        </table>
    </div>
</body>
</html>
