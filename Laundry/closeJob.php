<?php
require_once '../inc/conn.php';

$jobID=$_GET['jobID'];
//echo $jobID;
$date= date_create();

$sql = "UPDATE `laundryjob` SET  `jobStatus`= 'job done' , `finishedon`='".date_format($date, 'Y-m-d H:i:s')."' WHERE `laundryjob`.`jobID` ='$jobID'";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
      //  echo "Updated...!";
      //  echo '<script language="javascript">';
      //  echo 'alery(message successfully sent)';  //not showing an alert box.
     //   echo '</script>';
        
        header('Location:viewJobs.php');
    } else {
       // echo "ERROR::Updating";
    }
?>