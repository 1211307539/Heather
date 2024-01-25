<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "heather";
    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    // Get user input
    $email = $_POST["email"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM users WHERE USER_EMAIL = '$email' AND USER_PASS = '$password'";
    $result = $conn->query($sql);


    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // fetch row
        $role = $row["USER_TYPE"];     // fetch user_type from row


        // Set session variable based on the role
        $_SESSION["email"] = $email;
        $_SESSION["USER_TYPE"] = $role;


        // Redirect based on the role
        switch ($role) {
            // case "Admin":
            //     header("Location: adminDashboard.php");
            //     break;
            case "Tenant":
                header("Location: Thomepage.html");
                break;
            // case "Advertiser":
            //     header("Location: fill in here");
            //     break;
            default:
                echo "Unknown user role.";
                break;
        }
    } else {
        $_SESSION["invalid_user"] = "Invalid email/phone-number or password.";
    }

    $conn->close();
}
?>

<script>
    var errorMessage = "<?php echo isset($_SESSION['invalid_user']) ? $_SESSION['error_message'] : ''; ?>";
    
    if (errorMessage) {
        alert(errorMessage);
        <?php unset($_SESSION['invalid_user']); ?> 
    }
</script>