<?php include '../inc/header.php'; ?>


<script type="text/javascript">
    function calcTot() {
        var ucost = document.getElementById("unitCost").value;
        var quan = document.getElementById("qty").value;

        document.getElementById("totalCost").value = (ucost * quan);

    }
</script>

<?php
$id = $_COOKIE["id"];
$q = "SELECT * FROM itembatch WHERE batchID=" . $id . ";";
include 'dbConnect/connection.php';
$query = $conn->prepare($q);
$result = $query->execute();
if ($result) {
    if ($query->rowCount() > 0) {
        foreach ($query as $row) {

            $cat = $row['catName'];
            $qty = $row['quantity'];
            $unit = $row['unit'];
            $brnd = $row['brand'];
            $exp = $row['expDate'];
            $ucost = $row['unitcost'];
            $tcost = $row['totalCost'];
            $supp = $row['supplier'];
        }
    } else {
        echo '<script>alert("Could not load values!");</script>';
    }
}
?>


</head>

<body>

    <div id="page-wrapper">
    <header class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Edit Item Batch</h2>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    EDIT ENTRY
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="updateBatch.php" method="post">
                                <div class="form-group">
                                    <fieldset disabled>
                                        <label>Batch ID</label>
                                        <input class="form-control" name="batchID" value=<?php echo $id; ?>>
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <label>Item Category</label>
<?php
include 'dbConnect/connection.php';
$query = $conn->query("SELECT name FROM itemcategory");

echo '<select name="selectCat" class="form-control">'
 . '<option>';
echo htmlspecialchars($cat);
echo'</option>';
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
}
echo '</select>';
?>
                                </div>  
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <input class="form-control" name="itemBrand" type="text" value="<?php echo htmlspecialchars($brnd); ?>">
                                </div>

                                <div class="form-group">
                                    <label>Quantity</label>
                                    <br/>
                                    <div class="col-xs-8" style="padding-left:0;">
                                        <input class="form-control" name="qty" type="text" id="qty" value="<?php echo htmlspecialchars($qty); ?>">
                                    </div>  
                                    <div class="col-xs-4" style="padding-right: 0;">
                                        <select id="ItemType" class="form-control" name="qtyUnit" >
                                            <option><?php echo htmlspecialchars($unit); ?></option>
                                            <option>units</option>
                                            <option>kg</option>
                                            <option>g</option>
                                            <option>mg</option>
                                            <option>m</option>
                                            <option>cm</option>
                                            <option>mm</option>
                                            <option>l</option>
                                            <option>ml</option>
                                        </select>
                                    </div>
                                </div>
                                <br/>
                                <br/>



                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label>Expiry Date</label>
                                <div class="input-group" >
                                    <input class="form-control"  name="expDate" type="text" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($exp); ?>">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <?php
                                include 'dbConnect/connection.php';
                                $query = $conn->query("SELECT name FROM supplier");

                                echo '<select name="supplier" class="form-control">'
                                . '<option>';
                                echo htmlspecialchars($supp);
                                echo'</option>';
                                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                }
                                echo '</select>';
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Unit Cost</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="unitCost" id="unitCost" value="<?php echo htmlspecialchars($ucost); ?>">
                                    <span class="input-group-addon">lkr</span>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label>Total Cost</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="totalCost" id="totalCost" onclick="calcTot()" value="<?php echo htmlspecialchars($tcost); ?>">
                                    <span class="input-group-addon">lkr</span>
                                </div>
                            </div>
                            <!--div class="form-group">
                                <label for="ItemType">Return Status</label>
                                <select id="ItemType" class="form-control">
                                <option>False</option>
                                <option>True</option>
                                </select>
                            </div-->

                            <div>
                                <button class = "btn btn-primary" name="add" type="submit">Update Record</button>
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
</body>

</html>
<?php include '../inc/footer.php'; ?>
<?php
if (isset($_POST['add'])) {
    $cat = $_POST['selectCat'];
    $brand = $_POST['itemBrand'];
    $qty = $_POST['qty'];
    $qtyUnit = $_POST['qtyUnit'];
    $exp = $_POST['expDate'];
    $supp = $_POST['supplier'];
    $unitCost = $_POST['unitCost'];
    $totCost = $_POST['totalCost'];

    include 'Classes/ItemBatch.php';
    $entry = new ItemBatch();
    $entry->{"editBatch"}($id, $cat, $brand, $qty, $qtyUnit, $exp, $supp, $unitCost, $totCost);
    //call_user_method("editBatch", $entry, $id, $cat, $brand, $qty, $qtyUnit, $exp, $supp, $unitCost, $totCost);
}
if (isset($_POST['delete'])) {

    include 'Classes/itemBatch.php';
    $deleteBatch = new ItemBatch();
    $deleteBatch->{"deleteBatch"}($id);
    //call_user_method("deleteBatch", $editBatch, $id);
}
?>

