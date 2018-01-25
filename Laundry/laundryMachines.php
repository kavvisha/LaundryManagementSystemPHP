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
    <div class="row">
        <div class="col-sm-6">
        <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Report Breakdown / Add Back to work </div>
                        <div class="panel-body">
                            <div class="well">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Mahine Number </th>
                                            <th>Machine Name</th>
                                            <th>Report Breakdown/Back to workability</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q1="SELECT * FROM `laundrymachines` WHERE removed=0";
                                        $stmt = $conn->prepare($q1);
                                        $stmt->execute();
                                        
                                        while($d2 =$stmt->fetch(PDO::FETCH_ASSOC)){
                                            echo"<tr>";
                                                echo"<td>".$d2['machineNo']."</td>";
                                                echo"<td>".$d2['machineModel']."</td>";
                                                if($d2['working']==1){
                                                    echo"<td><a href='machineBreakdown.php?machineNo=".$d2['machineNo']."' class='btn btn-default'> Break Down  <span class='glyphicon glyphicon-wrench aria-hidden='true'></span></a></td>";
                                                }
                                                else if($d2['working']==0){
                                                    echo"<td><a href='machineWork.php?machineNo=".$d2['machineNo']."' class='btn btn-default'> Add to work <span class='glyphicon glyphicon-thumbs-up aria-hidden='true'></span></a></td>";
                                                    
                                                }
                                                
                                            echo"</tr>";
                                            
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>
        </div>
            
        <div class="col-sm-6">
            <div class="col-sm-12">
                <div ng-app="mainApp" ng-controller="lCtrl" class="panel panel-default">
                            <div class="panel-heading">Add New Machine</div>
                            <div class="panel-body">
                                <div class="well">
                                    <form method="POST" action="addMachineP.php" name="addMachine" >

                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Machine Model</span>
                                            <input type="text" class="form-control"  name="machineModel"  ng-model="machineModel" class="form-control"  aria-describedby="basic-addon1" required >
                                        </div>
                                        <br>
                                        <span class="label label-warning" ng-show="addMachine.machineModel.$dirty && addMachine.machineModel.$invalid">
                                            <span ng-show="addMachine.machineModel.$error.required">
                                                Machine Name required
                                            </span>
                                        </span>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Capacity ( Kilograms )</span>
                                            <input type="number" class="form-control"  name="capacity"  ng-model="capacity" class="form-control"  aria-describedby="basic-addon1" min="1" required >
                                        </div>
                                        <br>
                                        <span class="label label-warning" ng-show="addMachine.capacity.$dirty && addMachine.capacity.$invalid">
                                            <span ng-show="addMachine.capacity.$error.required">
                                                Capacity required
                                            </span>
                                        </span>
                                        
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Purchase Invoice Number</span>
                                            <input type="text" class="form-control"  name="invoiceNumber"  ng-model="invoiceNumber" class="form-control"  aria-describedby="basic-addon1" required >
                                        </div>
                                       
                                        <span class="label label-warning" ng-show="addMachine.invoiceNumber.$dirty && addMachine.invoiceNumber.$invalid">
                                            <span ng-show="addMachine.invoiceNumber.$error.required">
                                               Invoice Number required
                                            </span>
                                        </span>
                                        <br>
                                        
                                        <input class="btn btn-default" type="submit" name="submitJob"  ng-disabled=" addMachine.machineModel.$dirty && addMachine.machineModel.$invalid
                                                || addMachine.machineModel.$error.required
                                                || addMachine.capacity.$dirty && addMachine.capacity.$invalid
                                                || addMachine.capacity.$error.required
                                                || addMachine.invoiceNumber.$dirty && addMachine.invoiceNumber.$invalid
                                                || addMachine.invoiceNumber.$error.required"
                                            
                                               
                                               value="Add">
                                        <input class="btn btn-default" type="reset" value="Reset">
                                    </form> 
                                </div>
                            </div>
                        </div>
            </div>

            <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Remove Machine</div>
                            <div class="panel-body">
                                <div class="well">
                                    <form name="removeMachine" method="POST" action="removeMachine.php">
                                        <select name="machineNo" class="form-control" required>
                                            <option value="0"></option>
                                            <?php 
                                                $q=$conn->query("SELECT * FROM laundrymachines where removed= '0'");
                                                $q->execute();
                                                while($d=$q->fetch(PDO::FETCH_ASSOC)){

                                                    echo'<option value="'.$d['machineNo'].'" > Machine No :'.$d['machineNo'].'---'.$d['machineModel'].'</option>';
                                                }
                                            ?>
                                        </select>
                                        <br>
                                        <input class="btn btn-default" type="submit" name="removeMachine" value="Remove Machine ">
                                    </form>
                                </div>
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
            
            $scope.machineModel="";
            $scope.capacity="";
            $scope.invoiceNumber="";
        });

</script>
