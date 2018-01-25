<?php
require_once '../inc/conn.php';
//error_reporting(E_ERROR);
$machineNo=$_GET['machineNo'];
   // echo $machineNo;
    
    $chk=$conn->query("SELECT * FROM `laundrymachines` where machineNo='".$machineNo."'");
    $chk->execute();
    while($data1=$chk->fetch(PDO::FETCH_ASSOC)){
        if($data1['stat']==1){
                $chng=$conn->query("SELECT MIN(machineNo)FROM `laundrymachines` where `machineNo`>'".$machineNo."' AND stat='0' ");
                $chng->execute();
                $data=$chng->fetch(PDO::FETCH_ASSOC);
                $skipN=$data['MIN(machineNo)'];

                $skipQ=$conn->query("UPDATE `laundrymachines` SET `stat`=1 WHERE `machineNo`='".$skipN."'");
                $skipQ->execute();
                $skipQZ=$conn->query("UPDATE `laundrymachines` SET `stat`=0 WHERE `machineNo`='".$machineNo."'");
                $skipQZ->execute();
        }        
                $sql="UPDATE laundrymachines SET working=0 WHERE machineNo=".$machineNo."";
                $stmt=$conn->prepare($sql);

                if($stmt->execute()){
                    //echo"updated";
                    header('Location:laundryMachines.php');
                    exit();
                }
            
        
    }
    
    

    
    ?>
    


