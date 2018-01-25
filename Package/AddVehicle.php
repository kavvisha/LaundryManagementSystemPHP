
<script type="text/javascript">
    function getFocus(){
        document.getElementById("pvnumber").focus();
    }    
    
</script>
<?php include '../inc/header.php'; ?>

<body onload="getFocus()"> 

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add a Vehicle: </h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                                    <form role="form" action="AddVehicle.php" method="post">
                                        
            <label>Vehicle Type  :</label>
                <input class="form-control" placeholder="Enter Vehicle Type" type="text" name="pvtype" required><br><br>

            <label>Vehicle Brand  :</label>
                <input class="form-control" placeholder="Enter Vehicle Brand" type="text" name="pvbrand" required><br><br>

            <label>Vehicle Number  :</label>
                <input class="form-control" placeholder="Enter Vehicle Number" type="text" name="pvnumber" required><br><br>

            <label>Vehicle Colour  :</label>
               <input class="form-control" placeholder="Enter Vehicle Colour" type="text" name="pvcolour" required><br><br>
           
            <label>Image :</label>
               <input type="file" name="pvimage" accept="image/*" id="pvimage"> <label for="fileupload"> Select a file to upload</label> <br>
    
       <br/>
       <input class = "btn btn-primary" type="submit" name="add" value="Add Vehicle" />
      
       <button class = "btn btn-primary" type="reset">Clear Entries</button>
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
        $type = $_POST['pvtype'];
        $brand = $_POST['pvbrand'];
        $num = $_POST['pvnumber'];
        $clr = $_POST['pvcolour'];
        $img = $_POST['pvimage'];

    include 'classes/Vehicle.php';
    $entry = new Vehicle();
     $entry->{"AddVehicle"}($type, $brand, $num,$clr,$img);

    }
    
?>
