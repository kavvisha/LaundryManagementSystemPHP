<?php
require '../Login/session.php';  
require_once '../inc/conn.php';

if(!empty($_POST["NIC"])) {
    
    $NIC=$_POST["NIC"];
    $sql="SELECT NIC FROM employee WHERE NIC='$NIC'";
    $q=$conn->prepare($sql);
    $q->execute();
    $nrows=$q->rowCount();
    if($nrows==1){
        echo "<span style='color:red'>This employee is exsist in the system</span>";
    }
    
}else{
    echo "Empty request, Please fill the field";
}

