                       
<!DOCTYPE html>
<html>
    <head>
       
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vehicle</title>
        
          <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- jQuery -->
         <script src="js/jquery.min.js"></script>
   
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>    
     <?php include '../inc/header.php'; ?>

           <script type="text/javascript">
            $(document).ready(function(){
                $('table tbody tr').click(function(){
                  
                    var str=$.trim($(this).text());
                    var id = str.split(" ",1);
                    document.cookie = "id="+id;
                    window.location.href = 'ViewVehicle.php';
                   
                })
            });
            
     
        </script>
     </head>
    <body>
        <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Vehicles </h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">

                       </div>
                        <div class="panel-body">
                                        <form role="form" action="TableVehicle.php" method="post">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search Here" name="field">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit" name="search"><i class="glyphicon glyphicon-search"></i></button>
                                                    <button type="submit" class="btn btn-default" name="viewAll">View All</button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </form>
                                    
                               
                            </div><!--row1-->
                            <br/><br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="TableVehicle.php" method="post">
                                        <table class="table table-bordered table-hover" id="tb">
                                        <thead>
                                            <tr>
                                                <th>Vehicle ID</th>
                                                <th>Vehicle Type</th>
                                                <th>Brand</th>
                                                <th>Vehicle Number</th>
                                                <th>Vehicle Colour</th>
                                                <th>Picture</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                              <tbody style="cursor: pointer;"> <?php 
                                                    if(isset($_POST['search'])){
                                                        $key = $_POST['field'];
                                                        include 'classes/Vehicle.php';
                                                        $entry = new Vehicle();
                                                        $entry->{"searchVehi"}($key);
                                                        
                                                    }
                                                ?>
                                            
                                                <?php 
                                                    if(isset($_POST['viewAll'])){
                                                        require 'classes/Vehicle.php';
                                                        $viewVehi = new Vehicle();
                                                        $viewVehi->viewVehi();
                                                    }
                                                ?>
                                            
                                                <?php
                                                  require 'classes/Vehicle.php';
                                                  $viewVehi = new Vehicle();
                                                  $viewVehi->viewVehi();

                                                ?>
                                            
                                          
                                            
                                        </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                 </div>
                </div>
        </header>
    </body>
</html>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
   

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

