<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connection.php";

    // Get user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)){
        header("Location: login.php?error=Fill in the blank");
        exit();
    } else {

        $stmt = $conn->prepare("SELECT * FROM users WHERE (USER_EMAIL = ? OR USER_CONTACT = ?) AND USER_PASS = ?");
        $stmt->bind_param("sss", $email, $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

         // Check if user exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // fetch row
            $role = $row["USER_TYPE"];     // fetch user_type from row


            // Set session variable based on the role
            $_SESSION["USER_ID"] = $email; // Assuming email is unique
            $_SESSION["USER_TYPE"] = $role;

            // Fetch the user's first name from the database
            $userFirstName = $row["USER_FNAME"];

            // Set the user's first name in the session
            $_SESSION["USER_FNAME"] = $userFirstName;

            // Redirect based on the role
            switch ($role) {
                case "Tenant":
                    $_SESSION["user"] = $email;
                    header("Location: Thomepage.php");
                    break;
                // case "Advertiser":
                //     header("Location: fill in here");
                //     break;
                default:
                    echo "Unknown user role.";
                    break;
            }
        } else {
            header("Location: login.php?error=Incorrect email/phone-number or password.");
            exit();        
        }
    }

    $stmt->close();
    $conn->close();
}
?>
