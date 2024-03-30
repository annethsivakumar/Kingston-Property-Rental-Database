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

    <div class="white-box" style="width: 75%; left: 160px;">
        <h1>Rental Properties: </h1>

        <h2>Rental Properties - House: </h2>
        <br>

        <table style="text-align:center; width: 100%;">
        <tr><th>Property ID</th><th>Apt Number</th><th>Street</th><th>City</th><th>Province</th><th>Postal Code</th><th>Accessibility</th><th>Laundry</th><th>Cost Per Month</th><th>Parking</th><th>Date Listed</th><th>Num Bath</th><th>Num Bed</th><th>Fenced Yard</th><th>Detached/Semi</th></tr>
        <?php
            include 'connectdb.php';
            $result = $connection->query("SELECT property_ID, apt_number, street, city, province, postal_code, accessibility, laundry, cost_per_month, parking, date_listed, num_bath, num_bed, fenced_yard, detached_semi 
                                        FROM RentalProperty 
                                        JOIN House ON House.house_ID = RentalProperty.property_ID
                                        ORDER BY property_ID ASC;");
            while ($row = $result->fetch()) {
                echo "<tr><td>".$row["property_ID"]."</td><td>".$row["apt_number"]."</td><td>".$row["street"]."</td><td>".$row["city"]."</td><td>".$row["province"]."</td><td>".$row["postal_code"]."</td><td>".$row["accessibility"]."</td><td>".$row["laundry"]."</td><td>$".$row["cost_per_month"]."</td><td>".$row["parking"]."</td><td>".$row["date_listed"]."</td><td>".$row["num_bath"]."</td><td>".$row["num_bed"]."</td><td>".$row["fenced_yard"]."</td><td>".$row["detached_semi"]."</td></tr>";
            }
            $connection = NULL;
        ?>
        </table>
        
        <hr class="black-line">
        <h2>Rental Properties - Apartment: </h2>
        <br>

        <table style="text-align:center; width: 100%;">
            <tr><th>Property ID</th><th>Apt Number</th><th>Street</th><th>City</th><th>Province</th><th>Postal Code</th><th>Accessibility</th><th>Laundry</th><th>Cost Per Month</th><th>Parking</th><th>Date Listed</th><th>Num Bath</th><th>Num Bed</th><th>Floor</th><th>Elevator</th></tr>
            <?php
                include 'connectdb.php';
                $result = $connection->query("SELECT property_ID, apt_number, street, city, province, postal_code, accessibility, laundry, cost_per_month, parking, date_listed, num_bath, num_bed, floor, elevator 
                                                FROM RentalProperty 
                                                JOIN Apartment ON Apartment.apartment_ID = RentalProperty.property_ID
                                                ORDER BY property_ID ASC;");
                while ($row = $result->fetch()) {
                    echo "<tr><td>".$row["property_ID"]."</td><td>".$row["apt_number"]."</td><td>".$row["street"]."</td><td>".$row["city"]."</td><td>".$row["province"]."</td><td>".$row["postal_code"]."</td><td>".$row["accessibility"]."</td><td>".$row["laundry"]."</td><td>$".$row["cost_per_month"]."</td><td>".$row["parking"]."</td><td>".$row["date_listed"]."</td><td>".$row["num_bath"]."</td><td>".$row["num_bed"]."</td><td>".$row["floor"]."</td><td>".$row["elevator"]."</td></tr>";
                }
                $connection = NULL;
            ?>
        </table>

        
        <hr class="black-line">
        <h2>Rental Properties - Room: </h2>
        <br>

        <table style="text-align:center; width: 100%;">
        <tr><th>Property ID</th><th>Apt Number</th><th>Street</th><th>City</th><th>Province</th><th>Postal Code</th><th>Accessibility</th><th>Laundry</th><th>Cost Per Month</th><th>Parking</th><th>Date Listed</th><th>Num Bath</th><th>Num Bed</th><th>Roommate Count</th><th>Kitchen Privileges</th></tr>
            <?php
                include 'connectdb.php';
                $result = $connection->query("SELECT property_ID, apt_number, street, city, province, postal_code, accessibility, laundry, cost_per_month, parking, date_listed, num_bath, num_bed, roommate_count, kitchen_privileges 
                                                FROM RentalProperty 
                                                JOIN Room ON Room.room_ID = RentalProperty.property_ID
                                                ORDER BY property_ID ASC;");
                while ($row = $result->fetch()) {
                    echo "<tr><td>".$row["property_ID"]."</td><td>".$row["apt_number"]."</td><td>".$row["street"]."</td><td>".$row["city"]."</td><td>".$row["province"]."</td><td>".$row["postal_code"]."</td><td>".$row["accessibility"]."</td><td>".$row["laundry"]."</td><td>$".$row["cost_per_month"]."</td><td>".$row["parking"]."</td><td>".$row["date_listed"]."</td><td>".$row["num_bath"]."</td><td>".$row["num_bed"]."</td><td>".$row["roommate_count"]."</td><td>".$row["kitchen_privileges"]."</td></tr>";
                }
                $connection = NULL;
            ?>
        </table>
    </div>
</body>
</html>
