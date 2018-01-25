<?php

require '../Login/session.php';
require_once '../inc/conn.php';

$uid = $_POST['uid'];
$uname = $_POST['uname'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if (empty($uname) && empty($password) && !isset($cpassword) && !isset($uid)) {
    echo "Fill all the fields!";
} else {
    $sql = "UPDATE `users` SET  `password`='$password' WHERE `users`.`UID` ='$uid'";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        echo "Updated...!";
    } else {
        echo "ERROR::Updating";
    }
}
?>