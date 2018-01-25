<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body style="background-color:#EFF1F1;">   

<div class="page-header" >
  <h1 style="color:#747475; text-align:center; font-family:verdana; font-size:300%">Check Vehicle Availability </h1>
</div>

<div class="row">
	<div class="container">
	<div class="col-md-4">
            <form action="vehicleavail.php" method="POST">

      <label>Vehicle ID  :</label>
      <input class="form-control" placeholder="Enter Vehicle ID" type="text" name="vid" required><br><br>

     <label>Date   :</label>
     <input class="form-control" type="date" name="pdate1" required><br><br>
    <label>Date   :</label>
        <input class="form-control" type="date" name="pdate2" required><br><br>
   
        
         <div class="col-sm-2">
             <a href="http://localhost/package/pages/vehiavai.php">
             <input class="btn btn-success" name="check" value="Check Availability">
             </a>
        </div>
     </form>   
 <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script> 
        </div>
        </div>
</div>
</body>

</html>