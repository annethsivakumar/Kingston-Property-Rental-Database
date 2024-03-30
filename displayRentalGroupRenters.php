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
        <h1>Rental Group Preference: </h1>
        <table style="text-align:center; width: 100%;">
        <tr><th>Group ID</th><th>Number of Bed</th><th>Number of Bath</th><th>Type</th><th>Laundry</th><th>Parking</th><th>Accessibility</th><th>Cost_Per_Month</th></tr>
        <?php
            include 'connectdb.php';
            $group_code = $_GET['group_code'];
            $result = $connection->query("SELECT * FROM RentalGroup WHERE group_code = $group_code;");
            while ($row = $result->fetch()) {
                echo "<tr><td>".$row["group_code"]."</td><td>".$row["num_bed"]."</td><td>".$row["num_bath"]."</td><td>".$row["type"]."</td><td>".$row["laundry"]."</td><td>".$row["parking"]."</td><td>".$row["accessibility"]."</td><td>".$row["cost_per_month"]."</td></tr>";
            }
            $connection = NULL;
        ?>
        </table>

        <br>
        <br>

        <h1>Rental Group Current Lease: </h1>
        <table style="text-align:center; width: 100%;">
        <tr><th>Property ID</th><th>Cost per Month</th><th>Lease Start Date</th><th>Lease End Date</th></tr>
        <?php
            include 'connectdb.php';
            $group_code = $_GET['group_code'];
            $result = $connection->query("SELECT * FROM RentalGroup WHERE group_code = $group_code;");
            while ($row = $result->fetch()) {
                echo "<tr><td>$".$row["home_ID"]."</td><td>".$row["lease_cost_per_month"]."</td><td>".$row["lease_date_signed"]."</td><td>".$row["lease_end_date"]."</td></tr>";
            }
            $connection = NULL;
        ?>
        </table>

        <br>
        <br>

        <h1>Rental Group Renters: </h1>
        <table style="text-align:center; width: 100%;">
            <tr><th>Group ID</th><th>Renter ID</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Program of Study</th><th>Graduation Year</th></tr>
            <?php
                include 'connectdb.php';
                $group_code = $_GET['group_code'];
                $result = $connection->query("SELECT * FROM Renter WHERE group_ID = $group_code;");
                while ($row = $result->fetch()) {
                    echo "<tr><td>".$row["group_ID"]."</td><td>".$row["ID"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["phone_number"]."</td><td>".$row["program_of_study"]."</td><td>".$row["graduation_year"]."</td></tr>";
                }
                $connection = NULL;
            ?>
        </table>
    </div>
</body>
</html>
