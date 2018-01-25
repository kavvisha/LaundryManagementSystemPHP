<?php
//error_reporting(E_ERROR);
require_once '../inc/conn.php';
$machineNo=$_GET['machineNo'];
   // echo $machineNo;

    $sql="UPDATE laundrymachines SET working=1 WHERE machineNo=".$machineNo."";
    $stmt=$conn->prepare($sql);
    
    if($stmt->execute()){
        //echo"updated";
        header('Location:laundryMachines.php');
        exit();
        
        
    }
    
