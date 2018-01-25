<?php include '../inc/header.php'; ?>

<body onload="getFocus()"> 

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add a Downpayment: </h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                                    <form role="form" action="AddDownPayment.php" method="post">
                                       
    <label>Slip ID:  </label>
        <input class="form-control" type="text" name="sid" required/><br><br>
        
    <label>Bank:  </label>
        <input class="form-control" type="text" name="bname" required/><br><br>

    <label>Amount  :</label>
        <input class="form-control" type="text" name="pamt" required><br><br>
    
    <label>Payment Date</label>
      <?php
    $date = new DateTime();
    $timeStamp= $date->getTimestamp();
    echo "<input class='form-control' type='text' name='dt3' value=". date('Y/m/d H:i:s',$timeStamp)."><br>";
    ?>
    
    <label>Account Number  :</label>
        <input class="form-control" type="text" name="ano" required/><br><br>
        
        <input class="btn btn-primary" type="reset">
       
        <input class="btn btn-primary" type="submit" name="add" value="Save" >
        
    </form>
             </div>
            
             </div>
        </div>
          </div>
               </div>
             </div>
            </div>
   

    <!-- j Query -->
    <script src="js/jquery.min.js"></script>
   
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php 

   if(isset($_POST['add'])){
      
        $slip = $_POST['sid'];
        $bank = $_POST['bname'];
        $amt = $_POST['pamt'];
        $pdate = $_POST['dt3'];
        $acc = $_POST['ano'];
    
    include 'classes/DownPayment.php';
    $entry = new DownPayment();
    $entry->{"AddDownPayment"}($slip,$bank,$amt,$pdate,$acc);
   
    }
 
?>


