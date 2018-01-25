<?php include '../inc/header.php'; ?>


        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
         <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script src="js/bootstrap.js"></script>
        <?php include '../inc/footer.php'; ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('table tbody tr').click(function(){
                    
                    var str=$.trim($(this).text());
                    var id = str.split(" ",1);
                    document.cookie = "id="+id;
                    window.location.href = 'updateBatch.php';
                   
                })
            });
            
     
        </script>
    </head>
    <body>
        <div id="page-wrapper">
        <header class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">View Stock</h2>
                    </div>
            </div>
            </header>
        
            <div class="container">
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            View Entries
                        </div>
                        <div class="panel-body">
                              <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6"  style="padding-left: 0">
                                        <form role="form" action="viewBatch.php" method="post">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search Here" name="field">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit" name="search"><i class="glyphicon glyphicon-search"></i></button>
                                                    <button type="submit" class="btn btn-default" name="viewAll">View All</button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </form>
                                    </div><!-- /.col-lg-6 -->
                                </div>
                            </div><!--row1-->
                            <br/><br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                          <tr>
                                            <th>Batch ID</th>
                                            <th>Item Type</th>
                                            <th>Brand Name</th>
                                            <th>Expiry Date</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <th>Unit Cost</th>
                                            <th>Total Cost</th>
                                            <th>Supplier</th>
                                          </tr>
                                        </thead>
                                        <tbody style="cursor: pointer;"> <?php 
                                                    if(isset($_POST['search'])){
                                                        $key = $_POST['field'];
                                                        include 'Classes/ItemBatch.php';
                                                        $entry = new ItemBatch();
                                                        $entry->{"searchBatch"}($key);
                                                        //call_user_method("searchBatch", $entry, $key);
                                                    }
                                                ?>
                                                <?php 
                                                    if(isset($_POST['viewAll'])){
                                                        require 'Classes/ItemBatch.php';
                                                        $viewBatch = new ItemBatch;
                                                        $viewBatch->viewBatch();
                                                    }
                                                ?>
                                            
                                                <?php
                                                      require 'Classes/ItemBatch.php';
                                                      $viewBatch = new ItemBatch;
                                                      $viewBatch->viewBatch();
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
    </body>
</html>
