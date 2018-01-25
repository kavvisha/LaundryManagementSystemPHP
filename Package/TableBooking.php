<!DOCTYPE html>
<html>
    <head>
       
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking</title>
        
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
                    window.location.href = 'ViewBooking.php';
                   
                })
            });
            
     
        </script>
    </head>
    <body>
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
                                        <form role="form" action="TableBooking.php" method="post">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search Here" name="field">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit" name="search"><i class="glyphicon glyphicon-search"></i></button>
                                                    <button type="submit" class="btn btn-default" name="viewAll">View All</button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </form>
                                    <!-- /.col-lg-6 -->
                               
                            <br/><br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="TableBooking.php" method="post">
                                        <table class="table table-bordered table-hover" id="tb">
                                        <thead>
                                            <tr>
                                                <th>Booking ID</th>
                                                <th>Package ID</th>
                                                <th>Customer ID</th>
                                                <th>Check-In Date</th>
                                                <th>Check-Out Date</th>
                                                <th>Booked Date</th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody style="cursor: pointer;"> <?php 
                                                    if(isset($_POST['search'])){
                                                        $key = $_POST['field'];
                                                        include 'classes/Booking.php';
                                                        $entry = new Booking();
                                                       
                                                        $entry->{"searchBook"}($key);
                                                    }
                                                ?>
                                            
                                                <?php 
                                                    if(isset($_POST['viewAll'])){
                                                        require 'classes/Booking.php';
                                                        $viewBook = new Booking();
                                                        $viewBook->viewBook();
                                                    }
                                                ?>
                                            
                                                <?php
                                                  require 'classes/Booking.php';
                                                  $viewBook = new Booking();
                                                  $viewBook->viewBook();

                                                ?>
                                            
                                        </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </header>
    </body>
</html>
