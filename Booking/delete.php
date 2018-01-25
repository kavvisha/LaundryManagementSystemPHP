<?php

$con = mysqli_connect("localhost","root","","room-booking");
 $data = json_decode(file_get_contents("php://input"));  

      $CustomerID = mysqli_real_escape_string($connect, $data->CustomerID);       
      
      $btn_name = $data->btnName;  
      if($btn_name == "Delete")  
      {  
           $query ="DELETE FROM customer WHERE CustomerID='$CustomerID'";  
           if(mysqli_query($connect, $query))  
           {  
                echo "Data Deleted...";  
           }  
           else  
           {  
                echo 'Error';  
           }  
      } 