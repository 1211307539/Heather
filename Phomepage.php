<?php
    include "connection.php";
    session_start(); 
    if (!isset($_SESSION['USER_ID'])) {
        header("Location: login.php");
        exit();
    }

    $advertiserId = $_SESSION['USER_ID'];

    $stmt = $conn->prepare("SELECT * FROM property WHERE ADVERTISER_ID = ?");
    $stmt->bind_param("i", $advertiserId);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heather</title>
    <link rel="icon" href="icon.ico" type="image/x-icon">

    <style>
        body {
            margin: 0;
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
            margin-top: 90px;
            font-size: 20px;
        }

        .button {
            padding: 0;
            border: none;
            cursor: pointer;
            background-color: transparent;
        }

        .button img {
            width: 40px;
            height: 40px;
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
            right: 0;
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

        .container {
            box-sizing: border-box;
            width: 1200px;
            height: 100%;
            margin-top: 20px;
            overflow: hidden;
            margin-left: 80px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .personalized-content {
            text-align: left;
            font-size: 15px;
            margin-top: 15px;
            margin-left: 15px;
        }

        .addProp {
            padding: 5px;
            font-size: 15px;
            border-radius: 2px;
            background-color: powderblue;
            color: #000;
            border: 1px solid #000;
        }

    </style>
</head>

<body>

    <header>
        <div>
        <a href="Phomepage.php" style="text-decoration: none; color: black;">
            <h1 style="font-size:100px; line-height:30%; margin-bottom:25px;">Heather‧࿐࿔ </h1>
        </a>
            <h2 style="font-size:22px;">Find the right cohabitation for you.</h2>
        </div>

        <div class="header-buttons">
            <a href="aboutus.html" class="underline-button">About Us</a>
            <div class="dropdown">
                <a href="#" class="underline-button">Contact Us</a>
                <div class="dropdown-content">
                    <a href="mailto:1211103282@student.mmu.edu.my" class="dropdown-item">Hanju</a>
                    <a href="mailto:1211103293@student.mmu.edu.my" class="dropdown-item">Farah</a>
                    <a href="mailto:1211307539@student.mmu.edu.my" class="dropdown-item">Amirah</a>
                </div>
            </div>
            <a href="updatebooking.html" class="underline-button">Booking Status</a>
            <button class="button" onclick="openChat()">
                <img src="img/chatbox.ico" alt="Chat Box">
            </button>
            <div class="dropdown">
                <button class="button"> <img class="button" src="img/user.ico" alt="User Profile"> </button>
                <div class="dropdown-content">
                    <a href="#" class="dropdown-item" onclick="redirectToUserProfile()">View Profile</a>
                    <a href="#" class="dropdown-item" onclick="redirectToHomepage()">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <div class="personalized-content">
        <h2>Welcome back, <?php echo $_SESSION['USER_FNAME']; ?>!</h2>
    </div>

    <div class="container">
        <h1>Your Properties</h1>

        <?php
            if ($result->num_rows > 0) {
                echo "<h3>Your Properties:</h3>";
                    while ($property = $result->fetch_assoc()) {
                        // Display property information
                        echo "<img src='{$property['image']}' alt='Property Image' style='max-width: 60%; height: 30%;'>";
                        echo "<div class='property-container'>";
                        echo "<h1>{$property['PROP_NAME']}</h1>";
                        echo "<h3>{$property['PROP_ADDRESS']}</h3>";
                        echo "<h3>{$property['POSTCODE']}</h3>";
                        echo "<h3>{$property['FLOOR_AREA']}</h3>";
                        echo "<h3>{$property['ROOM_NUM']}</h3>";
                        echo "<h3>{$property['PROP_DESCRIPTION']}</h3>";
                        echo "<h3>{$property['PROP_PRICE']}</h3>";
                        echo "<h3>{$property['PROP_RULES']}</h3>";
                        echo "<h3>{$property['status']}</h3>";
                        echo "</div>";
                        echo '<button class="addProp" onclick="redirectToPortal()">Add Property</button>';
                    }
                } else {
                    echo "<p>You have no properties listed.</p>";
                    echo '<button class="addProp" onclick="redirectToPortal()">Add Property</button>';
                }
        ?>

    </div>   

    <script>
        function openChat() {
            console.log("Opening Chat");
        }

        function redirectToUserProfile() {
            window.location.href = 'userprofile.php';
        }
        
        function redirectToHomepage() {
            window.location.href = 'homepage.php'
        }

        function redirectToPortal() {
            window.location.href = 'portal.php'
        }
    </script>

</body>

</html>
