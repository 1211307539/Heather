<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heather</title>
    <link rel="icon" href="icon.ico" type="image/x-icon">

    <style>
        body {
            font-family: Inria Serif;
            padding: 20px;
        }

        .property-details {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: powderblue;
        }

        h1 {
            font-size: 28px;
            color: #333;
        }

        p {
            font-size: 18px;
            color: black;
        }

        .Button {
                padding: 5px 20px;
                background-color: #3498db;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
        }
    </style>
</head>
<body>

    <?php
        include "connection.php";
        if (isset($_GET['PROP_ID'])) {
            $propId = $_GET['PROP_ID'];

            $sql = "SELECT room.*, property.*, CONCAT(users.USER_FNAME, ' ', users.USER_LNAME) AS user_name 
                    FROM room
                    INNER JOIN property ON room.PROP_ID = property.PROP_ID
                    INNER JOIN users ON property.ADVERTISER_ID = users.USER_ID 
                    WHERE room.PROP_ID = $propId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="property-details">
                        <h1>Property Details</h1>
                        <img src="<?php echo $row['ROOM_IMAGE']; ?>" alt="Room Image" style="max-width: 100%; height: auto;">
                        <p><strong>Room ID:</strong> <?php echo $row['ROOM_ID']; ?></p>
                        <p><strong>Property Advertiser:</strong> <?php echo $row['user_name']; ?></p>
                        <p><strong>Property Advertiser ID:</strong> <?php echo $row['ADVERTISER_ID']; ?></p>
                        <p><strong>Property Name:</strong> <?php echo $row['PROP_NAME']; ?></p>
                        <p><strong>Property Address:</strong> <?php echo $row['PROP_ADDRESS']; ?></p>
                        <p><strong>Postcode:</strong> <?php echo $row['POSTCODE']; ?></p>
                        <p><strong>Property Description:</strong> <?php echo $row['PROP_DESCRIPTION']; ?></p>
                        <p><strong>Property Price:</strong> <?php echo $row['PROP_PRICE']; ?></p>
                        <p><strong>Property Rules:</strong> <?php echo $row['PROP_RULES']; ?></p>
                        <p><strong>Status:</strong> <?php echo $row['status']; ?></p>
                        <button class="Button" onclick="redirectToChatRoom(<?php echo $row['ADVERTISER_ID']; ?>)">Chat to book with us!</button>
                        <button class="Button" onclick="history.back()">Close</button>
                    </div>
            
                    <?php
                }
            } else {
                echo "No rooms left.";
            }
        } else {
            echo "Invalid property ID.";
        }
    ?>

    <script>
        function redirectToChatRoom(advertiserId) {
           window.location.href = 'chatroom.php?ADVERTISER_ID=' + advertiserId;
        }
    </script>       

</body>
</html>
