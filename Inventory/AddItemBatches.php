<?php include '../inc/header.php'; ?>

    
<script type="text/javascript">
    function calcTot(){
        var ucost = document.getElementById("unitCost").value;
        var quan = document.getElementById("qty").value;
       
        document.getElementById("totalCost").value = (ucost*quan);
        
    }
</script>



</head>

<body>
       <div id="page-wrapper">
            <header class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Add Item Batch</h2>
                    </div>
            </div>
            </header>
            <div class="container">
            <div class="row">
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            NEW ENTRY
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="AddItemBatches.php" method="post">
                                        <div class="form-group">
                                            <fieldset disabled>
                                            <label>Batch ID</label>
                                            <input class="form-control" name="batchID">
                                            </fieldset>
                                        </div>
                                        <div class="form-group">
                                            <label>Item Category</label>
                                            <?php
                                                include 'dbConnect/connection.php';
                                                $query = $conn->query("SELECT name FROM itemcategory"); 

                                                echo '<select name="selectCat" class="form-control">'
                                                .    '<option>Select Category</option>'; 
                                                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                                       echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                                    }
                                                echo '</select>';
                                            ?>
                                        </div>  
                                        <div class="form-group">
                                            <label>Brand Name</label>
                                            <input class="form-control" name="itemBrand" type="text" data-validation="length alphanumeric" data-validation-length="">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <br/>
                                            <div class="col-xs-8" style="padding-left:0;" data-validation="number" data-validation-allowing="float">
                                                <input class="form-control" name="qty" type="text" id="qty" >
                                            </div>  
                                            <div class="col-xs-4" style="padding-right: 0;">
                                                <select id="ItemType" class="form-control" name="qtyUnit" >
                                                    <option>SELECT UNIT</option>
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
                                                <input class="form-control"  name="expDate" type="text" placeholder="yyyy-mm-dd" data-validation="date" data-validation-format="yyyy-mm-dd">
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
                                                . '<option>Select Supplier</option>'; 
                                                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                                       echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                                    }
                                                echo '</select>';
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Unit Cost</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="unitCost" id="unitCost">
                                                <span class="input-group-addon">lkr</span>
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label>Total Cost</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="totalCost" id="totalCost" onclick="calcTot()">
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
                                            <button class = "btn btn-primary" name="add" type="submit">Add Category</button>
                                            <button class = "btn btn-primary" type="reset">Clear Entries</button>
                                            <button class = "btn btn-primary" name="viewAll" type="submit">View</button>
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
 <?php include '../inc/footer.php'; ?>
</html>

<?php 

    if(isset($_POST['add'])){
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
        $entry->{"addBatch"}($cat, $brand, $qty, $qtyUnit, $exp, $supp, $unitCost, $totCost);
        //call_user_method("addBatch", $entry, $cat, $brand, $qty, $qtyUnit, $exp, $supp, $unitCost, $totCost);
    }
    if(isset($_POST['viewAll'])){
        echo '<script>window.location.href = "viewBatch.php";</script>';
    }
    
?>

