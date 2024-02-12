<?php
    session_start(); 
    if (!isset($_SESSION['USER_ID'])) {
        header("Location: login.php");
        exit();
    }
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

        .searchButton {
            padding: 5px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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

        /* Styles for the container box */
        .container-box {
            width: 200px;
            height: 60px;
            margin-left: 40%;
            background-color: powderblue;
            border-radius: 10px;
            padding: 20px;
            cursor: pointer;
            margin-top: 20px;
            text-align: center;
        }

        .container-box:hover {
            background-color: skyblue;
        }

        .personalized-content {
            text-align: left;
            font-size: 15px;
            margin-top: 15px;
            margin-left: 15px;
        }
    </style>
</head>

<body>

    <header>
        <div>
            <a href="Phomepage.php" style="text-decoration: none; color:black">
                <h1 style="font-size:100px; line-height:30%; margin-bottom:25px; margin-top: 10px;">Heather‧࿐࿔ </h1>
            </a>
            <h2 style="font-size:22px;">Find the right cohabitation for you.</h2>
        </div>

        <div class="header-buttons">
            <a href="abouts.html" class="underline-button">About Us</a>
            <div class="dropdown">
                <a href="#" class="underline-button">Contact Us</a>
                <div class="dropdown-content">
                    <a href="mailto:1211103282@student.mmu.edu.my" class="dropdown-item">Aida</a>
                    <a href="mailto:1211103293@student.mmu.edu.my" class="dropdown-item">Farah</a>
                    <a href="mailto:1211307539@student.mmu.edu.my" class="dropdown-item">Amirah</a>
                </div>
            </div>
            <a href="bookingstat.html" class="underline-button">Booking Status</a>
            <button class="button" onclick="openChat()">
                <img src="chatbox.ico" alt="Chat Box">
            </button>
            <button class="button" onclick="redirectToUserProfile()">
                <img src="user.ico" alt="User Profile">
            </button>
        </div>
    </header>

    <div class="personalized-content">
        <h2>Welcome back, <?php echo $_SESSION['USER_FNAME']; ?>!</h2>
    </div>

    <!-- Container box -->
    <div class="container-box" onclick="redirectToAnotherPage()">
        <!-- Content inside the box -->
        <h3>Application Form</h3>
    </div>

    <script>
        function openChat() {
            console.log("Opening the chat");
        }

        function redirectToUserProfile() {
            window.location.href = 'userprofile.html'; // Replace with the actual user profile page
        }

        // Function to redirect to another page
        function redirectToAnotherPage() {
            window.location.href = 'portal.php'; // Replace 'another_page.html' with the URL of the page you want to navigate to
        }
    </script>

</body>

</html>
