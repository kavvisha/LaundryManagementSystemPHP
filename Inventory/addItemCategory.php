<?php include '../inc/header.php'; ?>
    
    <script type="text/javascript">
    function getFocus(){
        document.getElementById("itemID").focus();
    }    
    
</script>
</head>

<body onload="getFocus()">
<div id="page-wrapper">
    <div class="container">
            <header class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">Add Item Category</h2>
                    </div>
            </div>
            </header>
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
                                    <form role="form" action="addItemCategory.php" method="post">
                                        <div class="form-group">
                                            
                                            <label>Item ID</label>
                                            <input class="form-control" id="itemID" name="itemID">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <input class="form-control" name="itemName" id="itemName"> 
                                        </div>
                                        <div class="form-group">
                                            <label>Set Re-Order Level</label>
                                            <input class="form-control" name="orderLevel">
                                        </div>
                                        <br/>
                                        <div>
                                            <button class = "btn btn-primary" name="add" type="submit">Add Category</button>
                                            <button class = "btn btn-primary" type="reset" >Clear Entries</button>
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
            </div>
            <!-- /.row -->
        </div>
       

</div>
      <?php include '../inc/footer.php'; ?>
  

</body>

</html>
<?php 

    if(isset($_POST['add'])){
        $id = $_POST['itemID'];
        $name = $_POST['itemName'];
        $level = $_POST['orderLevel'];
       
        include 'Classes/Category.php';
        $entry = new Category();
        $entry->{"addCat"}($id, $name, $level);
        //call_user_method("addCat", $entry, $id, $name, $level);
    }
    if(isset($_POST['viewAll'])){
        echo '<script>window.location.href = "viewCategory.php";</script>';
    }
    
?>