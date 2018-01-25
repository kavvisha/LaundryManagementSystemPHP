<?php 

class allocation {
    private $allocationID;
    public $deptName;
    private $amount;
    public $receiverName;
    public $timeStamp;
    
    
    
    public function addNewAllocation($deptName,$amount,$receiverName,$timeStamp)
    {
        
        
        $sql="INSERT INTO moneyallocation (deptName,amount,receiveName,timeStamp)VALUES (:deptName,:amount,:receiverName,:timeStamp)";
        include 'dbconnect.php';
        $qry=$conn->prepare($sql);
        $result=$qry->execute(array(
            ":deptName"=>$deptName,
            ":amount"=>$amount,
            ":receiverName"=>$receiverName,
            ":timeStamp"=>$timeStamp
        ));
        echo '<script>alert("Record inserted successfully!!!")</script>';
        
        echo '<script>window.location.href="allocate.php";</script>';
        exit;
    }
    
    public function viewAllocation()
    {
        
                $q="SELECT * FROM moneyallocation;";
                include 'dbconnect.php';
                $querry=$conn->prepare($q);
                $result=$querry->execute();
                   
                if($result){
                    
                    $tableLoad=new allocation();
                    $tableLoad->tableBody($querry);
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
                        echo '<script>alert("No records found!!")</script>';
                    }
                
                
            echo  ' </tbody>
            </table>';
    }
    
  
    
    public function searchAllocation($key)
    {
        $q = "SELECT * FROM moneyallocation WHERE allocationID like '%".$key."%' OR deptName like '%".$key."%' OR amount like '%".$key."%' OR receiveName like '%".$key."%' OR timeStamp like'%".$key."';";
        include 'dbconnect.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table = new allocation ();
            $table->tableBody($query);
        }
        exit;
 
       
    }
    
    
    
    public function updateAllocation($aid,$adept,$eamount,$areceiver,$adate) 
    {
     try{
         $query="UPDATE moneyallocation SET deptName= :dname,amount= :am,receiveName= :rname,timeStamp= :time WHERE allocationID= :id";
         include 'dbconnect.php';
         $result= $conn->prepare($query);
         $result->bindValue(":dname", $adept);
         $result->bindValue(":am", $eamount);
         $result->bindValue(":rname", $areceiver);
         $result->bindValue(":time", $adate);
         $result->bindValue(":id", $aid);
         $count = $result->execute();
         echo '<script>alert("Record updated successfully!!!")</script>';
         echo '<script>window.location.href="viewallocation.php";</script>';
         
         exit;
     }
     catch(Exception $ex)
     {
         echo '<script>alert("Failed!!!")</script>';
         
     }
       
     
    }
    
    public function deleteAllocation($aid) 
    {
       
        try {
                $q = "DELETE FROM moneyallocation WHERE allocationID = :id";
                include 'dbconnect.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":id", $aid);
                $count = $statement->execute();
                echo '<script>alert("Record deleted successfully!!!")</script>';
                echo '<script>window.location.href="viewallocation.php";</script>';
               
                
            } catch (Exception $ex) {
                echo '<script>alert("Failed!!!")</script>';
               
            }
        
    }
    
    
   
}
?>
