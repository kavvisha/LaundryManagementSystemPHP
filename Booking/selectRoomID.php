<?php

require_once 'DataBase.php';
//require_once 'DB.';
$output = array();

$query ="SELECT RoomNo FROM room";

$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) >0)
{
    while($row =mysqli_fetch_array($result))
    {
        $output[] = $row;
        
    }
    echo json_encode($output);
}
