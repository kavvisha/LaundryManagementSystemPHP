<?php include '../inc/header.php'; ?>
        <script src="js/bootstrap.min.js"></script>
             
<script type="text/javascript">
    function getFocus(){
        document.getElementById("suppName").focus();
    }    
    
</script>

</head>

<body onload="getFocus()"> 
<div id="page-wrapper">
    <div class="container">

      
        <div class="container">
            <header class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">Add Supplier</h2>
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
                                    <form role="form" name="addSupp" id="addSupp" action="addSupplier.php" method="post">
                                       
                                        <div class="form-group">
                                            <label>Supplier Name</label>
                                            <input class="form-control" id= "suppName" name="suppName">
                                         
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control" name="suppCon" >
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="suppAdd" >
                                        </div>
                                        <br/>
                                        <div>                                   
                                            <input class = "btn btn-primary" type="submit" name="add" value="Add Supplier"/>
                                            <button class = "btn btn-primary" type="reset">Clear Entries</button>
                                            <input class = "btn btn-primary" type="button" name="viewAll" onclick="view()" value="view Supplier"/>
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
     <?php include '../inc/footer.php'; ?>


</body>

</html>

<?php 

    if(isset($_POST['add'])){
        $name = $_POST['suppName'];
        $telephone = $_POST['suppCon'];
        $add = $_POST['suppAdd'];
    
        include 'Classes/Supplier.php';
        $entry = new Supplier();
        $entry->{"addSupplier"}($name, $telephone, $add);
        //call_user_method("addSupplier", $entry, $name, $telephone, $add);
    }
   
    
?>

<script type="text/javascript">
    function view(){
         
        window.location.href = "viewSupplier.php";
  
    }
</script>