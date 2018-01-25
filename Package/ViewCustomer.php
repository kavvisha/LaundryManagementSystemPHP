<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    

    <title>Customer</title>

    <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
   

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
       <?php include '../inc/header.php'; ?>

            
        <script type="text/javascript">
            function getFocus(){
                document.getElementById("pcname").focus();
            }    
    
        </script>
        <?php 
        
            $cid = $_COOKIE["id"];
            $q = "SELECT * FROM ptempcustomer WHERE TempID=".$cid.";";
            
            include 'co.php';
            $query = $conn->prepare($q);
            $result = $query->execute();
            if($result){
                if($query->rowCount()>0){
                    foreach ($query as $row){
                        $cid = $row['TempID'];
                        $cname =$row['CustomerName'];
                        $cnic = $row['NIC'];
                        $cemail = $row['Email'];
                        $ctp = $row['Telephone'];
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
                                    <form role="form" action="ViewCustomer.php" method="post">
                                        <div class="form-group">
                                            <fieldset disabled>
                                            <label>Customer ID</label>
                                            <input class="form-control" name="cid" value="<?php echo htmlspecialchars($cid); ?>">
                                            </fieldset>
                                        </div>
                                        <div class="form-group">
                                            <label>Customer Name</label>
                                            <input class="form-control" id= "pcname" name="pcname" value="<?php echo htmlspecialchars($cname); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Customer NIC  :</label>
                                            <input type="text" class="form-control" name="pcnic" value="<?php echo htmlspecialchars($cnic); ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address :</label>
                                            <input class="form-control" name="pemail" value="<?php echo htmlspecialchars($cemail); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Telephone :</label>
                                            <input class="form-control" name="mobile" value="<?php echo htmlspecialchars('0'.$ctp); ?>">
                                        </div>
                                        <br/>
                                        <div>                                   
                                            <input class = "btn btn-primary" type="submit" name="edit" value="Update Entry" onclick="myFunction1()"/>
                                            <input class = "btn btn-primary" type="submit" name="delete" value="Delete Entry" onclick="myFunction2()"/>
                                            <button class = "btn btn-primary" type="reset">Clear Entries</button>
                                           
                                        </div>
                                    </form>
                                   
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
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>



</body>

</html>

<?php 

    if(isset($_POST['edit'])){
 
        $cname = $_POST['pcname'];
        $cnic= $_POST['pcnic'];
        $cemail = $_POST['pemail'];
        $ctp = $_POST['mobile'];
        
        include 'classes/Customer.php';
      
        $entry = new Customer();
        $entry->{"editCustomer"}( $cid, $cname, $cnic, $cemail,$ctp);
    }
    if(isset($_POST['delete'])){
 
        include 'classes/Customer.php';
        $entry = new Customer();
         $entry->{"deleteCustomer"}( $cid);
    
      
    }
    
?>
