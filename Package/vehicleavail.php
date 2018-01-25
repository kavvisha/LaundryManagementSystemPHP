<?php
$start_date = strtotime($start_date);
$end_date = strtotime($end_date);
$id = $_POST['vid'];
$query =  mysql_query("SELECT * FROM `vehibookings` WHERE `VehicleID`=$id AND (`start_date`>".$start_date." AND `end_date`<".$end_date.") OR (`start_date`<".$start_date." AND `end_date`>".$end_date.") OR (`start_date<".$end_date." AND `end_date`>".$end_date.") OR (`start_date`<".$start_date." AND `end_date`>".$start_date.")");

if (mysql_num_rows()>1)
{
   echo "The vehicle is available";
}

 else {
    echo "The vehicle is not available. Please try another";
}

?>