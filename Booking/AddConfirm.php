<?php
require_one("DataBase.php");

//$con = mysqli_connect("localhost","root","","room-booking");

    
    

        $CheckIn = $_POST["check-in"];
        $CheckOut = $_POST["check-out"];
        $RoomNo = $_POST["RoomNo"];
        $Adults = $_POST["AdultNo"];
        $Children= $_POST["ChildrenNo"];
        $date = date('m/d/Y');
        $Time = date('H:i:s');
        $CustomerID = $_POST['CustomerID'];
        echo "$RoomNo";
$datetime1 = strtotime($CheckIn);
$datetime2 = strtotime($CheckOut);

$secs = $datetime2 - $datetime1;// == <seconds between the two times>
$days = $secs / 86400;
echo "$days";




    $sql = "INSERT INTO roombookings (RoomID,CheckInDate,CheckOutDate,BookedDate,
        NoOfAdults,NoOfChildren,RoomNumbr,CustomerID,BookedTime)
VALUES ('','$CheckIn','$CheckOut','$date', '$Adults','$Children','$RoomNo','$CustomerID','$Time')";

    if (!mysqli_query($con,$sql)){

          
        die('Error: ' . mysqli_errno($con));
        echo 'error';
        
    }
    else{
    echo "Confirmed";
              $RoomID = mysqli_insert_id($con);
          echo $RoomID;
    }
    echo $RoomID;
    $sql2="SELECT CostPerNight from room WHERE RoomNo='$RoomNo' ";
       $cost = mysqli_query($con,$sql2);

       
       if (mysqli_num_rows($cost) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($cost)) {
        $costpnight=$row["CostPerNight"];
        echo "CostPerNight: " .$row["CostPerNight"]. "<br>";
    }
} else {
    echo "0 results";
}



       $Totalcost= $days*$costpnight;
       echo "$Totalcost";
    $sql2 ="INSERT INTO confirmed_room_bookings (RBookID,RoomID,CustomerID,Cost) VALUES('','$RoomID','$CustomerID','$Totalcost')";
     if (!mysqli_query($con,$sql2)){

          
        die('Error: ' . mysqli_errno($con));
        echo 'error';
        
    }
    else{
    echo "Confirmed table done";

    }
    mysqli_close($con);

?>