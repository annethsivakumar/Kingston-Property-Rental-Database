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

            // Insert Rental Group Preferences
            $group_code = !empty($_POST["group_code"]) ? $_POST["group_code"] : 'null';
            $num_bath = !empty($_POST["num_bath"]) ? $_POST["num_bath"] : 'null';
            $num_bed = !empty($_POST["num_bed"]) ? $_POST["num_bed"] : 'null';
            $type = !empty($_POST["type"]) ? "'" . $_POST["type"] . "'" : 'null';
            $laundry = !empty($_POST["laundry"]) ? "'" . $_POST["laundry"] . "'" : 'null';
            $parking = !empty($_POST["parking"]) ? "'" . $_POST["parking"] . "'" : 'null';
            $accessibility = !empty($_POST["accessibility"]) ? "'" . $_POST["accessibility"] . "'" : 'null';
            $cost_per_month = !empty($_POST["cost_per_month"]) ? $_POST["cost_per_month"] : 'null';
            $home_ID = !empty($_POST["home_ID"]) ? $_POST["home_ID"] : 'null';
            $lease_cost_per_month = !empty($_POST["lease_cost_per_month"]) ? $_POST["lease_cost_per_month"] : 'null';
            $lease_date_signed = !empty($_POST["lease_date_signed"]) ? "'" . $_POST["lease_date_signed"] . "'" : 'null';
            $lease_end_date = !empty($_POST["lease_end_date"]) ? "'" . $_POST["lease_end_date"] . "'" : 'null';
            $sql = "insert into RentalGroup values ($group_code, $num_bath, $num_bed, $type, $laundry, $parking, $accessibility, $cost_per_month, $home_ID, $lease_cost_per_month, $lease_date_signed, $lease_end_date);";
            $sql = str_replace("'null'", "null", $sql);
            if ($connection->query($sql) == TRUE) {
                echo "<p>New rental group preferences created successfully.</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
            }

            // Insert Renter
            $ID = !empty($_POST["ID"]) ? "'" . $_POST["ID"] . "'" : 'null';
            $student_ID = !empty($_POST["student_ID"]) ? "'" . $_POST["student_ID"] . "'" : 'null';
            $first_name = !empty($_POST["first_name"]) ? "'" . $_POST["first_name"] . "'" : 'null';
            $last_name = !empty($_POST["last_name"]) ? "'" . $_POST["last_name"] . "'" : 'null';
            $phone_number = !empty($_POST["phone_number"]) ? "'" . $_POST["phone_number"] . "'" : 'null';
            $program_of_study = !empty($_POST["program_of_study"]) ? "'" . $_POST["program_of_study"] . "'" : 'null';
            $graduation_year = !empty($_POST["graduation_year"]) ? $_POST["graduation_year"] : 'null';
            $group_code2 = !empty($_POST["group_code2"]) ? $_POST["group_code2"] : 'null';
            $sql = "insert into Renter values ($ID, $student_ID, $first_name, $last_name, $phone_number, $program_of_study, $graduation_year, $group_code2);";
            $sql = str_replace("'null'", "null", $sql);
            if ($connection->query($sql) == TRUE) {
                echo "<p>New renter created successfully.</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
            }

            $connection = NULL; 
        ?>
    </div>
</body>
</html>
