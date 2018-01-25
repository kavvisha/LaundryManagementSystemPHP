<?php

require '../Login/session.php';
require_once '../inc/conn.php';

$empID = $_GET['empID'];
$image = $_GET['image'];


if (empty($empID)) {
    echo "ERROR:: EMPTY REQUEST";
} else {

    $file = "uploads/$image";

    if (!unlink($file)) {
        echo ("Error deleting $file");
    } else {
        echo ("Deleted $file");
    }
    $sql = "DELETE FROM employee WHERE empID='$empID'";

    $conn->exec($sql);

    echo "Deleted... Redirecting in 1 second...";
    header("Location: viewEmployees.php");
}
?>

