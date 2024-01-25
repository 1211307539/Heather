<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "../connection.php";

    // Get user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)){
        header("Location: adminLoginPage.php?error=Fill in the blank");
        exit();
    } else {

    $sql = "SELECT * FROM users WHERE USER_EMAIL = '$email' OR USER_CONTACT = '$email' AND USER_PASS = '$password'";
    $result = $conn->query($sql);

    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // fetch row
        $role = $row["USER_TYPE"];

        $_SESSION["USER_TYPE"] = $role;

        if($role == "Admin"){
            $_SESSION["user"] = $email;
            header("Location: adminDashboard.php");
        }else{
            header("Location: adminLoginPage.php?error=Invalid user.");
            exit();  
        }
    } else {
        header("Location: adminLoginPage.php?error=Incorrect email/phone-number or password.");
        exit();
    }
    }

    $conn->close();
}
?>