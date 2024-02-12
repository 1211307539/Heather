<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connection.php";

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

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); 
            $role = $row["USER_TYPE"];    

            $_SESSION["USER_ID"] = $email; 
            $_SESSION["USER_TYPE"] = $role;

            $userFirstName = $row["USER_FNAME"];
            $userID = $row["USER_ID"];

            $_SESSION["USER_FNAME"] = $userFirstName;
            $_SESSION["USER_ID"] = $userID;

            switch ($role) {
                case "Tenant":
                    $_SESSION["user"] = $email;
                    header("Location: Thomepage.php");
                    break;
                case "Advertiser":
                    $_SESSION["user"] = $email;
                    header("Location: Phomepage.php");
                    break;
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
