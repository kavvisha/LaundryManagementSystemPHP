<?php include '../inc/header.php'; 
 require_once '../inc/conn.php';
 error_reporting(E_ERROR);
?>
<div id="page-wrapper">
      <?php 
        
        include 'laundryMenu.php'; 
        error_reporting(E_ERROR);
    ?>
    <div class="row">
        
        <div class="col-lg-12">
                              
        </div>
        
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Add a Laundry Job</div>
                    <div class="panel-body">
                    <div class="well">    
                        <h2>Add Job </h2>
                        <div ng-app="mainApp" ng-controller="lCtrl" "class="col-ln-12">
                            
                            <form name="addJob" method="POST" action="addJobP.php" >
                                <!--
                                <div id="bookID">
                                    <label>booking ID</label>
                                    <input type="text" name="bookID"  ng-model="bookID" class="form-control"  required/>
                                    <span class="label label-warning" ng-show = "addJob.bookID.$dirty && addJob.bookID.$invalid">
                                        <span ng-show="addJob.bookID.$error.required">
                                            Book ID is required.
                                        </span>
                                    </span>
                                </div> -->
                                <div id="roomID">
                                    <label>Room Number :</label>
                                  <!--  <input type="number" min="0" name="roomID" ng-model="roomID" class="form-control" required/>-->
                                    <select name="roomID" ng-model="roomID" class="form-control" required/>
                                    <option value="0" ></option>
                                    <?php
                                      
                                       $RD=$conn->query("SELECT * FROM `confirmed_room_bookings` where `Paid_date`='0' ");
                                       $RD->execute();
                                       while($rdDATA=$RD->fetch(PDO::FETCH_ASSOC)){
                                           echo'<option value="'.$rdDATA['RoomID'].'" placeholder=" Select from available washers">'.$rdDATA['RoomID'].'</option>';
                                           
                                       }
                                   
                                   ?>
                                    </select>
                                    
                                    
                                    <span class="label label-warning" ng-show="addJob.roomID.$dirty && addJob.roomID.$invalid">
                                        <span ng-show="addJob.roomID.$error.required">
                                            Room ID is required.
                                        </span>
                                    </span>
                                    
                                </div>
                                <div id="workerName">
                                    <label>Washer Name :</label>
                                  <!--  <input type="text" name="workerName" ng-model="workerName" class="form-control" placeholder="replace this with a dropdown"required/>
                                    -->
                                    <select name="workerName" ng-model="workerName" class="form-control" required/>
                                    <option value="0" ></option>
                                        <?php
                                      
                                       $q=$conn->query("SELECT * FROM employee where DivisionID = 6");
                                       $q->execute();
                                       while($data=$q->fetch(PDO::FETCH_ASSOC)){
                                           echo'<option value="'.$data['EmpName'].'" placeholder=" Select from available washers">'.$data['EmpName'].'</option>';
                                           
                                       }
                                   
                                   ?>
                                    </select>
                                        <span class="label label-warning" ng-show = "addJob.workerName.$dirty && addJob.workerName.$invalid">
                                        <span ng-show="addJob.workerName.$error.required">
                                            Worker Name is required.
                                        </span>
                                    </span>
                                </div>
                                
                                <br>
                                <input class="btn btn-default" type="submit" name="submitJob" ng-disabled="
                                       ||addJob.roomID.$dirty && addJob.roomID.$invalid
                                       || addJob.roomID.$error.required
                                       ||addJob.workerName.$dirty && addJob.workerName.$invalid
                                       || addJob.workerName.$error.required"
                                       
                                       value="Add">
                                <input class="btn btn-default" type="reset" value="Reset">
                                <br>
                                <?php
                                $status=$_GET['status'];
                                if($status!=NULL){
                                    echo '<div class="alert alert-success" role alert >'.$status.'</div>';
                                }elseif($status=="Failed"){
                                    echo '<div class="alert alert-danger" role alert >'.$status.'</div>';
                                }
                                ?>
                                
                            </form>
                        </div>
                        <div id="success"></div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include '../inc/footer.php'; ?>

<script>
    var mainApp = angular.module("mainApp",[]);
        mainApp.controller('lCtrl',function($scope){
           
            $scope.roomID="";
            $scope.workerName="";
            
        });

</script>


   
