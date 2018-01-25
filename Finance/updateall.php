<?php include '../inc/header.php'; ?>
<?php include '../inc/footer.php'; ?>

<script type="text/javascript">
    function getFocus() {
        document.getElementById("sbox").focus();
    }

</script>

<?php
$id = $_COOKIE["id"];

$q = "SELECT * FROM moneyallocation WHERE allocationID =" . $id . ";";
include 'dbconnect.php';
$query = $conn->prepare($q);
$result = $query->execute();
if ($result) {
    if ($query->rowCount() > 0) {
        foreach ($query as $row) {
            // $aid = $row['allocationID'];
            $dept = $row['deptName'];
            $amt = $row['amount'];
            $recName = $row['receiveName'];
            $date = $row['timeStamp'];
        }
    } else {
        echo '<script>alert("Error!");</script>';
    }
}
?>

</head>
<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="container">
                <div class="col-lg-12">

                    <h1>Allocate Money</h1><br>
                    <form role="form" action="updateall.php" method="post">
                        <fieldset disabled>
                            <label>Allocation ID</label>
                            <input class="form-control" type="text" name="id" value="<?php echo htmlspecialchars($id); ?>">
                        </fieldset><br>
                        <label>Department</label>
<?php
include 'dbconnect.php';
$query = $conn->query("SELECT deptName FROM department");

echo '<select name="selectDept" class="form-control">'
 . '<option>';
echo htmlspecialchars($dept);
echo '</option>';

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="' . $row['deptName'] . '">' . $row['deptName'] . '</option>';
}
echo '</select>';
?>



                        <br>
                        <label>Amount</label>
                        <input class="form-control" type="text" name="amt" value="<?php echo htmlspecialchars($amt); ?>"><br>
                        <label>Receiver's Name</label>
                        <input class="form-control" type="text" name="rn" value="<?php echo htmlspecialchars($recName); ?>"><br>
                        <label>Date and Time</label>
                        <input class="form-control" type="text" name="dt" value="<?php echo htmlspecialchars($date); ?>"><br>
                        <input type="submit" class="btn btn-success" name="edit" value="UPDATE">
                        <input type="submit" class="btn btn-success" name="delete" value="DELETE">
                        <button class="btn btn-success" type="reset">Clear Entries</button>




                    </form>
                </div>
            </div>
        </div>   
    </div>
</body>
</html>

<?php
if (isset($_POST['edit'])) {

    echo $id;
    $dname = $_POST['selectDept'];
    $amount = $_POST['amt'];
    $rname = $_POST['rn'];
    $date = $_POST['dt'];


    include 'Classes/allocation.php';
    $edita = new allocation();
    $edita->{"updateAllocation"}($id, $dname, $amount, $rname, $date);
    //call_user_method("updateAllocation", $edita, $id, $dname, $amount, $rname, $date);
}
if (isset($_POST['delete'])) {

    include 'Classes/allocation.php';
    $deleteall = new allocation();
    $deleteall->{"deleteAllocation"}($id);
    // call_user_method("deleteAllocation", $deleteall, $id);
}
?>
