<?php
require_once '../inc/conn.php';
$date=$_GET['dateCA'];
$cloth=$_GET['cloth'];
$count=$_GET['count'];
$jobID=$_GET['jobID'];
//echo $date;
//echo $cloth;
//echo $count;
//echo $jobID;




//get cloth weight
$cw=$conn->prepare("SELECT * from laundrypricelist where itemName='".$cloth."' limit 1");
$cw->execute();
while($d=$cw->fetch(PDO::FETCH_ASSOC)){
    $weight=$d['weight'];
  //  echo $weight;
}
//delete from jobClothes

$dc=$conn->prepare("DELETE FROM laundryjobclothes where dateCA='".$date."'");
if($dc->execute()){
    //echo"deleted ! ";
}

//reduce weight and cost of job
$pr=$conn->prepare("SELECT * from laundryprice");
$pr->execute();
while($p=$pr->fetch(PDO::FETCH_ASSOC)){
    $price=$p['price'];

}

$reduce=$conn->prepare("SELECT * from laundryjob where jobID='".$jobID."'");
$reduce->execute();
while($d2=$reduce->fetch(PDO::FETCH_ASSOC)){
    $weight2=$d2['weight'];
    $cost2=$d2['cost'];
    
    //echo $weight2;
    //echo $cost2;
    
}
//update jobtable

$newWeight=$weight2-($weight*$count);
$cprice=($newWeight/1000)*$price;
$update=$conn->prepare("UPDATE `laundryjob` SET `weight` = '".$newWeight."', `cost` = '".$cprice."' WHERE `laundryjob`.`jobID` = ".$jobID." ");
if($update->execute()){
    //echo " updated";
    $jobIDen=base64_encode($jobID);
    header("Location:addCloth.php?jobID=$jobIDen");
}


?>