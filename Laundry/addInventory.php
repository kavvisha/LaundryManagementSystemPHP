<?php

require_once '../inc/conn.php';
$itemcode=$_POST['itemcode'];
$itemname=$_POST['itemName'];
$batch=$_POST['batch'];
$amount=$_POST['itemAmount'];

//echo$itemcode;
//echo$itemname;
//echo$batch;
//echo$amount;
        
try{
    $sql=$conn -> prepare("INSERT INTO `laundrystock` (`itemCode`, `itemName`, `itemBatch`, `amount`, `dateAdded`) VALUES ('".$itemcode."', '".$itemname."', '".$batch."', '".$amount."', NOW());");
    if($sql->execute()){
    //    echo "Added";
        header('Location:laundryStock.php?status=Item Added');
    }
}
catch (Exception $e) {
  //  echo 'Caught exception: ',  $e->getMessage(), "\n";
    $err=$e->getMessage()." <br>";
    header('Location:laundryStock.php?status=Please Check credentials , Could not add Item '.$err);
}

        