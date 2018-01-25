<?php
 
require_once '../inc/conn.php';



$roomID = $_POST['roomID'];
$bookID = findBookingID($conn, $roomID);
$workerName = $_POST['workerName'];


if(($roomID=="? string: ?")&&($workerName=="? string: ?")){
            header('Location:AddJob.php?status=Entries are Blank');
    
}
 else {
    $sql = "INSERT INTO `laundryjob` (`bookID`, `roomID`, `worker`,`dateAdded`) VALUES ('$bookID', '$roomID', '$workerName',now())";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
     //   echo "Added";
        header('Location:AddJob.php?status=Job Added');
    }else{
      //  echo "ERROR::Adding";
      header('Location:AddJob.php?status=Failed');
    }
}

echo "Booking id ".findBookingID($conn, $roomID)." room id".$roomID." ";

function findBookingID($conn,$roomID){
    $bID=$conn->prepare("SELECT * FROM `confirmed_room_bookings` WHERE RoomID='".$roomID."' AND Paid_date='0' ");
    $bID->execute();
    $findbID=$bID->fetch(PDO::FETCH_ASSOC);
    $bookingID=$findbID['RBookID'];
   // echo"rbookid......".$bookingID;
    return $bookingID;
}
?>