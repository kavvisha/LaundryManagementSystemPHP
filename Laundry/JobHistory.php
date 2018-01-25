<?php include '../inc/header.php'; 

require_once '../inc/conn.php';

$sql = "SELECT * FROM `laundryjob` ORDER BY `laundryjob`.`jobID` DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<script>
    function confirm_delete() {
        return confirm('Are you sure?');
    }

</script>
<div id="page-wrapper">
       <div class="row" >
          
     <?php 
        include 'laundryMenu.php'; 
        error_reporting(E_ERROR);
    ?>
    
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> View Job History</div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="well">
                                <div class="pre-scrollable">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> Room ID </th>
                                        <th> Job ID </th>
                                        <th> Worker </th>
                                        <th> Date Added</th>
                                        <th> Finished on</th>
                                        <th> Job Status </th>
                                        <th> Job Details </th>
                                        <th> Print Invoice </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=0;
                                    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    if($i%2==0){
                                        echo "<tr style='background:#cbcbcb;'>";
                                    }
                                    else{
                                        echo "<tr style='background:#FFFFFF;'>";
                                    }
                                        //echo "<tr>";
                                        echo "<td>" . $data['roomID'] . "</td>";
                                        echo "<td>" . $data['jobID']. "</td>";
                                        echo "<td>" . $data['worker'] . "</td>";
                                        echo "<td>" . $data['dateAdded'] . "</td>";
                                        echo "<td>" . $data['finishedon'] . "</td>";
                                        
                                        if($data['jobStatus']=="not done"){
                                            echo "<td class='alert alert-danger'>" . $data['jobStatus'] . "</td>";
                                        }
                                        else{
                                            echo "<td >" . $data['jobStatus'] . "</td>";
                                        }
                                        $jobIDen=base64_encode($data['jobID']);
                                       //echo "<td><a href ='closeJob.php?jobID=". $data['jobID'] ."' class = 'btn btn-default'> Finish Job </a></td>";
                                      // echo "<th><a href = 'addCloth.php?uid=" . $data['jobID'] . "' onclick='return confirm_delete()' class = 'btn btn-danger'>Delete</a></th>";
                                       echo "<th><a href = 'addCloth.php?jobID=" . $jobIDen . "'  class = 'btn btn-default'> Veiw  </a></th>";
                                       
                                      // $link="<script>window.open('printInvoice.php?jobID=".$jobIDen."')</script>";
                                      echo "<th><a target='_blank' href = 'printInvoice.php?jobID=" . $jobIDen ."'class = 'btn btn-default'> Print </a></th>";
                 
                                       echo "</tr>";
                                       $i++;
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
<?php include '../inc/footer.php'; ?>
<script>

    function checkAvailability() {
        $("#checking").show();
        jQuery.ajax({
            url: "checkusername.php",
            data: 'uname=' + $("#uname").val(),
            type: "POST",
            success: function (data) {
                $("#user-availability-status").html(data);
                $("#checking").hide();
            },
            error: function () {
            }
        });
    }
</script>

