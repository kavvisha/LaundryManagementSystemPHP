<?php include '../inc/header.php'; ?>
    
    <script type="text/javascript">
            function getFocus(){
                document.getElementById("sbox").focus();
            }    
    
        </script>
        
        <?php 
            $id = $_COOKIE["id"];
            
            $q = "SELECT * FROM payment WHERE paymentID =".$id.";";
            include 'dbconnect.php';
            $query = $conn->prepare($q);
            $result = $query->execute();
            if($result){
                if($query->rowCount()>0){
                    foreach ($query as $row){
                        $pid = $row['paymentID'];
                        $type = $row['paymentType'];
                        $amt = $row['amount'];
                        $date = $row['timeStamp'];
                        $rem=$row['remarks'];
                    }
                }
                else{
                    echo '<script>alert("Error!")</script>';
                }
            }
        ?>
  
</head>
<body>
    <div id="page-wrapper">
    <div class="row">
    <div class="container">
        <div class="col-lg-12">
            <form role="form" action="updatePay.php" method="POST">
    <h1>Update payment</h1><br>
    <fieldset disabled>
    <label>Payment ID</label>
    <input class="form-control" type="text" name="id" value="<?php echo htmlspecialchars($id); ?>"></fieldset><br>
    <label>Payment Type</label>
    <?php
            include 'dbconnect.php';
            $query=$conn->query("SELECT paymentName FROM paymentType");
            
            echo '<select name="selectpay" class="form-control">'
            .'<option>'; echo htmlspecialchars($type); echo '</option>';
            
            while ($row=$query->fetch(PDO::FETCH_ASSOC)){
            echo '<option value="'.$row['paymentName'].'">'.$row['paymentName'].'</option>';
        }
        echo '</select>';
        
    ?>

    <br>
    
    <label>Amount</label>
    <input class="form-control" type="text" name="am" value="<?php echo htmlspecialchars($amt); ?>"><br>
    <label>Date and Time</label>
    <input class="form-control" type="text" name="dt" value="<?php echo htmlspecialchars($date); ?>"><br>
    <label>Remarks</label>
    <input class="form-control" type="text" name="re" value="<?php echo htmlspecialchars($rem); ?>"><br>
    <input type="submit" class="btn btn-success" name="edit" value="Update">
    <input type="submit" class="btn btn-success" name="delete" value="Delete">
    <button class="btn btn-success" type="reset">Clear Entries</button><br>
           
</form>
</div>
    </div>
        </div>
    </div>
    </body>
    </html>
    <?php include '../inc/footer.php'; ?>
    <?php 
    if(isset($_POST['edit'])){
        
        
        $dname = $_POST['selectpay'];
        $amount = $_POST['am'];
        $date = $_POST['dt'];
        $remarks = $_POST['re'];
        
        
        
        
        include 'Classes/payment.php';
        $edit = new payment();
         $edit->{"updatePayment"}($id, $dname, $amount,$date,$remarks);
        //call_user_method("updatePayment", $edit, $id, $dname, $amount,$date,$remarks);
    }
    if(isset($_POST['delete'])){
 
        include 'Classes/payment.php';
        $delete = new payment();
         $delete->{"deletePayment"}($id);
       // call_user_method("deletePayment", $delete, $id);
    }
    
?>
