<?php
require '../Login/session.php';
require_once '../inc/conn.php';


$user=$_GET['uid'];



if (empty($user)) {
    echo "ERROR:: EMPTY REQUEST";
} else {

   
    $sql = "DELETE FROM users WHERE UID='$user'";

    $conn->exec($sql);

    echo "Deleted... Redirecting in 1 second...";
    header("Location: viewUsers.php");
}

