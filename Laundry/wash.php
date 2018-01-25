<?php
require_once '../inc/conn.php';

 error_reporting(E_ERROR);
$jobID=$_GET['jobID'];
$weight =$_GET['weight'];
$weightX =$_GET['weight']/1000;
 $jobIDen=base64_encode($jobID);
//echo".................".$weightX."..............";
// echo"<br>";

$chck=$conn->prepare("SELECT * FROM laundryjobclothes where jobID='".$jobID."'");
$chck->execute();
if($chck->rowCount()==0){
  //  echo"empty";
    
    header('Location:addCloth.php?jobID='.$jobIDen.'&error=you need to add  clothes to job before sending to wash !');
}
else{
    calDetSoft($conn,$weightX);
    $maNo=findMachine($conn,$weight);
    $sql = "UPDATE laundryjob SET jobStatus= 'washing',machineNo=".$maNo."  WHERE `jobID` ='".$jobID."'";
    $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            header('Location:viewJobs.php');
        } 
        else {
         //   echo "ERROR::Updating";
        }
}    
    //functions
function findMachine($conn,$weight){
        
    $q2=$conn->prepare("SELECT * FROM laundrymachines WHERE stat=1  AND removed ='0' AND working =1");
    $q2->execute();
    $q2c=$q2->rowCount();
 //   echo" count at 31" .$q2c;
    if($q2c==0){
          //  echo "no of results at stat=0- all-----".$q2c;
           // echo '---null';
            $q1="SELECT MIN(machineNo) FROM laundrymachines WHERE removed ='0' AND working =1 ";
            $minimum = $conn->prepare($q1);
            $minimum->execute();
            while($d=$minimum->fetch(PDO::FETCH_ASSOC)){
            $min=$d['MIN(machineNo)'];
             //   echo"--minimum--". $min;
            }
           
            $q3=$conn->prepare("UPDATE `laundrymachines` SET `stat` = '1' WHERE `laundrymachines`.`machineNo` = ".$min."");
            try{
                $q3->execute();
                if($q3->execute()){
                    $machineNo= assignMachine($conn, $weight);
                    increment($conn, $machineNo);
                    return $machineNo;
                }
            }
            catch ( PDOException $e){
          //    echo $e->getMessage();
            }
    }
    else{
            $machineNo= assignMachine($conn, $weight);
            increment($conn, $machineNo);
            return $machineNo;
    }
}

function assignMachine($conn,$weight){
    $q4=$conn->query("SELECT * FROM `laundrymachines` where `stat`='1'  AND `working` ='1' AND `removed`='0' ");
    $q4->execute();
    while($d3=$q4->fetch(PDO::FETCH_ASSOC)){
        $machineNoX=$d3['machineNo'];
    //    echo" assignMachine--func==".$d3['machineNo']."--aka---".$machineNoX;
    }
    return $machineNoX;
}

