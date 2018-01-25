<?php include '../inc/header.php'; ?>
<?php include '../inc/footer.php'; ?>


<script type="text/javascript">
    $(document).ready(function () {
        $('table tbody tr').click(function () {

            var str = $.trim($(this).text());
            var id = str.split(" ", 1);
            document.cookie = "id=" + id;
            window.location.href = 'updateSupplier.php';

        })
    });


</script>

</head>
<body>
    <div id="page-wrapper">
    <header class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">View Supplier Information</h2>
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
                                <form role="form" action="viewSupplier.php" method="post">
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
                            <form role="form" action="viewSupplier.php" method="post">
                                <table class="table table-bordered table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>Supplier ID</th>
                                            <th>Supplier Name</th>
                                            <th>Contact Number</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody style="cursor: pointer;"> <?php
                                        if (isset($_POST['search'])) {
                                            $key = $_POST['field'];
                                            include 'Classes/Supplier.php';
                                            $entry = new Supplier();
                                            $entry->{"searchSupp"}($key);
                                            //call_user_method("searchSupp", $entry, $key);
                                        }
                                        ?>
                                        <?php
                                        if (isset($_POST['viewAll'])) {
                                            require 'Classes/Supplier.php';
                                            $viewSupp = new Supplier();
                                            $viewSupp->viewSupp();
                                        }
                                        ?>

                                        <?php
                                        require 'Classes/Supplier.php';
                                        $viewSupp = new Supplier();
                                        $viewSupp->viewSupp();
                                        ?>

                                    </tbody>
                                </table>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

</body>
</html>

