<?php

$con = mysqli_connect("localhost","root","","room-booking");


$output = array();
        $CheckIn = $_POST["check-in"];
        $CheckOut = $_POST["check-out"];
        $NoOfRooms = $_POST["NoOfRooms"]; 
        $AdultNo = $_POST["AdultNo"];
        $ChildrenNo = $_POST["ChildrenNo"];
        $NoOfRooms = $_POST["NoOfRooms"];   

$dateIn = strtotime($CheckIn);
$dateOut = strtotime($CheckOut);
        
$query ="SELECT RoomID, RoomNumbr, count( RoomNumbr ) AS TSR
FROM roombookings
WHERE RoomID NOT
IN (
(

SELECT RoomID
FROM roombookings
WHERE (
str_to_date( checkInDate, '%m/%d/%Y' ) <= '$dateIn'
AND str_to_date( checkOutDate, '%m/%d/%Y' ) >= '$dateOut'
)
OR (
str_to_date( checkInDate, '%m/%d/%Y' ) < '$dateOut'
AND str_to_date( checkOutDate, '%m/%d/%Y' ) >= '$dateOut'
)
OR (
'$dateIn' <= str_to_date( checkInDate, '%m/%d/%Y' )
AND str_to_date( checkInDate, '%m/%d/%Y' ) <= '$dateOut'
)
)
AND RoomNumbr NOT
IN (

SELECT R.RoomNumbr
FROM roombookings R, room Rm
WHERE R.RoomNumbr = Rm.RoomNo
AND RoomType = 'single'
)
)
GROUP BY (
RoomNumbr
)";
        
$res = mysqli_query($con,$query);

if(mysqli_num_rows($res) >0)
{
    while($row =mysqli_fetch_array($res))
    {
        $output[] = $row;
        
    }
    echo json_encode($output);
}
 ?>