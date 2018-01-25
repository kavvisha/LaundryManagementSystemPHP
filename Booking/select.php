<?php
$con = mysqli_connect("localhost","root","","hotel");
//require_once 'DB.';
$output = array();

$query ="SELECT * FROM customer";

$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) >0)
{
    while($row =mysqli_fetch_array($result))
    {
        $output[] = $row;
        
    }
    echo json_encode($output);
}

