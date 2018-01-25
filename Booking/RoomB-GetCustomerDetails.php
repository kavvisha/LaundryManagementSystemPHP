<?php include '../inc/header.php'; ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotel Booking-Guest..</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 

 <?php 
    include 'Header.php ';
 ?>
   <script src="RoomB-Cdetails.js"></script> 
</head>
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
<body ng-app="mainApp" ng-controller="CustomerDController">
        <div class="container text-center">
            <h3>You're almost there...</h3><br>
        </div>
       
    <form class="form-horizontal"  name="CustomerD" action="RoomB-BookRoomUn.php" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="Gtitle">*Title :</label>
                            <div class="col-sm-2">
                <select class="form-control" id="Gtitle"  name="GTitle" required>
                        <option selected disabled hidden>Select</option>
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Miss">Miss.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Lady">Lady</option>
                        <option value="Dr">Dr</option>
                        <option value="Sir">Sir</option>
                        <option value="Madam">Madam</option>
                        <option value="Engineer">Engineer</option>
                        <option value="Judge">Judge</option>
                        <option value="professor">Professor</option>
                        <option value="Major">Major</option>
                        <option value="Master">Master</option>
                        <option value="Minister">Minister</option>


                </select>

                            </div>
                </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5">*First Name :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="GFname" ng-model="firstname" required/>
                                    <span style = "color:red" ng-show = "CustomerD.GFname.$dirty && CustomerD.GFname.$invalid">
                                        <span ng-show = "CustomerD.GFname.$error.required">
                                            First Name is required.
                                        </span>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5">Middle name :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" ng-model="GMname" name="GMname"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5">*Last name :</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="GLname" ng-model="lastName" required/>
                            <span style = "color:red" ng-show = "CustomerD.GLname.$dirty && CustomerD.GLname.$invalid">
                                        <span ng-show = "CustomerD.GLname.$error.required">
                                            Last Name is required.
                                        </span>
                                    </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5">*Email address :</label>
                            <div class="col-sm-3">
                                <input type="email" class="form-control" ng-model = "email" name="Gemail" required/>
                                    <span style = "color:red" ng-show = "CustomerD.Gemail.$dirty && CustomerD.Gemail.$invalid">
                                        <span ng-show = "CustomerD.Gemail.$error.required">Email is required.</span>
                                        <span ng-show = "CustomerD.Gemail.$error.email">Invalid email address.</span>
                                    </span>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-sm-5">*Telephone number :</label>
                            <div class="col-sm-3">
                                <input type="tel" class="form-control" name="GTelno" ng-model="tel" ng-pattern="telp"  required/>
                                    <span style = "color:red" ng-show = "CustomerD.GTelno.$dirty && CustomerD.GTelno.$invalid">
                                        <span class="error" ng-show="CustomerD.GTelno.$error.required">Telephone number Required and</span>
                                        <span class="error" ng-show="CustomerD.GTelno.$error.minlength & CustomerD.GTelno.$error.pattern">Telephone number must be 10 digits.</span>     
                                    </span>
                            </div>
                        </div>
    
            <br/>
                        <div class="row">
                            <div class="col-lg-7">
                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-sm-2">
                                <a href="RoomB-Book.html">
                                <input type="button" class="btn btn-primary" name="GDetails" value="Back"/>
                                </a>
                            </div>
                        </div>
                            </div>
                            <div class="col-lg-2">
                        <div class="form-group">
                            <label class="control-label col-sm-5"></label>
                            <div class="col-sm-2">
                                <a href="RoomB-BookRoomUn.php">
                                <input type="submit" class="btn btn-success" ng-disabled = "CustomerD.GFname.$dirty && CustomerD.GFname.$invalid
                                 || CustomerD.Gemail.$dirty && CustomerD.Gemail.$invalid
                                || CustomerD.GTelno.$dirty && CustomerD.GTelno.$invalid
                                  || CustomerD.GLname.$dirty && CustomerD.GLname.$invalid
                                  ||CustomerD.GFname.$error.required||CustomerD.GLname.$error.required
                                  ||CustomerD.Gemail.$error.required
                                  ||CustomerD.Gemail.$error.email
                                  ||CustomerD.GTelno.$error.required
                                  ||CustomerD.GTelno.$error.minlength ||CustomerD.GTelno.$error.pattern"
                                  name="GDetails" value="Next"> 
                                
                            </input>
                            </a>
                                
                            </div>
                        </div>
                            </div>

                        </div>
                 </div>
    </form>
            </div>
</body>
</html>