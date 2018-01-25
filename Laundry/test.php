<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../inc/conn.php'; 

    $weight = 13 ;
   
    
    $det=$weight*0.05;
    $soft=$weight*0.027;
    
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
        echo $damount."-".$det."newAmount---".$newAmount."---------";
        $u1=$conn->prepare("UPDATE `laundrystock` SET `amount`='".$newAmount."' where `itemCode`='".$ditemcode."'");
        $u1->execute();
        
        echo $newAmount."---------";
    }
    else{
        $reductNext=($damount-$det);
        echo $damount."..........".$det."reduct next".$reductNext;
        //reduce that amount from next detergent item number 
        //get next detergent itemnumber
        $qn1=$conn->prepare(" SELECT * FROM laundrystock where itemBatch='Detergent' AND itemCode>'".$d1['itemCode']."' ORDER BY laundrystock.dateAdded ASC LIMIT 1");
        $qn1->execute();
        $dn1=$qn1->fetch(PDO::FETCH_ASSOC);
        
        $nextIt=$dn1['itemCode'];
        $weightNU=$dn1['amount']+$reductNext;
        echo"..dn1[amount]..".$dn1['amount'];
        echo"...nextIt....".$nextIt.".....    ";
        
        echo"..weightnu....".$weightNU;
        
        $u2=$conn->prepare("UPDATE `laundrystock` SET amount='".$weightNU."' where itemCode='".$nextIt."'");
        $u2->execute();
    //reduce current level of given item no
        $u3=$conn->prepare("UPDATE `laundrystock` SET amount='0' where `itemCode`='".$d1['itemCode']."'");
        $u3->execute();
    }    
    //get softner level limit 1 accending order
     echo"<br>";
     
    echo"get detergent level limit 1 accending order-----------------------------------------------------------------------------------------------------------------------------------------------";
    $q2=$conn->prepare("SELECT * FROM `laundrystock` where `itemBatch`='Softner' ORDER BY `laundrystock`.`dateAdded` ASC LIMIT 1");
    $q2->execute();
    $d2=$q2->fetch(PDO::FETCH_ASSOC);
    $samount=$d2['amount'];
    $sitemcode=$d2['itemCode'];
    //if current level >$det
    if($d2['amount']>$soft){
        //do calucalulations and update table
        $SnewAmount=$samount-$soft;
        echo $samount."-".$soft."newAmount---".$SnewAmount."---------";
        $u1=$conn->prepare("UPDATE `laundrystock` SET `amount`='".$SnewAmount."' where `itemCode`='".$sitemcode."'");
        $u1->execute();
        
        echo $SnewAmount."---------";
    }
    else{
        $sreductNext=($samount-$soft);
        echo "samaount.......".$samount."..........".$soft."reduct next".$sreductNext;
        //reduce that amount from next detergent item number 
        //get next detergent itemnumber
        $qn2=$conn->prepare(" SELECT * FROM laundrystock where itemBatch='Softner' AND itemCode>'".$d2['itemCode']."' ORDER BY laundrystock.dateAdded ASC LIMIT 1");
        $qn2->execute();
        $dn2=$qn2->fetch(PDO::FETCH_ASSOC);
        
        $snextIt=$dn2['itemCode'];
        $sweightNU=$dn2['amount']+$reductNext;
        echo"..dn1[amount]..".$dn2['amount'];
        echo"...nextIt....".$snextIt.".....    ";
        
        echo"..weightnu....".$sweightNU;
        
        $u4=$conn->prepare("UPDATE `laundrystock` SET amount='".$sweightNU."' where itemCode='".$snextIt."'");
        $u4->execute();
    //reduce current level of given item no
        $u5=$conn->prepare("UPDATE `laundrystock` SET amount='0' where `itemCode`='".$d2['itemCode']."'");
        $u5->execute();
    }    
    


 ?>
