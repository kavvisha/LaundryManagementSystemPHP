<?php include '../inc/header.php'; 

require_once '../inc/conn.php';

$sql = "SELECT * FROM laundryjob where jobStatus='not done' OR jobStatus='washing' ORDER BY `laundryjob`.`dateAdded` DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<script>
    function confirm_delete() {
        return confirm('Are you sure?');
    }

</script>
<div id="page-wrapper">
     <?php 
        include 'laundryMenu.php'; 
        error_reporting(E_ERROR);
    ?>
   
                <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> On going Jobs - Listed According to Last time added. </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="well">
                                <div class="pre-scrollable">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> Room Number</th>
                                        <th> Job Number</th>
                                        <th> Worker </th>
                                        <th> Machine No</th>
                                        <th> Job Status </th>
                                        <th> No. of clothes</th>
                                        <th> Add Clothes</th>
                                        <th> Close Job </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                        	
                                        $num_rows = mysqli_num_rows($data);
                                        echo "<tr>";
                                        echo "<td>" . $data['roomID'] . "</td>";
                                        echo "<td>" . $data['jobID']. "</td>";
                                        echo "<td>" . $data['worker'] . "</td>";
                                        echo "<td>" . $data['machineNo'] . "</td>";
                                        echo "<td>" . $data['jobStatus'] . "</td>";
                                        
                                        

                                        $jobIDen=base64_encode($data['jobID']);
                                        $jobID=$data['jobID'];
                                        //get a count of each job id's clothes
                                        $sql2="SELECT count(*) as total from laundryjobclothes where jobID='".$jobID."'";
                                        $stmt2 = $conn->prepare($sql2);   
                                        $stmt2->execute();
                                        $data2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                                        
                                        
                                       // echo "<td>" . $data2['total'] . "</td>";
                                        if($data2['total'] =="0"){
                                            echo "<td class='alert alert-danger'>" . $data2['total'] . "</td>";
                                        }
                                        else{
                                            echo "<td >" . $data2['total'] . "</td>";
                                        }
                                        
                                        
                                      // echo "<th><a href = 'addCloth.php?uid=" . $data['jobID'] . "' onclick='return confirm_delete()' class = 'btn btn-danger'>Delete</a></th>";
                                       echo "<th><a href = 'addCloth.php?jobID=". $jobIDen ."'  class = 'btn btn-default'> Add Clothes </a></th>";
                                       echo "<td><a href ='closeJob.php?jobID=".$data['jobID']."' class = 'btn btn-default'> Finish Job </a></td>";
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

