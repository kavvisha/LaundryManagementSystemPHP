<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    

    <title>Down Payment</title>

    
            <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
 
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

     <?php include '../inc/header.php'; ?>

        
        <script type="text/javascript">
            function getFocus(){
                document.getElementById("slip").focus();
            }    
    
        </script>
        <?php         
            $did = $_COOKIE["id"];
            $q = "SELECT * FROM downpayment WHERE DPID=".$did.";";
            
            include 'co.php';
            $query = $conn->prepare($q);
            $result = $query->execute();
            if($result){
                if($query->rowCount()>0){
                    foreach ($query as $row){
                        $did = $row['DPID'];
                        $slip =$row['SlipNo'];
                        $bank = $row['Bank'];
                        $amt = $row['Amount'];
                        $pdate = $row['PaymentDate'];
                        $acc = $row['AccountNumber'];
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
                                    <form role="form" action="ViewDownPayment.php" method="post">
                                        <div class="form-group">
                                            <fieldset disabled>
                                            <label>Down Payment ID</label>
                                            <input class="form-control" name="did" value="<?php echo htmlspecialchars($did); ?>">
                                            </fieldset>
                                        </div>
                                        <div class="form-group">
                                            <label>Slip Number</label>
                                            <input class="form-control" id= "slip" name="slip" value="<?php echo htmlspecialchars($slip); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Bank  :</label>
                                            <input type="text" class="form-control" name="bank" value="<?php echo htmlspecialchars($bank); ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Amount :</label>
                                            <input class="form-control" name="amt" value="<?php echo htmlspecialchars($amt); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Payment Date :</label>
                                            <input class="form-control" name="pdate" value="<?php echo htmlspecialchars($pdate); ?>">
                                        </div>
                                        <label>Account Number :</label>
                                            <input class="form-control" name="acc" value="<?php echo htmlspecialchars($acc); ?>">
                                       
                                        <br/>
                                        <div>                                   
                                            <input class = "btn btn-primary" type="submit" name="edit" value="Update Entry"/>
                                            <input class = "btn btn-primary" type="submit" name="delete" value="Delete Entry" />
                                            <button class = "btn btn-primary" type="reset">Clear Entries</button>
                                           
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                
                            </div>
                           
                        </div>
                        
                    </div>
                   
                </div>
                
            </div>

</body>

</html>

<?php 

    if(isset($_POST['edit'])){
        
        $did = $row['DPID'];
                        $slip =$_POST['slip'];
                        $bank = $_POST['bank'];
                        $amt = $_POST['amt'];
                        $pdate = $_POST['pdate'];
                        $acc = $_POST['acc'];
     
       
        include 'classes/DownPayment.php';
        $entry1 = new DownPayment();
        $entry1->{"editDownPayment"}($did, $slip, $bank, $amt,$pdate,$acc);
    }
    if(isset($_POST['delete'])){
 
        include 'classes/DownPayment.php';
        $entry2 = new DownPayment();
        $entry2->{"deleteDownPayment"}($did);
    }
    
?>
