<?php include '../inc/header.php'; ?>
<?php
require '../Login/session.php';
require_once '../inc/conn.php';

$sql = "SELECT * FROM users";

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
            <h1 class="page-header">View Users: </h1>
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
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Update Password</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                        echo "<tr>";
                                        echo "<td>" . $data['uname'] . "</td>";
                                        echo "<td>" . $data['role'] . "</td>";
                                        echo "<th><a href ='changepassword.php?uid=". $data['UID'] . "' class = 'btn btn-default'>Change</a></th>";
                                        echo "<th><a href = 'deleteUser.php?uid=" . $data['UID'] . "' onclick='return confirm_delete()' class = 'btn btn-danger'>Delete</a></th>";
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

