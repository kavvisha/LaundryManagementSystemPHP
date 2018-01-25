<?php
 
require_once '../inc/conn.php';
$cloth = $_POST['cloth'];
$jobID = $_POST['jobID'];
$clothCount = $_POST['clCount'];

$sql2=$conn->query("SELECT * FROM laundrypricelist where itemName='".$cloth."' LIMIT 1");

$sql2->execute();
while ( $data= $sql2->fetch(PDO::FETCH_ASSOC)){
    $weight=$data['weight']*$clothCount;
}

//echo $cloth;
//echo "   ".$jobID." ";
//echo $clothCount;


if (empty($cloth) &&  empty($cCount)){
  //  echo "Fill all the fields!";
    // echo"<script type=\"text/javascript\"> alert('Meximum amount of clothes per job Reached , Please create a new Job ') </script>";
} 
else {
    
     $sql4=$conn->query("SELECT * FROM laundryjob where jobID='".$jobID."'LIMIT 1");

        $sql4->execute();
        while ( $data4= $sql4->fetch(PDO::FETCH_ASSOC)){
            $weight2=$data4['weight']+$weight;
        }
        
    
    
            // $sql = "INSERT INTO `laundryJobClothes` (`jobID`, `cloth`, `cCount`) VALUES ('$jobID', '$cloth', '$clothCount')";
            $sql = "INSERT INTO `laundryjobclothes` (`jobID`, `cloth`, `cCount`) VALUES ('$jobID', '$cloth', '$clothCount')";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute()) {
      //          echo "Added";
        //       echo $weight;
                $jobIDen=base64_encode($jobID);
                $pr=$conn->prepare("SELECT * from laundryprice");
                $pr->execute();
                while($p=$pr->fetch(PDO::FETCH_ASSOC)){
                    $price=$p['price'];

                }



                $cost=($weight2/1000)*$price;        
                $sql3 = "UPDATE `laundryjob` SET `weight`='".$weight2."' ,cost=".$cost." WHERE `jobID` ='".$jobID."'";
                $stmt3 = $conn->prepare($sql3);
                if ($stmt3->execute()) {
          //          echo "Updated...!";   
            //        echo $weight;
                } else {
                    echo "ERROR::Updating";
                }

            //   header("Location:addCloth.php ? jobID=$jobIDen");
            }else{
              //  echo "ERROR::Adding";
            }
       
//            echo"<script type=\"text/javascript\"> alert('Meximum amount of clothes per job Reached , Please create a new Job ') </script>";
            $jobIDen=base64_encode($jobID);
            header("Location:addCloth.php?jobID=$jobIDen");
       
}
?>

