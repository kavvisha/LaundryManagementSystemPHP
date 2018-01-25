<?php

require_once '../inc/conn.php';

$machineNo=$_POST['machineNo'];
$date= date_create();
$sql = "UPDATE `laundryMachines` SET  `removed`='".date_format($date, 'Y-m-d H:i:s')."' WHERE `laundryMachines`.`machineNo` ='$machineNo'";
//$sql="insert into `laundryMachines` (`machineModel`,`invoiceNo`) values ('$machineModel','$purchaseInvoice')";
$stmt=$conn->prepare($sql);
//echo $machineModel;
//echo $purchaseInvoice;
if($stmt->execute()){
    
    echo"addeed";
    echo $machineNo;
    header("Location:laundryMachines.php");
    
}