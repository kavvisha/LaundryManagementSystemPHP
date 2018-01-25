<?php include '../inc/header.php'; ?>
<?php
require '../Login/session.php';
require_once '../inc/conn.php';

$sql = "SELECT * FROM employee";

$stmt = $conn->prepare($sql);
$stmt->execute();
?>
<script>
    function confirm_delete() {
        return confirm('Are you sure?');
    }

</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View | Delete Employees: </h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">


                        <div class="col-lg-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Emp ID</th>
                                        <th>Full Name</th>
                                        <th>Image</th>
                                        <th>Position</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                        echo "<tr>";
                                        echo "<td>" . $data['EmpID'] . "</td>";
                                        echo "<td>" . $data['EmpName'] . "</td>";
                                        echo "<td><img width=150px height=150px src='uploads/" . $data['image'] . "'/></td>";
                                        echo "<td>" . $data['post'] . "</td>";

                                        echo "<th><a href ='' class = 'btn btn-default'>Edit</a></th>";
                                        echo "<th><a href = 'deleteE.php?empID=" . $data['EmpID'] . "&image=" . $data['image'] . "' onclick='return confirm_delete()' class = 'btn btn-danger'>Delete</a></th>";
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
    <?php include '../inc/footer.php'; ?>

