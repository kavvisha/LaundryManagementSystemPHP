<?php
class DownPayment{
    function __construct() {
       
                
    }
    
     function AddDownPayment($slip,$bank,$amt,$pdate,$acc){
      
      $q=  "INSERT INTO downpayment(SlipNo,Bank,Amount,PaymentDate,AccountNumber) VALUES(:slip,:bank,:amt,:pdate,:acc)";
        include 'co.php';
        $qry =  $conn->prepare($q);
        $results = $qry->execute(array(
            ":slip" =>$slip,
            ":bank" => $bank,
            ":amt" => $amt,
            ":pdate" =>$pdate ,
            ":acc" =>$acc 
                ));
        echo '<script>alert("Successfully Added!!!!");</script>';
         echo '<script>window.location.href ="BookPackage.php";</script>';
        exit;
    }
function viewDownPayment(){
         
        $q = "SELECT * FROM downpayment;";
        include 'co.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table = new DownPayment();
            $table->tbRows($query);
                                               
        }
        exit;
}   
        function searchDownPayment($key){
            
        $q = "SELECT * FROM downpayment WHERE DPID like '%".$key."%' OR SlipNo like '%".$key."%' OR Bank like '%".$key."%' OR Amount like '%".$key."%' OR PaymentDate like '%".$key."%' OR AccountNumber like '%".$key."%';";
        include 'co.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table2 = new DownPayment();
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
            echo '<script>alert("No Downpayment Information Available!");</script>';
        }
       }
  function editDownPayment($did,$slip,$bank,$amt,$pdate,$acc){
       
            try {
                $q = "UPDATE downpayment SET SlipNo = :slip,Bank = :bank, Amount = :amt, PaymentDate = :pdate, AccountNumber = :acc WHERE DPID = :did ";
                include 'co.php';
                $statement = $conn->prepare($q); 
                $statement->bindValue(":did", $did);
                $statement->bindValue(":slip", $slip);
                $statement->bindValue(":bank", $bank);
                $statement->bindValue(":amt", $amt);
                $statement->bindValue(":pdate", $pdate);
                $statement->bindValue(":acc", $acc);
                $count = $statement->execute();
                echo '<script>alert("Successfully Updated!!!!");</script>';
                echo '<script>window.location.href ="TableDownPayment.php";</script>';
                
               
                
            } catch (Exception $ex) {
                echo $ex;
            }
        
           
           
    }
    function deleteDownPayment($did){
       
            try {
                $q = "DELETE FROM downpayment WHERE DPID = :did";
                include 'co.php';
                $statement = $conn->prepare($q);
                $statement->bindValue("did", $did);
                $count = $statement->execute();
                echo '<script>alert("Successfully Deleted!!!!");</script>';
                echo '<script>window.location.href ="TableDownPayment.php";</script>';
               
                
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


