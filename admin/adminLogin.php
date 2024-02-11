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

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM admins WHERE (ADMIN_EMAIL = ? OR ADMIN_CONTACT = ?) AND ADMIN_PASS = ?");
    $stmt->bind_param("sss", $email, $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

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

    $stmt->close();
    $conn->close();
}
?>
