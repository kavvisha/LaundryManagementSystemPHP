<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content=""> <meta name="description" content="">
  
     
    <title>Vehicle</title>

    
            <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
 
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
   <?php include '../inc/header.php'; ?>

        
        <script type="text/javascript">
            function getFocus(){
                document.getElementById("vid").focus();
            }    
    
        </script>
        <?php         
            $vid = $_COOKIE["id"];
            $q = "SELECT * FROM vehicle WHERE VehicleID=".$vid.";";
            echo $vid;
            include 'co.php';
            $query = $conn->prepare($q);
            $result = $query->execute();
            if($result){
                if($query->rowCount()>0){
                    foreach ($query as $row){
                        $vid = $row['VehicleID'];
                        $vtype =$row['VehicleType'];
                        $vbrand = $row['VehicleBrand'];
                        $vnum = $row['VehicleNumber'];
                        $vclr = $row['VehicleColour'];
                        $vimg = $row['VehiclePhoto'];
                    }
                }
                
                else{
                    echo '<script>alert("Error!");</script>';
                }
            }
            echo $vnum;

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
                                    <form role="form" action="ViewVehicle.php" method="post">
                                        <div class="form-group">
                    <fieldset disabled>
                         <label>Vehicle ID</label>
                            <input class="form-control" name="vid" value="<?php echo htmlspecialchars($vid); ?>">
                    </fieldset>
                </div>
                
                <div>
                <label>Vehicle Type  :</label>
                <input class="form-control" name="vtype" value="<?php echo htmlspecialchars($vtype); ?>"><br><br>
                </div>
    
                <div>
                <label>Vehicle Brand  :</label>
                <input class="form-control" name="vbrand" value="<?php echo htmlspecialchars($vbrand); ?>"><br><br>
                </div>
    
                <div>
                <label>Vehicle Number  :</label>
                <input class="form-control" name="vnum" value="<?php echo htmlspecialchars($vnum); ?>"><br><br>
                </div>
    
                <div>
                <label>Vehicle Colour  :</label>
                <input class="form-control" name="vclr" value="<?php echo htmlspecialchars($vclr); ?>"><br><br>
                </div>
    
                <div>
                 <lable>Image :</lable>
                 <input class="form-control" type="text" name="vimg" id="vimg" value="<?php echo htmlspecialchars($vimg); ?>"><br>
                 </div>
    
                <div>                                   
                <input class = "btn btn-primary" type="submit" name="edit" value="Update Entry" />
                <input class = "btn btn-primary" type="submit" name="delete" value="Delete Entry"/>
                <button class = "btn btn-primary" type="reset">Clear Entries</button>
               
                </div>
         </form>
</div>
  

</body>

</html>

<?php 

    if(isset($_POST['edit'])){
      
         $vtype =$_POST['vtype'];
         $vbrand = $_POST['vbrand'];
         $vnum = $_POST['vnum'];
         $vclr = $_POST['vclr'];
         $vimg = $_POST['vimg'];
           // echo $id,$vtype,$vbrand, $vnum,$vclr,$vimg;

        include 'classes/Vehicle.php';
        $entry1 = new Vehicle();
        $entry1->{"editVehicle"}($vid, $vtype, $vbrand, $vnum,$vclr,$vimg);
    }
    if(isset($_POST['delete'])){
 
        include 'classes/Vehicle.php';
        $entry2 = new Vehicle();
        $entry2->{"deleteVehicle"}($vid);
    }
    
?>
