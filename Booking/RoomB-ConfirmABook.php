
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Confirm A Booking..</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <?php 
    include 'Header.php ';
 ?>
  <script src="Availability.js"></script>
     <script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
    }
</script>
                 <?php
                 
                    $CustomerID = $_POST["CID"];
                 ?>

  <script>
if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
        $('#INdate').datepicker({

        minDate: 0,
        onSelect: function(date) {
        $("#OUTdate").datepicker('option', 'minDate', date);
        }
        });
        $('#OUTdate').datepicker(
        {
        
        });
        

    })
}

</script>


</head>

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

<body ng-app="AApp" ng-controller="AvailabilityDController" ng-init="loadRoomNo()">
        <div class="container text-center">
            <h3>Confirm</h3><br>
        </div>

       
    <form class="form-horizontal"  name="NewRoom" action="AddConfirm.php" method="post">

                <div class="row">
            <div class="col-lg-6">
            <div class="form-group">

                <label class="control-label col-sm-5" for="datee">Check in date :</label>
                  <div class="col-sm-5">
                  <input type="date" id="INdate" name="check-in" class="form-control" size="20"  required/>

                </div>
            </div>
            </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-sm-5" for="datee2">Check out date :</label>
                  <div class="col-sm-5">
                  <input type="date" id="OUTdate" name="check-out" class="form-control" size="20" required />
                </div>
              </div>
        </div>
        </div>
        

             <div class="form-group">

                            <label class="control-label col-sm-5">*Guest ID :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="CustomerID" value=<?php echo $CustomerID ?> required/>

                            </div>
                        </div>       
        
        
        
        
        
                        <div class="form-group">
                            <label class="control-label col-sm-5">*Room Number :</label>
                            <div class="col-sm-3">
                                <!--<input type="text" class="form-control" name="RoomNo" ng-model="RoomNo2"  required/>-->
                                <select name="RoomNo" class="form-control" ng-model="RoomNo" ng-change="loardCap()">
                                    <option value="">Select</option>
                                    <option ng-repeat="x in RoomNos" value="{{x.RoomNo}}">{{x.RoomNo}}</option>
                                </select>
                                
                                    <span style = "color:red" ng-show = "NewRoom.RoomNo.$dirty && NewRoom.RoomNo.$invalid">
                                        <span ng-show = "NewRoom.RoomNo.$error.required ">
                                            Room Number is required.
                                        </span>
                                    </span>
                            </div>
                        </div>

                    <div class="row"> 
                    <div class="col-lg-6">      
                        <div class="form-group">
                            <label class="control-label col-sm-5">No of Adults:</label>
                            <div class="col-sm-3">
                            <!--    <input type="text" class="form-control" ng-model = "NoOfAdlts2" name="FullNoOfAdults" ng-pattern="noOnly" required/>-->
                                <input type="text" name="AdultNo" class="form-control" ng-repeat="AdultNo in cap" value="{{AdultNo.NoOfAdults}}"> {{AdultNo.NoOfAdults}}</select>
                         <!--       <select name="AdultsNo" class="form-control"  ng-model="AdultsNo">
                                 <option value="">Select</option>
                                <option ng-repeat="AdultNo in cap" value="{{AdultNo.RoomNo}}">{{AdultNo.NoOfAdults}} </option>
                                    </select>    -->
                                    <span style = "color:red" ng-show = "NewRoom.FullNoOfAdults.$dirty && NewRoom.FullNoOfAdults.$invalid">
                                       
                                            <span class="error"ng-show="NewRoom.FullNoOfAdults.$error.pattern">
                                                Invalid Input
                                                 
                                            </span>
                                        <span class="error" ng-show = "NewRoom.FullNoOfAdults.$error.required">required
                                        </span>
                                       
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label col-sm-5">No of Children:</label>
                            <div class="col-sm-3">
                             <!--   <input type="text" class="form-control" ng-model = "NoOfChildren2" name="FullNoOfChildren" ng-pattern="noOnly" required/>-->
                                <input name="ChildrenNo" class="form-control"  ng-repeat="ChildrenNo in cap" value="{{ChildrenNo.NoOfChildren}}">{{ChildrenNo.NoOfChildren}} </input>
                                
                              <!--  <select name="ChildrenNo" class="form-control" ng-model="ChildrenNo">
                                    <option value="">Select</option>
                                <option ng-repeat="ChildrenNo in cap" value="{{ChildrenNo.RoomNo}}">{{ChildrenNo.NoOfChildren}} </option>
                                </select>-->
                                    <span style = "color:red" ng-show = "NewRoom.ChildrenNo.$dirty && NewRoom.ChildrenNo.$invalid">
                                       
                                            <span class="error"ng-show="NewRoom.ChildrenNo.$error.pattern">
                                                Invalid Input
                                                 
                                            </span>
                                        <span class="error" ng-show = "NewRoom.ChildrenNo.$error.required">required
                                        </span>
                                       
                                    </span>
                            </div>
                        </div> 
                    </div>    
                    </div>

                       
                        <div class="row">
                            <div class="col-lg-7">
                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-2">
                                <input type="button" class="btn btn-primary" name="NwRoomB" value="Back"/>
                            </div>
                        </div>
                            </div>
                            <div class="col-lg-2">
                        <div class="form-group">
                            <label class="control-label col-sm-5"></label>
                            <div class="col-sm-2">
                               
                                <input type="submit" class="btn btn-success" name="NwRoomA" ng-disabled="NewRoom.RoomNo.$dirty && NewRoom.RoomNo.$invalid
                                    || NewRoom.FullNoOfAdults.$dirty && NewRoom.FullNoOfAdults.$invalid
                                    || NewRoom.FullNoOfAdults.$error.required || NewRoom.FullNoOfAdults.$error.pattern
                                    || NewRoom.FullNoOfChildren.$dirty && NewRoom.FullNoOfChildren.$invalid
                                    || NewRoom.FullNoOfChildren.$error.required || NewRoom.FullNoOfChildren.$error.pattern
                                    || NewRoom.RFloor.$dirty && NewRoom.RFloor.$invalid
                                    || NewRoom.RFloor.$error.required || NewRoom.RFloor.$error.pattern
                                    || NewRoom.Image.$error.required
                                     " value="Confirm">
                                     </input>
                                
                            </div>
                        </div>
                            </div>

                        </div>
                               </div>

    </form>

</body>

</html>