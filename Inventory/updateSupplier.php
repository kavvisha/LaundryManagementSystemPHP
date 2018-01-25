<?php include '../inc/header.php'; ?>


        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>


        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <?php include '../inc/footer.php'; ?>

        <script type="text/javascript">
            function getFocus() {
                document.getElementById("suppName").focus();
            }

        </script>
        <?php
        $id = $_COOKIE["id"];
        $q = "SELECT * FROM supplier WHERE suppID=" . $id . ";";
        include 'dbConnect/connection.php';
        $query = $conn->prepare($q);
        $result = $query->execute();
        if ($result) {
            if ($query->rowCount() > 0) {
                foreach ($query as $row) {
                    $sid = $row['suppID'];
                    $sname = $row['name'];
                    $stelephone = $row['telephone'];
                    $saddress = $row['address'];
                }
            } else {
                echo '<script>alert("Error!");</script>';
            }
        }
        ?>

    </head>

    <body onload="getFocus()"> 
        <div id="page-wrapper">
            <div class="container">


                <div class="container">
                    <header class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">Edit Supplier</h2>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                NEW ENTRY
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-11">
                                        <form role="form" action="updateSupplier.php" method="post">
                                            <div class="form-group">
                                                <fieldset disabled>
                                                    <label>Supplier ID</label>
                                                    <input class="form-control" name="suppID" value="<?php echo htmlspecialchars($id); ?>">
                                                </fieldset>
                                            </div>
                                            <div class="form-group">
                                                <label>Supplier Name</label>
                                                <input class="form-control" id= "suppName" name="suppName" value="<?php echo htmlspecialchars($sname); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control" name="suppCon" value="<?php echo htmlspecialchars('0' . $stelephone); ?>" >
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control" name="suppAdd" value="<?php echo htmlspecialchars($saddress); ?>">
                                            </div>
                                            <br/>
                                            <div>                                   
                                                <input class = "btn btn-primary" type="submit" name="edit" value="Update Entry"/>
                                                <input class = "btn btn-primary" type="submit" name="delete" value="Delete Entry"/>

                                            </div>
                                        </form>

                                    </div>

                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>



    </body>

</html>

<?php
if (isset($_POST['edit'])) {

    $name = $_POST['suppName'];
    $telephone = $_POST['suppCon'];
    $add = $_POST['suppAdd'];

    include 'Classes/Supplier.php';
    $editSup = new Supplier();
    $editSup->{"editSupplier"}($id, $name, $telephone, $add);
    //call_user_method("editSupplier", $editSup, $id, $name, $telephone, $add);
}
if (isset($_POST['delete'])) {

    include 'Classes/Supplier.php';
    $deleteSup = new Supplier();
    $deleteSup->{"deleteSupplier"}($id);
    //call_user_method("deleteSupplier", $editSup, $id);
}
?>

