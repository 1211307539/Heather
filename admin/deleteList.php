<?php
include "../connection.php";

if (isset($_GET['USER_ID'])) {
    $id = $_GET['USER_ID'];
    $sql = "DELETE FROM users WHERE USER_ID = $id";
    $conn->query($sql);

    header('location:/Heather/admin/userList.php');
}

if (isset($_GET['PROP_ID'])) {
    $prop_id = $_GET['PROP_ID'];
    $sql = "DELETE FROM property WHERE PROP_ID = $prop_id";
    $conn->query($sql);

    header('location:/admin/propertyList.php');
}

exit;
?>
