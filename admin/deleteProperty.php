<?php
include "../connection.php";

if (isset($_GET['PROP_ID'])) {
    $prop_id = $_GET['PROP_ID'];
    $sql = "DELETE FROM property WHERE PROP_ID = $prop_id";
    $conn->query($sql);

    header('location:/admin/propertyList.php');
}

exit;
?>
