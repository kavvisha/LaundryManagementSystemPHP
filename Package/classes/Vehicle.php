<?php
class Vehicle{

    function __construct() {
       
                
    }

    function AddVehicle($type,$brand, $num,$clr ,$img){

      $q=  "INSERT INTO vehicle (VehicleType ,VehicleBrand,VehicleNumber,VehicleColour,VehiclePhoto)VALUES (:type,:brand,:num,:clr,:img)";

        include 'co.php';
        $qry =  $conn->prepare($q);
        $results = $qry->execute(array(
            ":type" =>$type,
            ":brand" => $brand,
            ":num" => $num,
            ":clr" =>$clr,
            ":img" =>$img          
        ));
        echo '<script>alert("Successfully Added!!!!");</script>';
        echo '<script>window.location.href ="AddVehicle.php";</script>';
        
        exit;
    }
    
      function viewVehi(){
         
        $q = "SELECT * FROM vehicle;";
        include 'co.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table = new Vehicle();
            $table->tbRows($query);
                                               
        }
                             
        exit;
        }
    
    
    function searchVehi($key){
            
        $q = "SELECT * FROM vehicle WHERE VehicleID like '%".$key."%' OR VehicleType like '%".$key."%' OR VehicleBrand like '%".$key."%' OR VehicleNumber like '%".$key."%' OR VehicleColour like '%".$key."%' OR  VehiclePhoto like '%".$key."%';";
        include 'co.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table2 = new Vehicle();
            $table2->tbRows($query);
        }
        exit;

    }
    function tbRows($query){
  
            if($query->rowCount()>0){
            foreach ($query as $row){
                echo"<tr>
                                <td>".$row[0]."</td>
                                <td>".$row[1]."</td>
                                <td>".$row[2]."</td>
                                <td>".$row[3]."</td>
                                <td>".$row[4]."</td>
                                <td>".$row[5]."</td>
                       
                         </tr>";
            }
            }
        else{
            echo '<script>alert("No Vehicle Information Available!");</script>';
        }
       }
    
                    function editVehicle($vid,$type,$brand, $num,$clr,$img){
                       
            try {
                $q = "UPDATE vehicle SET VehicleType = :type,VehicleBrand = :brand, VehicleNumber = :num, VehicleColour = :clr, VehiclePhoto = :img WHERE VehicleID = :vid";
                include 'co.php';
                $statement = $conn->prepare($q); 
                $statement->bindValue(":vid", $vid);
                $statement->bindValue(":type", $type);
                $statement->bindValue(":brand", $brand);
                $statement->bindValue(":num", $num);
                $statement->bindValue(":clr", $clr);
                $statement->bindValue(":img", $img);
                $count = $statement->execute();
                echo '<script>alert("Successfully Updated!!!!");</script>';
                echo '<script>window.location.href ="TableVehicle.php";</script>';
                
            } catch (Exception $ex) {
                echo $ex;
            }
        
           
           
    }
    function deleteVehicle($vehiid){
       
            try {
                $q = "DELETE FROM vehicle WHERE VehicleID = :vehiid";
                include 'co.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":vehiid", $vehiid);
                $count = $statement->execute();
                echo '<script>alert("Successfully Deleted!!!");</script>';
                echo '<script>window.location.href ="TableVehicle.php";</script>';
               
                
            } catch (Exception $ex) {
                echo $ex;
            }
        
           
           
    }
    
    
}

echo '  
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
   
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
 
';
 
?>


 
 
 
 