function increment($conn,$machineID){
    try{
        $q5=$conn->prepare("UPDATE `laundrymachines` SET `stat` = '0' WHERE `laundrymachines`.`machineNo` ='".$machineID."' ");
        if($q5->execute()){
   //        echo" --- q5 done--";
        }
        $q6=$conn->prepare("SELECT * FROM `laundrymachines` where `removed`='0' AND `working`=1 AND `stat`=0  AND `machineNo`>'".$machineID."' LIMIT 1");
        $q6->execute();
        $next=$q6->fetch(PDO::FETCH_ASSOC);
        $nextMachineNo=$next['machineNo'];
        print("\n");
     //   echo "Next machine Number ----".$nextMachineNo;
        $q7=$conn->prepare("UPDATE laundrymachines SET stat=1 WHERE machineNO='".$nextMachineNo."'");
        if($q7->execute()){
      //        echo"machine no incremented";
        }                
    }
    catch (PDOException $e1){
         // echo $e1->getMessage();
     
    }
}
function calDetSoft($conn,$weightX){   
    
    $det=$weightX*0.05;
    $soft=$weightX*0.027;
    
    //get detergent level limit 1 accending order-----------------------------------------------------------------------------------------------------------------------------------------------
    $q1=$conn->prepare("SELECT * FROM `laundrystock` where `itemBatch`='Detergent' ORDER BY `laundrystock`.`dateAdded` ASC LIMIT 1");
    $q1->execute();
    $d1=$q1->fetch(PDO::FETCH_ASSOC);
    $damount=$d1['amount'];
    $ditemcode=$d1['itemCode'];
    //if current level >$det
    if($d1['amount']>$det){
        //do calucalulations and update table
        $newAmount=$damount-$det;
      //  echo $damount."-".$det."newAmount---".$newAmount."---------";
        $u1=$conn->prepare("UPDATE `laundrystock` SET `amount`='".$newAmount."' where `itemCode`='".$ditemcode."'");
        $u1->execute();
        
    //    echo $newAmount."---------";
    }
    else{
        $reductNext=($damount-$det);
       // echo $damount."..........".$det."reduct next".$reductNext;
        //reduce that amount from next detergent item number 
        //get next detergent itemnumber
        $qn1=$conn->prepare(" SELECT * FROM laundrystock where itemBatch='Detergent' AND itemCode>'".$d1['itemCode']."' ORDER BY laundrystock.dateAdded ASC LIMIT 1");
        $qn1->execute();
        $dn1=$qn1->fetch(PDO::FETCH_ASSOC);
        
        $nextIt=$dn1['itemCode'];
        $weightNU=$dn1['amount']+$reductNext;
      //  echo"..dn1[amount]..".$dn1['amount'];
      //  echo"...nextIt....".$nextIt.".....    ";
        
//echo"..weightnu....".$weightNU;
        
        $u2=$conn->prepare("UPDATE `laundrystock` SET amount='".$weightNU."' where itemCode='".$nextIt."'");
        $u2->execute();
    //reduce current level of given item no
        $u3=$conn->prepare("UPDATE `laundrystock` SET amount='0' where `itemCode`='".$d1['itemCode']."'");
        $u3->execute();
    }    
    //get softner level limit 1 accending order
    // echo"<br>";
     
   // echo"get detergent level limit 1 accending order-----------------------------------------------------------------------------------------------------------------------------------------------";
    $q2=$conn->prepare("SELECT * FROM `laundrystock` where `itemBatch`='Softner' ORDER BY `laundrystock`.`dateAdded` ASC LIMIT 1");
    $q2->execute();
    $d2=$q2->fetch(PDO::FETCH_ASSOC);
    $samount=$d2['amount'];
    $sitemcode=$d2['itemCode'];
    //if current level >$det
    if($d2['amount']>$soft){
        //do calucalulations and update table
        $SnewAmount=$samount-$soft;
   //     echo $samount."-".$soft."newAmount---".$SnewAmount."---------";
        $u1=$conn->prepare("UPDATE `laundrystock` SET `amount`='".$SnewAmount."' where `itemCode`='".$sitemcode."'");
        $u1->execute();
        
    //    echo $SnewAmount."---------";
    }
    else{
        $sreductNext=($samount-$soft);
   //     echo "samaount.......".$samount."..........".$soft."reduct next".$sreductNext;
        //reduce that amount from next detergent item number 
        //get next detergent itemnumber
        $qn2=$conn->prepare(" SELECT * FROM laundrystock where itemBatch='Softner' AND itemCode>'".$d2['itemCode']."' ORDER BY laundrystock.dateAdded ASC LIMIT 1");
        $qn2->execute();
        $dn2=$qn2->fetch(PDO::FETCH_ASSOC);
        
        $snextIt=$dn2['itemCode'];
        $sweightNU=$dn2['amount']+$reductNext;
  //      echo"..dn1[amount]..".$dn2['amount'];
  //      echo"...nextIt....".$snextIt.".....    ";
        
  //      echo"..weightnu....".$sweightNU;
        
        $u4=$conn->prepare("UPDATE `laundrystock` SET amount='".$sweightNU."' where itemCode='".$snextIt."'");
        $u4->execute();
    //reduce current level of given item no
        $u5=$conn->prepare("UPDATE `laundrystock` SET amount='0' where `itemCode`='".$d2['itemCode']."'");
        $u5->execute();
    }    
    

}



    
?>