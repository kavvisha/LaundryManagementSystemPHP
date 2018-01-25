<?php

$con = mysqli_connect("localhost","root","","room-booking");


        $RoomNo = $_POST["RoomNo"];
        $Image = $_POST["imgid"];
        $RoomType = $_POST["RoomType"];
        $SmokeStatus = $_POST["RSmokeSt"];
        $Description = $_POST["RDiscription"];
        $RoomSize = $_POST["Rsize"];
        $Floor = $_POST["RFloor"];
        $RRate = $_POST["RRate"];
        $Adults = $_POST["FullNoOfAdults"];
        $Children = $_POST["FullNoOfChildren"];
 try{       
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO room (RoomNo,CostPerNight,
        RoomType,NoOfAdults,NoOfChildren,Floor,Description,SmokeStatus,roomSize,roomImageID)
VALUES ('$RoomNo', '$RRate','$RoomType', '$Adults', '$Children', '$Floor', '$Description','$SmokeStatus','$RoomSize', '$Image')";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
 }
 catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


$conn = null;