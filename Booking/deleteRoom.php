<?php
$con = mysqli_connect("localhost","root","","room-booking");
 $data = json_decode(file_get_contents("php://input"));  

      $RoomNo =$data->RoomNo;       
      
      
           $query ="DELETE FROM room WHERE roomNo='$RoomNo'";  
           if(mysqli_query($connect, $query))  
           {  
                echo "Data Deleted...";  
           }  
           else  
           {  
                echo 'Error';  
           }  
     
