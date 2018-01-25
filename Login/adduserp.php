<?php
require '../Login/session.php';  
require_once '../inc/conn.php';


$uname = $_POST['uname'];
$role = $_POST['role'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if (empty($uname) && empty($role) && empty($password) && !isset($cpassword)) {
    echo "Fill all the fields!";
} else {
    $sql = "INSERT INTO `users` (`UID`, `uname`, `password`, `role`, `EmpID`) VALUES ('', '$uname', '$password', '$role', '')";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        echo "Added";
    }else{
        echo "ERROR::Adding";
    }
}
?>