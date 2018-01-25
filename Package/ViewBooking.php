<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    

    <title>Booking</title>

    
            <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
 
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

  
        <?php include '../inc/header.php'; ?>

        <script type="text/javascript">
            function getFocus(){
                document.getElementById("pid").focus();
            }    
    
        </script>
        <?php         
            $bid = $_COOKIE["id"];
            $q = "SELECT * FROM pbooking WHERE BID=".$bid.";";
            
            include 'co.php';
            $query = $conn->prepare($q);
            $result = $query->execute();
            if($result){
                if($query->rowCount()>0){
                    foreach ($query as $row){
                        $bid = $row['BID'];
                        $pid =$row['PID'];
                        $cid = $row['CID'];
                        $idate = $row['Indate'];
                        $odate = $row['OutDate'];
                        $bdate = $row['BookedDate'];
                    }
                }
                else{
                    echo '<script>alert("Error!");</script>';
                }
            }

     ?>

</head>

<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bookings: </h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                                    <form role="form" action="ViewBooking.php" method="post">
                                        <div class="form-group">
                                            <fieldset disabled>
                                            <label>Booking ID</label>
                                            <input class="form-control" name="bid" value="<?php echo htmlspecialchars($bid); ?>">
                                            </fieldset>
                                        </div>
                                        <div class="form-group">
                                            <label>Package ID</label>
                                            <input class="form-control" id= "pid" name="pid" value="<?php echo htmlspecialchars($pid); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Customer ID  :</label>
                                            <input type="text" class="form-control" name="cid" value="<?php echo htmlspecialchars($cid); ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Checked-In Date :</label>
                                            <input class="form-control" name="idate" value="<?php echo htmlspecialchars($idate); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Checked-Out Date :</label>
                                            <input class="form-control" name="odate" value="<?php echo htmlspecialchars($odate); ?>">
                                        </div>
                                        <label>Booked Date :</label>
                                            <input class="form-control" name="bdate" value="<?php echo htmlspecialchars($bdate); ?>">
                                       
                                        <br/>
                                        <div>                                   
                                            <input class = "btn btn-primary" type="submit" name="edit" value="Update Entry" />
                                            <input class = "btn btn-primary" type="submit" name="delete" value="Delete Entry" />
                                            <button class = "btn btn-primary" type="reset">Clear Entries</button>
                                            
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

</body>

</html>

<?php 

    if(isset($_POST['edit'])){
      
        $pid= $_POST['pid'];
        $cid= $_POST['cid'];
        $idate = $_POST['idate'];
        $odate = $_POST['odate'];
        $bdate=$_POST['bdate'];
       
        include 'classes/Booking.php';
        $entry = new Booking();
        $entry->{"editBooking"}( $bid, $pid, $cid, $idate,$odate,$bdate);
       
    }
    if(isset($_POST['delete'])){
 
        include 'classes/Booking.php';
        $entry = new Booking();
        $entry->{"deleteBooking"}( $bid);
        
    }
    
?>
