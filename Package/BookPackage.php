
<script type="text/javascript">
    function getFocus(){
        document.getElementById("pid").focus();
    }    
    
</script>
</head>



    <?php include '../inc/header.php'; ?>

<body onload="getFocus()"> 

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Book Package: </h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                                    <form role="form" action="BookPackage.php" id="package" method="post">
                                        
                           
    <label>Package ID:  </label>
    <input class="form-control" type="text" placeholder="Enter packade ID" name="pid" required/><br><br>
        
    <label>Customer ID:  </label>
    <input class="form-control" type="text" placeholder="Enter customer ID" name="cid" required/><br><br>

    <label>Check-in Date  :</label>
 <?php
    $date = new DateTime();
    $timeStamp= $date->getTimestamp();
    echo "<input class='form-control' type='text' name='pidate' value=". date('Y/m/d H:i:s',$timeStamp)."><br>";
    ?>     
    <label>Check-out Date  :</label>
 <?php
    $date = new DateTime();
    $timeStamp= $date->getTimestamp();
    echo "<input class='form-control' type='text' name='podate' value=". date('Y/m/d H:i:s',$timeStamp)."><br>";
    ?>     
    <label>Date and Time</label>
      <?php
    $date = new DateTime();
    $timeStamp= $date->getTimestamp();
    echo "<input class='form-control' type='text' name='dt3' value=". date('Y/m/d H:i:s',$timeStamp)."><br>";
    ?>  
        <input class="btn btn-primary" type="reset">
        <input class="btn btn-primary" type="submit" name="add" value="Save">
      
    <a href="AddDownPayment.php"> <input class="btn btn-info" type="button" value="Next"></a>
          </form>
             </div>
           
             </div>
        </div>
          </div>
               </div>
             </div>
            </div>
   

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
   

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  

</body>

</html>

<?php 

   if(isset($_POST['add'])){
       
        $pckid = $_POST['pid'];
        $custid = $_POST['cid'];
        $idate = $_POST['pidate'];
        $odate = $_POST['podate'];
       $bdate = $_POST['dt3'];
        
       
    
    include 'classes/Booking.php';
    $entry = new Booking();
    $entry->{"AddBooking"}($pckid,$custid,$idate,$odate,$bdate);
    
    }
 
?>
