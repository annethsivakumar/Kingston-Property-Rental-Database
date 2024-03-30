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

        // Insert Property Manager
        if (!empty($_POST["manager_ID"]) && !empty($_POST["manager_first_name"]) && !empty($_POST["manager_last_name"]) && !empty($_POST["manager_phone_number"])) {
            $manager_ID = "'" . $_POST["manager_ID"] . "'";
            $manager_first_name = "'" . $_POST["manager_first_name"] . "'";
            $manager_last_name = "'" . $_POST["manager_last_name"] . "'";
            $manager_phone_number = "'" . $_POST["manager_phone_number"] . "'";
            $sql = "insert into PropertyManager values ($manager_ID, $manager_first_name, $manager_last_name, $manager_phone_number);";
            if ($connection->query($sql) == TRUE) {
                echo "<p>New property manager created successfully.</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
            }
        }

        // Insert Rental Property
        $property_ID = !empty($_POST["property_ID"]) ? $_POST["property_ID"] : 'null';
        $apt_number = !empty($_POST["apt_number"]) ? $_POST["apt_number"] : 'null';
        $street = !empty($_POST["street"]) ? "'" . $_POST["street"] . "'" : 'null';
        $city = !empty($_POST["city"]) ? "'" . $_POST["city"] . "'" : 'null';
        $province = !empty($_POST["province"]) ? "'" . $_POST["province"] . "'" : 'null';
        $postal_code = !empty($_POST["postal_code"]) ? "'" . $_POST["postal_code"] . "'" : 'null';
        $accessibility = !empty($_POST["accessibility"]) ? "'" . $_POST["accessibility"] . "'" : 'null';
        $laundry = !empty($_POST["laundry"]) ? "'" . $_POST["laundry"] . "'" : 'null';
        $cost_per_month = !empty($_POST["cost_per_month"]) ? $_POST["cost_per_month"] : 'null';
        $parking = !empty($_POST["parking"]) ? "'" . $_POST["parking"] . "'" : 'null';
        $date_listed = !empty($_POST["date_listed"]) ? "'" . $_POST["date_listed"] . "'" : 'null';
        $num_bath = !empty($_POST["num_bath"]) ? $_POST["num_bath"] : 'null';
        $num_bed = !empty($_POST["num_bed"]) ? $_POST["num_bed"] : 'null';
        $manager_ID = !empty($_POST["manager_ID"]) ? "'" . $_POST["manager_ID"] . "'" : 'null';
        $manager_start_year = !empty($_POST["manager_start_year"]) ? $_POST["manager_start_year"] : 'null';
        $sql= "insert into RentalProperty values ($property_ID, $apt_number, $street, $city, $province, $postal_code, $accessibility, $laundry, $cost_per_month, $parking, $date_listed, $num_bath, $num_bed, $manager_ID, $manager_start_year);";
        $sql = str_replace("'null'", "null", $sql);
        if ($connection->query($sql) == TRUE) {
            echo "<p>New rental property created successfully.</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
        }

        // Insert Apartment
        if (!empty($_POST["floor"]) && !empty($_POST["elevator"])) {
            $floor = $_POST["floor"];
            $elevator = "'" . $_POST["elevator"] . "'";
            $sql= "insert into Apartment values ($property_ID, $floor, $elevator);";
            $sql = str_replace("'null'", "null", $sql);
            if ($connection->query($sql) == TRUE) {
                echo "<p>New apartment created successfully.</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
            }
        }

        // Insert Owner
        $owner_ID = !empty($_POST["owner_ID"]) ? "'" . $_POST["owner_ID"] . "'" : 'null';
        $owner_first_name = !empty($_POST["owner_first_name"]) ? "'" . $_POST["owner_first_name"] . "'" : 'null';
        $owner_last_name = !empty($_POST["owner_last_name"]) ? "'" . $_POST["owner_last_name"] . "'" : 'null';
        $owner_phone_number = !empty($_POST["owner_phone_number"]) ? "'" . $_POST["owner_phone_number"] . "'" : 'null';
        $sql= "insert into Owner values ($owner_ID, $owner_first_name, $owner_last_name, $owner_phone_number);";
        $sql = str_replace("'null'", "null", $sql);
        if ($connection->query($sql) == TRUE) {
            echo "<p>New owner created successfully.</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
        }

        // Insert Owns
        $sql= "insert into Owns values ($owner_ID, $property_ID);";
        $sql = str_replace("'null'", "null", $sql);
        if ($connection->query($sql) == TRUE) {
            echo "<p>New owns created successfully.</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
        }

        $connection = NULL;
    ?>
    </div>
</body>
</html>
