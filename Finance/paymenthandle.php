<?php include '../inc/header.php'; ?>

  
</head>
<body>
      <div id="page-wrapper">
    <div class="row">
    <div class="container">
        <div class="col-lg-12">
            <form action="paymenthandle.php" method="post">
    <h1>Add payment</h1><br>
   
    <label>Payment Type</label>
     <?php
        include 'dbconnect.php';
        $query=$conn->query("SELECT paymentName FROM paymenttype");
    
        echo '<select name="payt" class="form-control">'
        .'<option>select paymentType</option>';
        while ($row=$query->fetch(PDO::FETCH_ASSOC)){
            echo '<option value="'.$row['paymentName'].'">'.$row['paymentName'].'</option>';
        }
        echo '</select>';
        ?>
   
    <br> 
    
    <label>Amount</label>
    <input class="form-control" type="text" name="am" required><br>
     
    <label>Date and Time</label>
     <?php
    $date = new DateTime();
    $timeStamp= $date->getTimestamp();
    
    echo "<input class='form-control' type='text' name='dt' value=". date('Y/m/d H:i:s',$timeStamp)."><br>";
    ?> 
    <label>Remarks</label>
    <input class="form-control" type="text" name="Re" required><br>
    <button class="btn btn-success" type="submit" name="add">Add</button>
    <button class="btn btn-success" type="reset">Clear Entries</button>
    <a href="viewpayment.php"><input type="button" class="btn btn-success" value="View"></a>
           
</form>
        </div>
    </div>
    </div>
    </div><!-- jQuery -->
    
    <?php include '../inc/footer.php'; ?>
    </body>
    </html>
    
    <?php
    if(isset($_POST['add'])){
        
        $paymentType=$_POST['payt'];
        $amount=$_POST['am'];
        $timeStamp=$_POST['dt'];
        $remarks=$_POST['Re'];
       
    include 'Classes/payment.php';
    $add=new payment();
    $add->{"addPayment"}($paymentType,$amount,$timeStamp,$remarks);
    //call_user_method("addPayment", $add,$paymentType,$amount,$timeStamp,$remarks);
    }
?>

        


