<?php

require_once '../inc/conn.php';

session_start();
$user_check = $_SESSION['login_user'];


$stmt=$conn->prepare("select uname from users where uname='$user_check'");
$stmt->execute();
$result=$stmt->fetchColumn();


$login_session=$result;


//echo $login_session;
if(empty($login_session)){
    $conn = null;
    header('location: ../Login/index.php');
}
?>