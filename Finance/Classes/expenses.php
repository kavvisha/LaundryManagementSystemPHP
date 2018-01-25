<?php


class expenses {
  
        function addExpenses($department,$expense,$amount,$date,$remark)
        {
        
        
        include 'dbconnect.php';
        
        $sql="INSERT INTO expenses(department,expense,amount,date,remarks) VALUES(:department,:expenses,:amount,:date,:remark)";
        include 'dbconnect.php';
        $qry=$conn->prepare($sql);
        $result=$qry->execute(array(
            ":department"=>$department,
            ":expenses"=>$expense,
            ":amount"=>$amount,
            ":date"=>$date,
            ":remark"=>$remark
        ));
        echo '<script>alert("Record added successfully!!!")</script>';
        echo '<script>window.location.href="insertExpenses.php";</script>';
        exit;
        }
        
        function viewExpenses()
        {
            
                $q="SELECT * FROM expenses;";
                include 'dbconnect.php';
                $querry=$conn->prepare($q);
                $result=$querry->execute();
                   
                if($result){
                    
                    $tableLoad=new expenses();
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
                                <td>".$row[5]."</td>
                                                               
                            </tr>";
                        }

                    }
                    else {
                        echo '<script>alert("No records found!!")</script>';
                    }
                
                
            echo  ' </tbody>
            </table>';
    }
    
    public function searchExpenses($key)
    {
        $q = "SELECT * FROM expenses WHERE exID like '%".$key."%' OR department like '%".$key."%' OR expense like '%".$key."%' OR amount like '%".$key."%' OR date like'%".$key."%' OR remarks like'%".$key."%';";
        include 'dbconnect.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table = new expenses ();
            $table->tableBody($query);
        }
        exit;
 
       
    }
    
      public function updateExpense($id,$dept,$expense,$amount,$date,$remarks) 
    {
     try{
         $query="UPDATE expenses SET department= :dname,expense= :ex,amount= :am,date= :dt, remarks= :rm WHERE exID= :id";
         include 'dbconnect.php';
         $result= $conn->prepare($query);
         $result->bindValue(":dname", $dept);
         $result->bindValue(":ex", $expense);
         $result->bindValue(":am", $amount);
         $result->bindValue(":dt", $date);
         $result->bindValue(":rm", $remarks);
         $result->bindValue(":id", $id);
         $count = $result->execute();
         echo '<script>alert("Record updated successfully!!!")</script>';
         echo '<script>window.location.href="viewExpenses.php";</script>';
         
         exit;
     }
     catch(Exception $ex)
     {
         echo '<script>alert("Failed!!!")</script>';
         
     }
       
     
    }
    
    public function deleteExpenses($id) 
    {
       
        try {
                $q = "DELETE FROM expenses WHERE exID = :id";
                include 'dbconnect.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":id", $id);
                $count = $statement->execute();
                echo '<script>alert("Record deleted successfully!!!")</script>';
                 echo '<script>window.location.href="viewExpenses.php";</script>';
                
               
                
            } catch (Exception $ex) {
                echo '<script>alert("Failed!!!")</script>';
                echo '<script>window.location.href="viewExpenses.php";</script>';
            }
  
    
    }
 }
?>
