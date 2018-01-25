<?php

$con = mysqli_connect("localhost","root","","room-booking");
 $data = json_decode(file_get_contents("php://input"));  

      $RoomID =$data->RoomID;       
      
    

           $query ="DELETE FROM roombookings WHERE RoomID='$RoomID'";  
           if(mysqli_query($connect, $query))  
           {  
                echo "Data Deleted...";  
           }  
           else  
           {  
                echo 'Error';  
           }  
 