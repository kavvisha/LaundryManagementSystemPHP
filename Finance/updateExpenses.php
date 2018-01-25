
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hotel Management System</title>
<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css " rel="stylesheet">

       <!-- jQuery -->
    
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

    <script type="text/javascript">
            function getFocus(){
                document.getElementById("sbox").focus();
            }    
    
        </script>
    
    <?php 
            $id = $_COOKIE["id"];
            
            $q = "SELECT * FROM expenses WHERE exID =".$id.";";
            include 'dbconnect.php';
            $query = $conn->prepare($q);
            $result = $query->execute();
            if($result){
                if($query->rowCount()>0){
                    foreach ($query as $row){
                        $eid = $row['exID'];
                        $dept = $row['department'];
                        $exp= $row['expense'];
                        $amo = $row['amount'];
                        $date=$row['date'];
                        $rem=$row['remarks'];
                        
                    }
                }
                else{
                    echo '<script>alert("Error!");</script>';
                }
            }
        ?>
   
    
</head>
<body>
    <div class="row">
    <div class="container">
        <div class="col-lg-12">
            <form role="form" action="updateExpenses.php" method="post">
    <h1>Update Expenses</h1><br>
    <fieldset disabled>
    <label>Expense ID</label>
    <input class="form-control" type="text" name="id" value="<?php echo htmlspecialchars($eid);?>" required></fieldset><br>
    <label>Department</label>
   <?php
        include 'dbconnect.php';
        $query=$conn->query("SELECT deptName FROM department");
    
        echo '<select name="dept" class="form-control">'
        .'<option>';echo htmlspecialchars($dept);echo '</option>';
        while ($row=$query->fetch(PDO::FETCH_ASSOC)){
            echo '<option value="'.$row['deptName'].'">'.$row['deptName'].'</option>';
        }
        echo '</select>';
        ?>
        
    <br> 
    
    <label>Expense</label>
    <input class="form-control" type="text" name="ex" value="<?php echo htmlspecialchars($exp);?>" required><br>
    <label>Amount</label>
    <input class="form-control" type="text" name="am" value="<?php echo htmlspecialchars($amo);?>" required><br>
    <label>Date</label>
     <?php
    $date = new DateTime();
    $timeStamp= $date->getTimestamp();
    
    echo "<input class='form-control' type='text' name='dt' value=". date('Y/m/d H:i:s',$timeStamp)."><br>";
    ?>  
    <label>Remarks</label>
    <input class="form-control" type="text" name="Re" value="<?php echo htmlspecialchars($rem);?>" required><br>
    <input type="submit" class="btn btn-success" name="edit" value="Update">
    <input type="submit" class="btn btn-success" name="delete" value="Delete">
   
    
           
</form>
</div>
   
    </body>
    </html>
    
    <?php
    if(isset($_POST['edit'])){
        
        $department=$_POST['dept'];
        $expense=$_POST['ex'];
        $amount=$_POST['am'];
        $date=$_POST['dt'];
        $remarks=$_POST['Re'];
       
    include 'Classes/expenses.php';
    $add=new expenses();
    $add->{"updateExpense"}($id,$department,$expense,$amount,$date,$remarks);
    //call_user_method("updateExpense", $add,$id,$department,$expense,$amount,$date,$remarks);
    }
    
    if(isset($_POST['delete'])){
 
        include 'Classes/expenses.php';
        $deleteall = new expenses();
         $deleteall->{"deleteExpenses"}($id);
        //call_user_method("deleteExpenses", $deleteall, $id);
    }
?>

        





