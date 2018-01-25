<?php
require_once '../inc/conn.php';
include'../inc/header.php';

 error_reporting(E_ERROR);
echo "<div id='page-wrapper'>";
    echo "<div id='col-sm-12'>";
    include'laundryMenu.php';

?>
                <div class="row">
                    <div class="row">
                        <div ng-app="mainApp" ng-controller="lCtrl" class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"> Add item to Landry Inventory</div>
                                    <div class="panel-body">
                                        <div class="well">
                                            <form name="addItem" method="POST" action="addInventory.php">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">Item Code</span>
                                                     <input type="text" name="itemcode"  ng-model="itemcode" class="form-control"  required/>
                                                </div>
                                                <span class="label label-warning" ng-show="addItem.itemcode.$dirty && addItem.itemcode.$invalid">
                                                        <span ng-show="addItem.itemcode.$error.required">
                                                            Item code required
                                                        </span>
                                                </span>
                                                <br>


                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">Item Name</span>
                                                     <input type="text" name="itemName"  ng-model="itemName" class="form-control"  required/>
                                                </div>
                                                <span class="label label-warning" ng-show="addItem.itemName.$dirty && addItem.itemName.$invalid">
                                                        <span ng-show="addItem.itemName.$error.required">
                                                            Item Name required
                                                        </span>
                                                </span>
                                                <br>


                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">Item Batch</span>
                                                    <select class="form-control" name="batch" ng-model="batch" required >
                                                        <option value="Detergent" >Detergent</option>
                                                        <option value="Softner" >Softner</option>
                                                    </select>


                                                <span class="label label-warning" ng-show="addItem.batch.$dirty && addItem.batch.$invalid">
                                                        <span ng-show="addItem.batch.$error.required">
                                                            Batch is required
                                                        </span>
                                                </span>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">Amount ( in Liters )</span>
                                                    <input type="number" name="itemAmount"  ng-model="itemAmount" class="form-control"  min="1" required/>
                                                </div>
                                                 <span class="label label-warning" ng-show="addItem.itemAmount.$dirty && addItem.itemAmount.$invalid">
                                                        <span ng-show="addItem.itemAmount.$error.required">
                                                            Item Name required
                                                        </span>
                                                </span>
                                                <br>
                                                <input class="btn btn-default " type="submit" name="submitItem" ng-disabled="addItem.itemName.$dirty && addItem.itemName.$invalid
                                                       || addItem.itemName.$error.required
                                                       ||addItem.batch.$dirty && addItem.batch.$invalid
                                                       || addItem.batch.$error.required
                                                       ||addItem.itemAmount.$dirty && addItem.itemAmount.$invalid
                                                       || addItem.itemAmount.$error.required

                                                       ||addItem.itemcode.$dirty && addItem.itemcode.$invalid
                                                       || addItem.itemcode.$error.required"

                                                value="Add Item ">
                                                <input class="btn btn-default" type="reset" >

                                            </form>
                                            <br>
                                            <?php

                                                  $status=$_GET['status'];
                                                if($status=="Item Added"){
                                                    echo '<div class="alert alert-success" role alert >'.$status.'</div>';
                                                }elseif($status==""){
                                                    echo '';
                                                }else{
                                                    echo '<div class="alert alert-danger" role alert >'.$status.'</div>';
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">

                            </div>
                        </div>
        
        <div class="col-sm-6">
            <div class="col-sm-12">
            <?php
            
            
            $LEVEL=$conn->query("SELECT SUM(weight) FROM laundryjob where jobStatus='not done'")  ;
            $LEVEL->execute();
            $NEXTLEVEL=$LEVEL->fetch(PDO::FETCH_ASSOC);
            $level=($NEXTLEVEL['sum(weight)'])/1000;
            
            $det=$conn->query("SELECT SUM(amount) FROM laundrystock where itembatch='Detergent'")  ;
            $det->execute();
            $DD=$det->fetch(PDO::FETCH_ASSOC);
            $sft=$conn->query("SELECT SUM(amount) FROM laundrystock where itembatch='Softner'")  ;
            $sft->execute();
            
            $detPer=($DD['SUM(amount)']/$level)*100;
            $softPer=($SF['SUM(amount)']/$level)*100;
            
            
            $SF=$sft->fetch(PDO::FETCH_ASSOC);
            if($DD['SUM(amount)']<1 AND $SF['SUM(amount)'] <1){
                echo'            <div class=" panel panel-danger">';
            }
            else {
                echo'            <div class=" panel panel-info">';
            }

            echo'                <div class="panel-heading" > Stock Level </div>';
            echo'                <div class="panel-body">';


                              if($DD['SUM(amount)']>0){
                                echo'    <h4 class="panel-warning"> Remaining Detergent Stock : '.round($DD['SUM(amount)'],2).' Liters </h4>';
                              }
                              echo'<br>';
                              if($SF['SUM(amount)']>0){
                                echo'   <h4 class="panel-warning"> Remaining Softner Stock : '.round($SF['SUM(amount)'],2).' Liters </h4>';
                              } 
                            //        echo'    <div class="progress">';
                            //        echo'       <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="'.$softPer.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$softPer.'%">';
                            //        echo'           <span class="sr-only">{{level}}% Complete</span>';
                            //        echo'        </div>';
                            //        echo'    </div> ';
            ?>
                     </div>
                </div>      
            </div>
            <br>
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Available Laundry Stock Details</div>
                        <div class="panel-body">
                            <div class="well">
                              <div class="pre-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Batch </th>
                                            <th>Added On</th>
                                            <th>Remaining Amount ( Liters )</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $stmt=$conn->prepare("SELECT * FROM `laundrystock`  WHERE  `amount`> 0 ORDER BY `dateAdded`  DESC");
                                        $stmt->execute();
                                        while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
                                            echo"<tr>";
                                                echo"<td>".$data['itemCode']."</td>";
                                                echo"<td>".$data['itemName']."</td>";
                                                echo"<td>".$data['itemBatch']."</td>";
                                                echo"<td>".$data['dateAdded']."</td>";
                                                echo"<td>".$data['amount']."</td>";
                                                
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
            $scope.itemName="";
            $scope.batch="";
            $scope.itemAmount="";
            $scope.itemAmount="";
            $scope.itemcode="";
            
        });

</script>
