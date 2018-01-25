<?php include '../inc/header.php'; ?>
 
  <link rel="Stylesheet" type="text/css" href="RoomB.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="RoomB-Cdetails.js"></script>
<script src="dropzone.js"></script>
<link rel="stylesheet" href="dropzone.css">
         <?php

$imgid = (mt_rand(10, 9999999999));
?>

</head>

<body ng-app="mainApp" ng-controller="CustomerDController">
        <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
<h1 class="page-header">Add an Customer: </h1>
        </div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
       
    <form class="form-horizontal"  name="NewRoom" action="AddRoom.php" class="dropzone" method="post">

                        <div class="form-group">
                            <label class="control-label col-sm-5">*Room Number :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="RoomNo" ng-model="RoomNo"  required/>
                                    <span style = "color:red" ng-show = "NewRoom.RoomNo.$dirty && NewRoom.RoomNo.$invalid">
                                        <span ng-show = "NewRoom.RoomNo.$error.required ">
                                            Room Number is required.
                                        </span>
                                    </span>
                            </div>
                        </div>

        

        
        
        
        
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="Image">image ID:</label>
                            <div class="col-sm-6">
                               
                                <input type="text" name="imgid" class="form-control"   value="<?php echo $imgid; ?>" readonly/>   
                                      
                                       
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="Rtype">Room Type :</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="Rtype" name="RoomType" required>
                                    <option selected disabled hidden>Select</option>
                                    <option value="Single">Single</option>
                                    <option value="Deluxe">Deluxe</option>
                               </select>

                            </div>
                        </div>
                           
                        
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="RSmokeSt">Smoke status :</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="RSmokeSt" name="RSmokeSt" required>
                                    <option selected disabled hidden>Select</option>
                                    <option value=1>can</option>
                                    <option value=0>can't</option>
                                    </select>

                            </div>
                        
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5">Discription :</label>
                            <div class="col-sm-5">
                               <textarea cols="40" rows="5" name="RDiscription" class="form-control">

                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5">*Room size(sq ft):</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="Rsize" ng-model="roomsize" ng-pattern="noOnly" required/>
                            <span style = "color:red" ng-show = "NewRoom.Rsize.$dirty && NewRoom.Rsize.$invalid">
                                        <span ng-show = "NewRoom.Rsize.$error.required & NewRoom.Rsize.$error.pattern">
                                            Room size is required in square feets.
                                        </span>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5">*Room Floor :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="RFloor" ng-model="roomfloor" ng-pattern="noOnly" required/>
                            <span style = "color:red" ng-show = "NewRoom.RFloor.$dirty && NewRoom.RFloor.$invalid">
                                        <span ng-show = "NewRoom.RFloor.$error.required & NewRoom.RFloor.$error.pattern">
                                            The Floor room located is required.
                                        </span>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5">*Rate (Cost per night):</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"  name="RRate" ng-model="roomrate" ng-pattern="noOnly" required/>
                                    <span style = "color:red" ng-show = "NewRoom.RRate.$dirty && NewRoom.RRate.$invalid">
                                        <span ng-show = "NewRoom.RRate.$error.required">
                                            Rate is required.</span>
                                       <span  ng-show="NewRoom.RRate.$error.pattern">
                                           Invalid Input
                                       </span>
                                    </span>
                            </div>
                        </div>
                    <div class="row"> 
                    <div class="col-lg-5">      
                        <div class="form-group">
                            <label class="control-label col-sm-5">No of Adults:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" ng-model = "NoOfAdlts" name="FullNoOfAdults" ng-pattern="noOnly" required/>
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
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="control-label col-sm-5">No of Children:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" ng-model = "NoOfChildren" name="FullNoOfChildren" ng-pattern="noOnly" required/>
                                    <span style = "color:red" ng-show = "NewRoom.FullNoOfChildren.$dirty && NewRoom.FullNoOfChildren.$invalid">
                                       
                                            <span class="error"ng-show="NewRoom.FullNoOfChildren.$error.pattern">
                                                Invalid Input
                                                 
                                            </span>
                                        <span class="error" ng-show = "NewRoom.FullNoOfChildren.$error.required">required
                                        </span>
                                       
                                    </span>
                            </div>
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
                                <a href="RoomB-Availability.html">
                                <input type="submit" class="btn btn-success" name="NwRoomA" ng-disabled="NewRoom.RoomNo.$dirty && NewRoom.RoomNo.$invalid
                                    || NewRoom.RoomNo.$error.required
                                    || NewRoom.Rsize.$dirty && NewRoom.Rsize.$invalid
                                    || NewRoom.Rsize.$error.required || NewRoom.Rsize.$error.pattern 
                                    || NewRoom.RRate.$dirty && NewRoom.RRate.$invalid
                                    || NewRoom.RRate.$error.required || NewRoom.RRate.$error.pattern
                                    || NewRoom.FullNoOfAdults.$dirty && NewRoom.FullNoOfAdults.$invalid
                                    || NewRoom.FullNoOfAdults.$error.required || NewRoom.FullNoOfAdults.$error.pattern
                                    || NewRoom.FullNoOfChildren.$dirty && NewRoom.FullNoOfChildren.$invalid
                                    || NewRoom.FullNoOfChildren.$error.required || NewRoom.FullNoOfChildren.$error.pattern
                                    || NewRoom.RFloor.$dirty && NewRoom.RFloor.$invalid
                                    || NewRoom.RFloor.$error.required || NewRoom.RFloor.$error.pattern
                                    
                                     " value="Add">
                                     </input>
                                </a>
                            </div>
                        </div>
                            </div>

                        </div>
    </form>
    <div id="success"></div> 

    <br/>
    <span ng-hide="NewRoom.RoomNo.$dirty && NewRoom.RoomNo.$invalid
                                    || NewRoom.RoomNo.$error.required
                                    || NewRoom.Rsize.$dirty && NewRoom.Rsize.$invalid
                                    || NewRoom.Rsize.$error.required || NewRoom.Rsize.$error.pattern 
                                    || NewRoom.RRate.$dirty && NewRoom.RRate.$invalid
                                    || NewRoom.RRate.$error.required || NewRoom.RRate.$error.pattern
                                    || NewRoom.FullNoOfAdults.$dirty && NewRoom.FullNoOfAdults.$invalid
                                    || NewRoom.FullNoOfAdults.$error.required || NewRoom.FullNoOfAdults.$error.pattern
                                    || NewRoom.FullNoOfChildren.$dirty && NewRoom.FullNoOfChildren.$invalid
                                    || NewRoom.FullNoOfChildren.$error.required || NewRoom.FullNoOfChildren.$error.pattern
                                    || NewRoom.RFloor.$dirty && NewRoom.RFloor.$invalid
                                    || NewRoom.RFloor.$error.required || NewRoom.RFloor.$error.pattern">
     <form action="Iupload.php" class="dropzone" >

                    <div class="form-group">
                            <label class="control-label col-sm-3" for="Image">Image</label>
                            <div class="col-sm-4">
                          
                                <input type="text" name="imgid" class="form-control"   value="<?php echo $imgid; ?>" readonly/>

                               
                            </div>
                        </div>
     </form>  
    </span>
</body>
</html>
<script>
    $('form.ajax').on('submit', function () {

        var that = $(this),
                url = that.attr('action'),
                type = that.attr('method'),
                data = {};

        that.find('[name]').each(function (index, value) {
            var that = $(this),
                    name = that.attr('name'),
                    value = that.val();

            data[name] = value;
        });
        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function (response) {
                $("#success").html("<h3 class='alert alert-warning'>" + response + "</h3>");

                $('#success').finish().show().delay(2000).fadeOut("slow");

            }
        });
        return false;
    });
</script>
