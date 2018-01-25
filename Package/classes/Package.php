<?php
class Package{

    function __construct() {
        
    }

    function AddPackage($type, $name, $price,$dura,$elig,$des,$imgid){

      $q=  "INSERT INTO package(PackageType ,PackageName,Price,OfferDuration,Eligibility,Description,Ran)VALUES (:type, :name, :price,:dura,:elig,:des,:imgid)";
      
        include 'co.php';
        $qry =  $conn->prepare($q);
        $results = $qry->execute(array(
            ":type" =>$type,
            ":name" => $name,
            ":price" => $price,
            ":dura" =>$dura,
            ":elig" =>$elig ,
            ":des" =>$des ,
            ":imgid" => $imgid
        ));
        echo '<script>alert("Successfully Added!!!!");</script>';
         echo '<script>window.location.href ="TablePackage.php";</script>';
        
        exit;
    }
 
 
    function viewPack(){
        
        $q = "SELECT * FROM package;";
        include 'co.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table = new Package();
            $table->tbRows($query);
                                               
        }
                             
        exit;
           

    } 
    
    function searchPack($key){
            
        $q = "SELECT * FROM package WHERE PackageID like '%".$key."%' OR PackageType like '%".$key."%' OR PackageName like '%".$key."%' OR Price like '%".$key."%' OR OfferDuration like '%".$key."%' OR  Eligibility like '%".$key."%' OR Description like '%".$key."%' OR Ran like '%".$key."%';";
        include 'co.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table2 = new Package();
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
                                <td>".$row[6]."</td>
                                <td>".$row[7]."</td>
                         </tr>";
            }
            }
        else{
            echo '<script>alert("No Package Information Available!");</script>';
        }
       }
function editPackage ($pid,$type, $name, $price,$dura,$elig,$des,$imgid){
    
            try {
                $q = "UPDATE package SET PackageType= :type,PackageName= :name,Price= :price,OfferDuration= :dura,Eligibility= :elig,Description= :des,Ran=  :imgid WHERE PackageID= :pid";
                include 'co.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":type", $type);
                $statement->bindValue(":name", $name);
                $statement->bindValue(":price", $price);
                $statement->bindValue(":dura", $dura);
                $statement->bindValue(":elig", $elig);
                $statement->bindValue(":des", $des);
                $statement->bindValue(":imgid", $imgid);
                $statement->bindValue(":pid", $pid);
                $count = $statement->execute();
                echo '<script>alert("Successfully Updated!!!!");</script>';
                echo '<script>window.location.href ="TablePackage.php";</script>';
               
                
            } catch (Exception $ex) {
                echo $ex;
            }
        
           
           
    }
    function deletePackage($pid){
       
            try {
                $q = "DELETE FROM package WHERE PackageID = :pid";
                include 'co.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":pid", $pid);
                $count = $statement->execute();
                echo '<script>alert("Successfully Deleted!!!!");</script>';
                echo '<script>window.location.href ="TablePackage.php";</script>';
               
                
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

