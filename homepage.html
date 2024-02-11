<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heather</title>
    <link rel="icon" href="icon.ico" type="image/x-icon">

    <style>

        body {
            margin : 0;
        }

        .property-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
            margin-bottom: 20px;
            /* max-height: 600px;
            overflow: scroll; */
        }

        .property-container p { 
        white-space: nowrap; 
        overflow: hidden; 
        text-overflow: ellipsis;
        }

        .more-button { 
            background-color: #0079E8; 
            color: white; 
            border: none; 
            border-radius: 5px; 
            padding: 10px 20px; 
            cursor: pointer; 
            margin-top: 20px; 
            }  

            h1 {
                font-size: 28px;
                color: #333;
            }

            p {
                font-size: 18px;
                color: #555;
            }

            .close-button {
                background-color: #0079E8;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                cursor: pointer;
                margin-top: 20px;
            }

            header {
                background-color: powderblue;
                padding: 20px;
                margin: 0;
                color: black;
                box-sizing: border-box;
                height: 200px;
                display: flex;
                justify-content: flex-end;
                align-items: center;
            }

            .header-buttons {
                display: flex;
                gap: 20px;
                margin-left: auto;
                margin-top: 80px;
                font-size: 20px;
            }

            .button {
                padding: 5px 20px;
                background-color: #3498db;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .underline-button {
                position: relative;
                text-decoration: none;
                color: black;
            }

            .underline-button::after {
                content: "";
                position: absolute;
                left: 0;
                bottom: -2px;
                width: 100%;
                height: 2px;
                background-color: #3498db;
                transform: scaleX(0);
                transform-origin: 100%;
                transition: transform 0.3s ease-in-out;
            }

            .underline-button:hover::after {
                transform: scaleX(1);
                transform-origin: 0%;
            }

            .search-container {
                text-align: center;
                margin-top: 40px;
                display: flex;
                justify-content: center;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: hsl(155, 83%, 69%);
                min-width: 160px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                z-index: 1;
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown-item {
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                color: black;
            }

            .dropdown-item:hover {
                background-color: hsl(162, 68%, 49%);
            }

            .search-wrapper {
                display: flex;
                align-items: center;
                justify-content: flex-start;
                margin-left: 20px;
            }

            .search-text {
                margin-right: 10px;
                font-size: 20px;
            }

            .search-bar {
                width: 300px;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                margin-right: 25px;
            }

    </style>
</head>

<body>

    <header>
        <div>
            <a href="homepage.php" style="text-decoration: none; color:black">
              <h1 style="font-size:120px; line-height:30%; margin-bottom:25px; margin-top: 10px;">Heather‧࿐࿔ </h1>
            </a>
            <h2 style="font-size:22px;">Find the right cohabitation for you.</h2>
        </div>

        <div class="header-buttons">
            <a href="#" class="underline-button" onclick="window.location.href = 'aboutus.html'">About Us</a>
            <div class="dropdown">
                <a href="#" class="underline-button">Contact Us</a>
                <div class="dropdown-content">
                    <a href="mailto:1211103282@student.mmu.edu.my" class="dropdown-item">Aida</a>
                    <a href="mailto:1211103293@student.mmu.edu.my" class="dropdown-item">Farah</a>
                    <a href="mailto:1211307539@student.mmu.edu.my" class="dropdown-item">Amirah</a>
                </div>
            </div>
            <button class="button" onclick="redirectLogInPage()">Log In</button>
        </div>
    </header>

    <form method="post">
    <div class="search-container">
        <div class="search-wrapper">
            <span class="search-text">Area or Postcode</span>
            <input name="searchTerm" value="" type="text" class="search-bar" placeholder="Search">
            <button class="button" name="search">Search</button>
        </div>
    </div>
    </form>

    <?php
    include "connection.php";
    // for listing properties
    $sql = "SELECT *, CONCAT(users.USER_FNAME, ' ', users.USER_LNAME) AS user_name 
            FROM property 
            INNER JOIN users ON property.ADVERTISER_ID = users.USER_ID
            WHERE status = 'available'"; // should i include unavailable, pending?
    $result = $conn->query($sql);

        // for filtering search
        if (isset($_POST['search'])) {
            $searchTerm = $_POST['searchTerm'];
            $sqlSearch = "SELECT *, CONCAT(users.USER_FNAME, ' ', users.USER_LNAME) AS user_name  
                        FROM property
                        INNER JOIN users ON property.ADVERTISER_ID = users.USER_ID
                        WHERE POSTCODE = '$searchTerm' OR PROP_ADDRESS LIKE '%$searchTerm%' OR PROP_NAME LIKE '%$searchTerm%'
                        AND status = 'available'";
            $exec = $conn->query($sqlSearch);

            if ($exec->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($exec)) {
                    ?>
                            <div class="property-container">
                            <h1><?php echo $row['PROP_NAME']; ?></h1>
                            <img src="<?php echo $row['image']; ?>" alt="Property Image" style="max-width: 100%; height: auto;">
                            <p><strong>Property Advertiser:</strong> <?php echo $row['user_name']; ?></p>
                            <p><strong>Property Address:</strong> <?php echo $row['PROP_ADDRESS']; ?></p>
                            <p><strong>Postcode:</strong> <?php echo $row['POSTCODE']; ?></p>
                            <p><strong>Floor Area (in square metre):</strong> <?php echo $row['FLOOR_AREA']; ?></p>
                            <p><strong>Room Number:</strong> <?php echo $row['ROOM_NUM']; ?></p>
                            <p><strong>Property Description:</strong> <?php echo $row['PROP_DESCRIPTION']; ?></p>
                            <p><strong>Property Price:</strong> <?php echo $row['PROP_PRICE']; ?></p>
                            <p><strong>Property Rules:</strong> <?php echo $row['PROP_RULES']; ?></p>
                            <p><strong>Status:</strong> <?php echo $row['status']; ?></p>
                            <button class="button" onclick="redirectLogInPage()">Chat to book with us!</button>
                        </div>
                    <?php
                }
            } else {
                echo '<p>No properties found matching your search.</p>';
            }
        } else{
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="property-container">
                        <h1><?php echo $row['PROP_NAME']; ?></h1>
                        <img src="<?php echo $row['image']; ?>" alt="Property Image" style="max-width: 100%; height: auto;">
                        <p><strong>Property Advertiser:</strong> <?php echo $row['user_name']; ?></p>
                        <p><strong>Property Address:</strong> <?php echo $row['PROP_ADDRESS']; ?></p>
                        <p><strong>Postcode:</strong> <?php echo $row['POSTCODE']; ?></p>
                        <p><strong>Floor Area (in square metre):</strong> <?php echo $row['FLOOR_AREA']; ?></p>
                        <p><strong>Room Number:</strong> <?php echo $row['ROOM_NUM']; ?></p>
                        <p><strong>Property Description:</strong> <?php echo $row['PROP_DESCRIPTION']; ?></p>
                        <p><strong>Property Price:</strong> <?php echo $row['PROP_PRICE']; ?></p>
                        <p><strong>Property Rules:</strong> <?php echo $row['PROP_RULES']; ?></p>
                        <p><strong>Status:</strong> <?php echo $row['status']; ?></p>
                        <button class="button" onclick="redirectLogInPage()">Chat to book with us!</button>
                    </div>
            <?php
                }
            } else {
                echo "No properties found.";
            }
        }
        ?>

    <script>
        function redirectLogInPage() {
            window.location.href = 'login.php';
        }
    </script>

</body>
</html>
