<?php
require_once '../inc/conn.php';
session_start();
$uname = $_POST['uname'];
$pass = $_POST['pass'];

$stmt = $conn->prepare("select uname,password from users where uname='$uname' and password='$pass'");

$stmt->execute();

$nfrows = $stmt->rowCount();




if ($nfrows == 1) {

    $_SESSION['login_user'] = $uname;
    header("location: ../Employee");
    
    echo "Working";
} else {
    header("location: index.php");
}

$conn = null;
?>

