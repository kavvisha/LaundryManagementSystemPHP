<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Package</title>

            <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
 
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

     <?php include '../inc/header.php'; ?>

        
        <script type="text/javascript">
            function getFocus(){
                document.getElementById("ptype").focus();
            }    
    
        </script>
        <?php         
            $pid = $_COOKIE["id"];
            $q = "SELECT * FROM package WHERE PackageID=".$pid.";";
            
            include 'co.php';
            $query = $conn->prepare($q);
            $result = $query->execute();
            if($result){
                if($query->rowCount()>0){
                    foreach ($query as $row){
                       
                        $pid =$row['PackageID'];
                        $ptype = $row['PackageType'];
                        $pname = $row['PackageName'];
                        $pprice = $row['Price'];
                        $pdura = $row['OfferDuration'];
                        $pelig = $row['Eligibility'];
                        $pdes = $row['Description'];
                        $pran = $row['Ran'];
                    }
                }
                else{
                    echo '<script>alert("Error!");</script>';
                }
            }

     ?>

</head>
<<div id="page-wrapper">
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
                                    <form role="form" action="ViewPackage.php" method="post">
                        
                                        <div class="form-group">
                                            <fieldset disabled>
                                            <label>Package ID</label>
                                            <input class="form-control" id= "pid" name="pid" value="<?php echo htmlspecialchars($pid); ?>">
                                            </fieldset>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Package Type  :</label>
                                            <input type="text" class="form-control" name="ptype" value="<?php echo htmlspecialchars($ptype); ?>" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Package Name :</label>
                                            <input class="form-control" name="pname" value="<?php echo htmlspecialchars($pname); ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Package Price:</label>
                                            <input class="form-control" name="pprice" value="<?php echo htmlspecialchars($pprice); ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Package Duration :</label>
                                            <input class="form-control" name="pdura" value="<?php echo htmlspecialchars($pdura); ?>">
                                        </div>
                                         <div class="form-group">
                                            <label>Eligibility :</label>
                                            <input class="form-control" name="pelig" value="<?php echo htmlspecialchars($pelig); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Package Description :</label>
                                            <input class="form-control" name="pdes" value="<?php echo htmlspecialchars($pdes); ?>">
                                        </div>
                                             
                                        <div class="form-group">
                                            <label>Random ID:</label>
                                            <input class="form-control" name="pran" value="<?php echo htmlspecialchars($pran); ?>">
                                        </div>
                                           
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
                        $ptype = $_POST['ptype'];
                        $pname = $_POST['pname'];
                        $pprice = $_POST['pprice'];
                        $pdura = $_POST['pdura'];
                        $pelig = $_POST['pelig'];
                        $pdes = $_POST['pdes'];
                        $pran = $_POST['pran'];
      
        include 'classes/Package.php';
        $entry1 = new Package();
        $entry1->{"editPackage"}($pid, $ptype, $pname,$pprice,$pdura,$pelig,$pdes,$pran);
    }
    if(isset($_POST['delete'])){
 
        include 'classes/Package.php';
        $entry2 = new Package();
       $entry2->{"deletePackage"}($pid);
    }
    
?>

  