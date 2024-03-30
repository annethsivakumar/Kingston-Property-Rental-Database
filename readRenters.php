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
        <h1>Renter Info: </h1>
        <table style="text-align:center; width: 100%;">
        <tr><th>Renter ID</th><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Program of Study</th><th>Graduation Year</th><th>Group ID</th></tr>
        <?php
            include 'connectdb.php';
            $result = $connection->query("SELECT * FROM Renter ORDER BY group_ID ASC;");
            while ($row = $result->fetch()) {
                echo "<tr><td>".$row["ID"]."</td><td>".$row["student_ID"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["phone_number"]."</td><td>".$row["program_of_study"]."</td><td>".$row["graduation_year"]."</td><td>".$row["group_ID"]."</td></tr>";
            }
            $connection = NULL;
        ?>
        </table>
    </div>
</body>
</html>
