<?php

require_once '../inc/conn.php';

$machineModel=$_POST['machineModel'];
$purchaseInvoice=$_POST['invoiceNumber'];
$capacity=$_POST['capacity'];

$sql="insert into `laundryMachines` (`machineModel`,`invoiceNo`,`capacity`, `added`) values ('$machineModel','$purchaseInvoice','$capacity',now())";
$stmt=$conn->prepare($sql);
echo $machineModel;
echo $purchaseInvoice;
if($stmt->execute()){
    
    echo"addeed";
    header("Location:laundryMachines.php?");
    
}