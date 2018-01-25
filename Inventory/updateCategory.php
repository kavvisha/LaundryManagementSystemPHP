<?php include '../inc/header.php'; ?>
    
    <script type="text/javascript">
    function getFocus(){
        document.getElementById("itemID").focus();
    }    
    </script>
    
    <?php 
            $id = $_COOKIE["id"];
        
            $q = "SELECT * FROM itemcategory WHERE catID='".$id."';";
            include 'dbConnect/connection.php';
            $query = $conn->prepare($q);
            $result = $query->execute();
            if($result){
                if($query->rowCount()>0){
                    foreach ($query as $row){
                        
                        $name = $row['name'];
                        $olevel = $row['orderLevel'];
                        
                    }
                }
                else{
                    echo '<script>alert("Error Loading Data!");</script>';
                }
            }
        ?>
    

</head>

<body onload="getFocus()">
<div id="page-wrapper">
    <div class="container">
            <header class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">Update Item Category</h2>
                    </div>
            </div>
            </header>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            UPDATE ENTRY
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-11">
                                    <form role="form" action="updateCategory.php" method="post">
                                        <div class="form-group">
                                            
                                            <label>Item ID</label>
                                            <input class="form-control" id="itemID" name="itemID" value="<?php echo htmlspecialchars($id); ?>">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <input class="form-control" name="itemName" id="itemName" value="<?php echo htmlspecialchars($name); ?>"> 
                                        </div>
                                        <div class="form-group">
                                            <label>Set Re-Order Level</label>
                                            <input class="form-control" name="orderLevel" value="<?php echo htmlspecialchars($olevel); ?>">
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
            </div>
            <!-- /.row -->
        </div>
       

</div>

</body>

</html>
<?php include '../inc/footer.php'; ?>
<?php 

    if(isset($_POST['edit'])){
        $cid = $_POST['itemID'];
        $name = $_POST['itemName'];
        $level = $_POST['orderLevel'];
       
        include 'Classes/Category.php';
        $entry = new Category();
        $entry->{"editCat"}($cid, $name, $level);
        //call_user_method("editCat", $entry, $cid, $name, $level);
        
    }
     if(isset($_POST['delete'])){
 
        include 'Classes/Category.php';
        $deleteCat = new Category();
        $deleteCat->{"deleteCat"}($id);
        //call_user_method("deleteCat", $editSup, $id);
    }
    
?>