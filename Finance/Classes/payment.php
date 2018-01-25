<?php


class payment {
    private $paymentID;
    private $amount;
    public $paymentType;
    public $timeStamp;
    public $remarks;
    
    public function addPayment($paymentType,$amount,$timeStamp,$remarks)
    {
        $sql="INSERT INTO payment(paymentType,amount,timeStamp,remarks) VALUES (:paymentType,:amount,:timeStamp,:remarks)";
        include 'dbconnect.php';
        $qry=$conn->prepare($sql);
        $result=$qry->execute(array(
            ":paymentType"=>$paymentType,
            ":amount"=>$amount,
            ":timeStamp"=>$timeStamp,
            ":remarks"=>$remarks
        ));
        
        
        exit;
        
      
    }
    
    public function viewPayment()
    {
                $q="SELECT * FROM payment;";
                include 'dbconnect.php';
                $querry=$conn->prepare($q);
                $result=$querry->execute();
                    
                  if($result){
                    
                    $tableLoad=new payment();
                    $tableLoad->tableBody($querry);
                }
                
                exit;
               
    }
    
    public function searchPayment($key) {
        
        $q = "SELECT * FROM payment WHERE paymentID like '%".$key."%' OR paymentType like '%".$key."%' OR amount like '%".$key."%' OR timeStamp like '%".$key."%' OR remarks like'%".$key."';";
        include 'dbconnect.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table = new payment();
            $table->tableBody($query);
        }
        exit;
    }
    
    public function tableBody($querry) {
        
         if($querry->rowCount()>0){
                        foreach($querry as $row){
                            
                            echo "<tr>
                                <td>".$row[0]."</td>
                                <td>".$row[1]."</td>
                                <td>".$row[2]."</td>
                                <td>".$row[3]."</td>
                                <td>".$row[4]."</td>
                              </tr>";
                        }

                    }
                    else {
                        echo '<script>alert("No records found!");</script>';
                    }
                
                
            echo  ' </tbody>
            </table>';
                        }
                        
         
         
         
    public function updatePayment($id,$payType,$amount,$date,$remarks)
    {
        
        try{    
            
         $query="UPDATE payment SET paymentType= :ptype,amount= :am,timestamp= :date,remarks= :remark WHERE paymentID= :id";
         include 'dbconnect.php';
         $result= $conn->prepare($query);
         $result->bindValue(":ptype", $payType);
         $result->bindValue(":am", $amount);
         $result->bindValue(":date", $date);
         $result->bindValue(":remark", $remarks);
         $result->bindValue(":id", $id);
         $count = $result->execute();
         echo '<script>alert("Record updated successfully!!!")</script>';
         echo '<script>window.location.href="viewPayment.php";</script>';
         
         exit;
     }
     catch(Exception $ex)
     {
         echo '<script>alert("Failed!!!")</script>';
         
     }
     
        
    }
    
    public function deletePayment($id) 
    {
        try {
                $q = "DELETE FROM payment WHERE paymentID = :id";
                include 'dbconnect.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":id", $id);
                $count = $statement->execute();
                echo '<script>alert("Record deleted successfully!!!")</script>';
                echo '<script>window.location.href="viewPayment.php";</script>';
                
               
                
            } catch (Exception $ex) {
                echo '<script>alert("Failed!!!")</script>';
                echo '<script>window.location.href="viewPayment.php";</script>';
            }
        
        
    }
    
    
}
?>
