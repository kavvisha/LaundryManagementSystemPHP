<?php include '../inc/header.php'; ?>


<!-- jQuery -->
<script src="js/jquery.min.js"></script>



<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src="http://localhost/ITP/vendor/metisMenu/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="http://localhost/ITP/dist/js/sb-admin-2.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('table tbody tr').click(function () {

            var str = $.trim($(this).text());
            var id = str.split(" ", 1);
            document.cookie = "id=" + id;
            window.location.href = 'updateCategory.php';

        })
    });


</script>
</head>
<body>
    <div id="page-wrapper">
        <header class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">View Item Category</h2>
                </div>
            </div>

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
                                        <form role="form" action="viewCategory.php" method="post">
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
                                    <form role="form" action="viewCategory.php" method="post">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Item ID</th>
                                                    <th>Item Name</th>
                                                    <th>Re-Order Level</th>

                                            </thead>
                                            <tbody style="cursor: pointer;"> <?php
                                                if (isset($_POST['search'])) {
                                                    $key = $_POST['field'];
                                                    include 'Classes/Category.php';
                                                    $entry = new Category();
                                                    $entry->{"searchCat"}($key);
                                                    //call_user_method("searchCat", $entry, $key);
                                                    echo $key;
                                                }
                                                ?>
                                                <?php
                                                if (isset($_POST['viewAll'])) {
                                                    require 'Classes/Category.php';
                                                    $viewCat = new Category();
                                                    $viewCat->viewCat();
                                                }
                                                ?>

                                                <?php
                                                require 'Classes/Category.php';
                                                $viewCat = new Category();
                                                $viewCat->viewCat();
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
</header>
</body>
</html>

