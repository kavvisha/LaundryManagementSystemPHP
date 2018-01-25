<?php
$con = mysqli_connect("localhost","root","","hotel");
$output = array();


$query ="SELECT RoomNo,CostPerNight,RoomType,NoOfAdults,NoOfChildren,Floor,Description,SmokeStatus,roomSize FROM room";

$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) >0)
{
    while($row =mysqli_fetch_array($result))
    {
        $output[] = $row;
        
    }
    echo json_encode($output);
}