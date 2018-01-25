<?php include '../inc/header.php'; ?>




</head>
<body>
    <div id="page-wrapper">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <form id="form" action="allocate.php" method="post">
                    <h1>Allocate Money</h1><br>


                    <label>Department</label>
                    <?php
                    include 'dbconnect.php';
                    $query = $conn->query("SELECT deptName FROM department");

                    echo '<select name="dept" class="form-control">'
                    . '<option>select Department</option>';
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['deptName'] . '">' . $row['deptName'] . '</option>';
                    }
                    echo '</select>';
                    ?>

                    <br>
                    <label for="field">Amount</label>
                    <input class="form-control" type="text" name="amt" required><br>
                    <script>
                        jQuery.validator.setDefaults({
                            debug: true,
                            success: "valid"
                        });
                        $("#form").validate({
                            rules: {
                                field: {
                                    required: true,
                                    number: true
                                }
                            }
                        });

                    </script>
                    <label>Receiver's Name</label>
                    <input class="form-control" type="text" name="rn" required><br>

                    <label>Date and Time</label>
                    <?php
                    $date = new DateTime();
                    $timeStamp = $date->getTimestamp();

                    echo "<input class='form-control' type='text' name='dt'  value=" . date('Y/m/d H:i:s', $timeStamp) . "><br>";
                    ?>      
                    <button class="btn btn-success" type="submit" name="add">Add</button>
                    <button class="btn btn-success" type="reset">Clear Entries</button>
                    <a href="viewallocation.php"><input type="button" class="btn btn-success" value="View"></a>



                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- jQuery -->

        <?php include '../inc/footer.php'; ?>
</body>
</html>

<?php
if (isset($_POST['add'])) {

    $deptName = $_POST['dept'];
    $amount = $_POST['amt'];
    $receiverName = $_POST['rn'];
    $timeStamp = $_POST['dt'];

    include 'Classes/allocation.php';
    $add = new allocation();
    $add->{"addNewAllocation"}($deptName, $amount, $receiverName, $timeStamp);
    //call_user_method("addNewAllocation", $add,$deptName,$amount,$receiverName,$timeStamp);
}
?>
