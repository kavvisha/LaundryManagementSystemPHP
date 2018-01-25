<?php include '../inc/header.php'; 
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
     
            <!--insert clothes-->
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Clothes</div>
                    <div class="panel-body">
                        <div class="col-ln-12">
                            <div class="well">
                           <?php 
                                 require_once '../inc/conn.php';
                      //           $jobID=$_POST['jobID'];
                                $jobID=$_GET['jobID'];
                                $jobIDde=base64_decode($jobID);
                                
                                $query = $conn->query("SELECT * FROM laundrypricelist order by itemCode"); 
                                $query2= $conn->query("SELECT * FROM laundryjob where jobID='".$jobIDde."'");
                                
                                $query2->execute();
                                while ( $data= $query2->fetch(PDO::FETCH_ASSOC)){
                                   $status=$data['jobStatus'];
                                   $weight=$data['weight'];
                                }
                                if($status!="job done" && $status!="washing"){
                                    //form
                                    echo '<form method="POST" action="addClothP.php" >';
                                        echo ' <div class="input-group" class="col-lg-4">';
                                            echo' <span class="input-group-addon"> Cloth</span>';

                                         echo'<input type="text" class="input-group"name="jobID" value='.$jobIDde.' readonly  />';
                                                echo '<select name= "cloth" ng-model="clothSelect"class="form-control" required >'; // Open your drop down box
                                                        echo '<option value="" disabled selected> Select cloth </option>';
                                                     
                                                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                                            echo '<option value="'.$row['itemName'].'">'.$row['itemName'].'</option>';
                                                        }
                                                echo '</select>';

                                                echo ' <select name ="clCount" class ="form-control" required>';
                                                echo '    <option value=" " disabled selected> Count </option>';
                                                echo '    <option value="1"> 1</option>';
                                                echo '    <option value="2"> 2</option>';
                                                echo '    <option value="3"> 3</option>';
                                                echo '    <option value="4"> 4</option>';
                                                echo '    <option value="5"> 5</option>';
                                                echo '    <option value="6"> 6</option>';
                                                echo '    <option value="7"> 7</option>';
                                                echo '    <option value="8"> 8</option>';
                                                echo '    <option value="9"> 9</option>';
                                                echo '    <option value="10">10 </option>';
                                                echo ' </select>';
                                           echo ' </div>';
                                           
                                    echo '<br>';       
                                    echo ' <input class="btn btn-default" type="submit" value="Add Next"/> ';
                                    echo ' <a href="wash.php?jobID='.$jobIDde.'&weight='.$weight.'" class="btn btn-primary">Send to wash! </a>';
                                    $error=$_GET['error'];
                                    if($error!=null){
                                        echo'<br>';
                                        echo '<div class="alert alert-danger" role alert >'.$error.'</div>';
                                    }
                                    echo ' </form> ';
                                    //echo ' <button class="btn btn-default" ><a href="toaddjob.php"></a> Thats all </button> ';     
                                    }
                                    else{
                                        //alert screen with button redirecting to add job
                                        echo"<div class='col-lg-12 col-md-6'>";
                                        echo"    <div class='panel panel-red'>";
                                        echo"        <div class='panel-heading'>";
                                        echo"            <div class='row'>";
                                        echo"                <div class='col-xs-12 text-center'>";
                                        
                                        echo"                    <div class= 'huge'>".$status."! <br>You cannot add more clothes .</div>";
                                        echo"                </div>";
                                        echo"            </div>";
                                        echo"        </div>";
                                        echo"        <a href='AddJob.php'>";
                                        echo"            <div class='panel-footer'>";
                                        echo"                <span class='pull-left'>Click here to Create a new Job</span>";
                                        echo"                <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>";
                                        echo"                <div class='clearfix'></div>";
                                        echo"            </div>";
                                        echo"        </a>";
                                        echo"    </div>";
                                        echo"</div>";
                                        
                                        
                                        
                                    }
                                ?>
                            </div>
                            
                            <div class="col-ln-8">
                                <div class="well">
                                <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> Cloth </th>
                                        <th> Count </th>
                                        <th> Date / Time Added </th>
                                        <th> Remove </th>
                                    </tr>
                                </thead> 
                                <tbody
                                     
                                    <?php
                                        
                                        require_once '../inc/conn.php';
                                      //  $jobID=$_GET['jobID'];
                                       // echo "<tr> <th>".$jobID."</th><tr>";
                                        
                                        $sql = "SELECT * FROM laundryjobclothes where jobID='".$jobIDde."'";
                                        $sq2 = "SELECT * FROM laundryjob where jobID='".$jobIDde."'";

                                        $stmt = $conn->prepare($sql);
                                        $stmt2 = $conn->prepare($sq2);
                                        $stmt->execute();
                                        $stmt2->execute();
                                        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . $data['cloth'] . "</td>";
                                        echo "<td>" . $data['cCount'] . "</td>";
                                        echo "<td>" . $data['dateCA'] . "</td>";
                                        while($data2=$stmt2->fetch(PDO::FETCH_ASSOC)){
                                           $st=$data2['jobStatus'];
                                           $w=$data2['weight'];
                                        } 
                                        if($st=="not done"){
                                        echo "<td><a href ='deleteClothes.php?dateCA=". $data['dateCA'] ."& cloth=".$data['cloth']."& count=".$data['cCount']."& jobID=".$jobIDde."' class = 'btn btn-default'> <span class='glyphicon glyphicon-remove' area-hidden='true'></span></a></td>";
                                      // echo "<th><a href = 'addCloth.php?uid=" . $data['jobID'] . "' onclick='return confirm_delete()' class = 'btn btn-danger'>Delete</a></th>";
  //                                     echo "<th><a href = 'addCloth.php?jobID=" . $data['jobID'] . "'  class = 'btn btn-default'> Add Clothes </a></th>";
                                        }
                                       echo "</tr>";
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
            <!-- calculated weight-->
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Current Weight of Job</div>
                    <div class="panel-body">
                        <div class="well">
                            <?php 
                                $pr=$conn->prepare("SELECT * from laundryprice");
                                $pr->execute();
                                while($p=$pr->fetch(PDO::FETCH_ASSOC)){
                                    $price=$p['price'];

                                }
                            
                                
                                    echo"<div class='alert alert-info'> Weight :".($w/1000)." Kg </div>";
                                    echo"<div class='alert alert-info'> Cost : Rs. ".(($w/1000)*$price)." /- </div>";
                                    
                                    //echo $data2['weight']."  ".$data2['cost'];
                                
                            ?>
                        </div>
                        
                    </div>
                    
                </div>
            </div>  
                      
       
    </div>
</div>
<?php include '../inc/footer.php'; ?>
<?php 
function startwashing(){

    
    
    
}
?>


   
