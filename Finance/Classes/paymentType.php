<?php


class paymentType {
    
    private $paymentID;
    public $paymentName;
    
    public function addPaymentType($paymentName)
    {
       
        
        $sql="INSERT INTO paymenttype(paymentName) VALUES (:paymentName)";
        
        include 'dbconnect.php';
        $qry=$conn->prepare($sql);
        $result=$qry->execute(array(
        ":paymentName"=>$paymentName
                
                
         ));
       
        echo '<script>window.location.href="payments.php";</script>';
        exit;
        
    }
    
    public function viewPaymentType()
    {
        
        echo '<table class="table table-bordered">
               <thead>
                <tr>
                    <th>PaymentID</th>
                    <th>Payment Type</th>
                    
                </tr>
               </thead>
               <tbody style="cursor: pointer;">';
        
                $q="SELECT * FROM paymenttype;";
                include 'dbconnect.php';
                $querry=$conn->prepare($q);
                $result=$querry->execute();
                    if($querry->rowCount()>0){
                        foreach($querry as $row){

                        echo "<tr>
                                <td>".$row[0]."</td>
                                <td>".$row[1]."</td>
                               
                            </tr>";
                        }

                    }
                    else {
                        echo "<script>alert('No records found....')</script>";
                    }
                
             echo  '</tbody>
     </table>';
    }
    Public function updatePaymentType($pid,$payName)
    {
      try{
         $query="UPDATE paymenttype SET paymentName= :pname WHERE payTypeID=:id";
         include 'dbconnect.php';
         $result= $conn->prepare($query);
         $result->bindValue(":pname", $payName);
         $result->bindValue(":id", $pid);
         $count = $result->execute();
         echo '<script>alert("Record updated successfully!!!")</script>';
         echo '<script>window.location.href="payments.php";</script>';
         
         exit;
     }
     catch(Exception $ex)
     {
         echo '<script>alert("Failed!!!")</script>';
         
     }
       
    }
    
    public function deletePaymentType($id)
    {
        try {
                $q = "DELETE FROM paymenttype WHERE payTypeID = :id";
                include 'dbconnect.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":id", $id);
                $count = $statement->execute();
                echo '<script>alert("Record deleted successfully!!!")</script>';
                echo '<script>window.location.href="payments.php";</script>';
                
               
                
            } catch (Exception $ex) {
                
                echo '<script>alert("Failed!!!")</script>';
                echo '<script>window.location.href="payments.php";</script>';
            }
        
        
    }
}
?>
