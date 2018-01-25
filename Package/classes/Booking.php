<?php
class Booking{
    function __construct() {
       
                
    }

    function AddBooking($pckid,$custid,$idate,$odate,$bdate){
        
      $q=  "INSERT INTO pbooking(PID,CID,Indate,Outdate,BookedDate) VALUES(:pckid,:custid,:idate,:odate,:bdate)";
        include 'co.php';
        $qry =  $conn->prepare($q);
        $results = $qry->execute(array(
            ":pckid" =>$pckid,
            ":custid" => $custid,
            ":idate" => $idate,
            ":odate" =>$odate ,
            ":bdate" =>$bdate 
                ));
        echo '<script>alert("Successfully Added!!!!");</script>';
        echo '<script>window.location.href ="AddDownPayment.php";</script>';
        exit;
    }
function viewBook(){
         
        $q = "SELECT * FROM pbooking;";
        include 'co.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table = new Booking();
            $table->tbRows($query);
                                               
        }
        exit;
           

    } 
    
    function searchBook($key){
            
        $q = "SELECT * FROM pbooking WHERE BID like '%".$key."%' OR PID like '%".$key."%' OR CID like '%".$key."%' OR Indate like '%".$key."%' OR Outdate like '%".$key."%' OR BookedDate like '%".$key."%';";
        include 'co.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if($result){
            $table2 = new Booking();
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
            echo '<script>alert("No Booking Information Available!");</script>';
        }
       }
    function editBooking($bid,$pckid,$custid,$idate,$odate,$bdate){
        
            try {
                $q = "UPDATE pbooking SET PID = :pckid,CID = :custid, Indate = :idate, Outdate = :odate, BookedDate = :bdate WHERE BID = :bid";
                include 'co.php';
                $statement = $conn->prepare($q); 
                $statement->bindValue(":pckid", $pckid);
                $statement->bindValue(":custid", $custid);
                $statement->bindValue(":idate", $idate);
                $statement->bindValue(":odate", $odate);
                $statement->bindValue(":bdate", $bdate);
                $statement->bindValue(":bid", $bid);
                $count = $statement->execute();
                echo '<script>alert(" Updated!!!!");</script>';
               header("Location: TableBooking.php");
               
            } catch (Exception $ex) {
                echo $ex;
            }
        
           
           
    }
    function deleteBooking($bid){
       
            try {
                $q = "DELETE FROM pbooking WHERE BID = :bid";
                include 'co.php';
                $statement = $conn->prepare($q);
                $statement->bindValue(":bid", $bid);
                $count = $statement->execute();
                echo '<script>alert("Successfully Deleted!!!!");</script>';
                echo '<script>window.location.href ="TableBooking.php";</script>';
                
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


