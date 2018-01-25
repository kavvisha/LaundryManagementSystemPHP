

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotel Booking-Room available info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <?php 
    include 'Header.php ';
 ?>
  <script src="Availability.js"></script> 
  <?php

require_once 'DataBase.php';

$output = array();
        $CheckIn = $_POST["check-in"];
        $CheckOut = $_POST["check-out"];
        $NoOfRooms = $_POST["NoOfRooms"]; 
        $AdultNo = $_POST["AdultNo"];
        $ChildrenNo = $_POST["ChildrenNo"];
        $NoOfRooms = $_POST["NoOfRooms"];   

$dateIn = strtotime($CheckIn);
$dateOut = strtotime($CheckOut);
        
$query ="SELECT RoomID, RoomNumbr, count( RoomNumbr ) AS TSR
FROM roombookings
WHERE RoomID NOT
IN (
(

SELECT RoomID
FROM roombookings
WHERE (
str_to_date( checkInDate, '%m/%d/%Y' ) <= '$dateIn'
AND str_to_date( checkOutDate, '%m/%d/%Y' ) >= '$dateOut'
)
OR (
str_to_date( checkInDate, '%m/%d/%Y' ) < '$dateOut'
AND str_to_date( checkOutDate, '%m/%d/%Y' ) >= '$dateOut'
)
OR (
'$dateIn' <= str_to_date( checkInDate, '%m/%d/%Y' )
AND str_to_date( checkInDate, '%m/%d/%Y' ) <= '$dateOut'
)
)
AND RoomNumbr NOT
IN (

SELECT R.RoomNumbr
FROM roombookings R, room Rm
WHERE R.RoomNumbr = Rm.RoomNo
AND RoomType ='single'
)
)
GROUP BY (
RoomNumbr
)";
        
$res = mysqli_query($con,$query);

if(mysqli_num_rows($res) >0)
{
    while($row =mysqli_fetch_array($res))
    {
        $output[] = $row;
        
    }
    echo json_encode($output);
}
 ?>


</head>
<body>
    <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
<h1 class="page-header">Add an Employee: </h1>
        </div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
    <div ng-app="AApp" ng-controller="AvailabilityDController" ng-init="displayAvailability()">
        <div class="container text-center">
            <h3>Book Rooms in ..</h3><br>
        </div>
    <form class="form-horizontal">
             <div class="row">
                <div class="col-lg-6" >
                    <div class="well well-sm">
                        <h4>Deluxe Rooms</h4>
                        <div class="well well-sm">
                         <img src="https://mediastream.jumeirah.com/webimage/heroactual//globalassets/global/hotels-and-resorts/dubai/burj-al-arab/rooms/deluxe-king-two-bedroom-suite/burj-al-arab-deluxe-king-two-bedroom-suite-04-hero.jpg" alt="Image" class="img-rounded"  width="350" height="236">
                        </div>
                         <p></p>

                    </div>
                </div>
                
        
            
                <div class="col-lg-6">
                    <div class="well well-sm">
                        <h4>Single Rooms</h4>
                        <div class="well well-sm">
                        <img src="http://www.puredestinations.co.uk/wp-content/uploads/2016/05/burj-al-arab-deluxe-one-bedroom-suite-view.jpg" alt="Image" class="img-rounded"  width="350" height="236">
                        </div>
                        <table> 
                            
                          
                            <tbody>
                     <tr ng-repeat="x in RAvailablitySingle"> 
                             
                                <td>{{x.RoomNumbr}}</td>
                     </tr>

                        </tbody>
                        </table>

                    </div>
                </div>
               
                </div>

                      
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label col-sm-7" for="NoOfDeluxeRms">No Of Deluxe Rooms :</label>
                    <div class="col-sm-3">
                                <select class="form-control" id="NoOfDeluxeRms"  name="NoOfDeluxeRms" required>
                                     <option>1</option>


                                </select>
                    </div>
                </div>
            </div> 
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label col-sm-7" for="NoOfSingleRms">No Of Single Rooms :</label>
                    <div class="col-sm-3">
                                <select class="form-control" id="NoOfSingleRms"  name="NoOfSingleRms" required>
                                     <option>1</option>


                                </select>
                    </div>
                </div>
            </div>   
        </div>
        <div class="row">
                <div class="col-lg-7">
                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                        
                            <div class="col-sm-2">
                                    <a href="RoomB-Availability.php">
                                <input type="button" class="btn btn-primary" name="RomBback" value="Back"/>
                                   </a>
                            </div>
                          
                        </div>
                            </div>
                            <div class="col-lg-2">
                        <div class="form-group">
                            <label class="control-label col-sm-5"></label>
                            <div class="col-sm-2">
                                <a href="RoomB-GetCustomerDetails.php">
                                <input type="button" class="btn btn-success" name="RomBook" value="Next"/>
                                </a>
                            </div>
                        </div>
                    </div>

        </div>       
            
       
    </form>

        
                                    <div class="col-lg-16">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Availability details
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                          
                                            <th>Select</th>
                                         
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr name="Row1"  ng-repeat="x in RAvailablitySingle">
                                                 
                                                 <td>{{x.RoomNumbr}}</td>
                                          
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
    
    
 
    
  
    
    
    
    
    
    
    
</div>                  
                    </div>

    </div>   
            </div>
</body>
</html>