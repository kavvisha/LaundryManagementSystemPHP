<?php include '../inc/header.php'; ?>

<script type="text/javascript">
    function getFocus() {
        document.getElementById("pt").focus();
    }

</script>

<?php

$id = $_COOKIE["id"];

$q = "SELECT * FROM paymenttype WHERE payTypeID ='$id'";
include 'dbconnect.php';
$query = $conn->prepare($q);
$result = $query->execute();
if ($result) {
    if ($query->rowCount() > 0) {
        foreach ($query as $row) {
            $pid = $row['payTypeID'];
            $name = $row['paymentName'];
        }
    } else {
        echo '<script>alert("Error!")</script>';
    }
}
?>

</head>
<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    <form role="form" action="updatePayTypes.php" method="POST">

                        <h1>Update Payment Types</h1><br>
                        <fieldset disabled>
                            <label>Payment ID</label>
                            <input class="form-control" type="text" name="id" value="<?php echo htmlspecialchars($id); ?>"></fieldset><br>
                        <label>Payment Type</label>
                        <input class="form-control" type="text" name="pt" value="<?php echo htmlspecialchars($name); ?>"><br>


                        <input type="submit" class="btn btn-success" name="edit" value="Update">
                        <input type="submit" class="btn btn-success" name="delete" value="Delete">


                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php include '../inc/footer.php'; ?>
<?php
if (isset($_POST['edit'])) {


    $pname = $_POST['pt'];



    include 'Classes/paymentType.php';
    $editp = new paymentType();
    $editp->{"updatePaymentType"}($id, $pname);
    // call_user_method("updatePaymentType", $editp, $id, $pname);
}
if (isset($_POST['delete'])) {

    include 'Classes/paymentType.php';
    $delete = new paymentType();
    $delete->{"deletePaymentType"}($id);
    //call_user_method("deletePaymentType", $delete, $id);
}
?>

