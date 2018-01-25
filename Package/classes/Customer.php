<?php
class Customer{
    function __construct() {
       
                
    }

    function AddCustomer($name, $nic,$email ,$tel){

      $q=  "INSERT INTO  ptempcustomer (CustomerName,NIC,Email,Telephone)VALUES (:name,:nic,:email,:tel)";
        include 'co.php';
        $qry =  $conn->prepare($q);
        $results = $qry->execute(array(
            ":name" =>$name,
            ":nic" => $nic,
            ":email" => $email,
            ":tel" =>$tel        
        ));
        echo '<script>alert("Successfully Added!!!!");</script>';
        echo '<script>window.location.href ="AddCustomer.php";</script>';
        exit;
    }
function viewCust(){
         
        $q = "SELECT * FROM ptempcustomer;";
        include 'co.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table = new Customer();
            $table->tbRows($query);
                                               
        }
        exit;
           

    } 
    
    function searchCust($key){
            
        $q = "SELECT * FROM ptempcustomer WHERE TempID like '%".$key."%' OR CustomerName like '%".$key."%' OR NIC like '%".$key."%' OR Email like '%".$key."%' OR Telephone like '%".$key."%';";
        include 'co.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table2 = new Customer();
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
                        <td>0".$row[4]."</td>
                     </tr>"
                        ;
            }
            }
        else{
            echo '<script>alert("No customer Information Available!");</script>';
        }
       }
       
       
    function editCustomer($cid, $cname, $cnic, $cemail,$ctp){
       
            try {
                $q = "UPDATE ptempcustomer SET CustomerName = :cname, NIC = :cnic,  Email = :cemail, Telephone= :ctp WHERE TempID = :cid";
                include 'co.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":cname", $cname);
                $statement->bindValue(":cnic", $cnic);
                $statement->bindValue(":cemail", $cemail);
                $statement->bindValue(":ctp", $ctp);
                $statement->bindValue(":cid", $cid);
                $count = $statement->execute();
                echo '<script>alert("Successfully Updated!!!!");</script>';
                echo '<script>window.location.href ="TableCustomer.php";</script>';
               
                
            } catch (Exception $ex) {
                echo $ex;
            }
        
           
           
    }
    function deleteCustomer($cid){
       
            try {
                $q = "DELETE FROM ptempcustomer WHERE TempID = :cid";
                include 'co.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":cid", $cid);
                $count = $statement->execute();
                echo '<script>alert("Successfully Deleted!!!!");</script>';
                echo '<script>window.location.href ="TableCustomer.php";</script>';
               
                
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