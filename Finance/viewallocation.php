<?php include '../inc/header.php'; ?>
<?php include '../inc/footer.php'; ?>




<script type="text/javascript">
    $(document).ready(function () {
        $('table tbody tr').click(function () {

            var str = $.trim($(this).text());
            var id = str.split(" ", 1);
            document.cookie = "id=" + id;
            document.write(str);
            window.location.href = 'updateall.php';

        })
    });


</script>


</head>
<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    <h1>View Allocation</h1><br/>
                </div>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <form role="form" action="viewallocation.php" method="post">
                                <span class="input-group-btn">
                                    <input type="text" class="form-control" placeholder="Search for..." name="sch" >
                                    <button class="btn btn-default"  type="submit" name="search" ><i class="glyphicon glyphicon-search"></i></button>
                                    <button type="submit" class="btn btn-default" name="view">View All</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
                <br/><br/>
                <form role="form" action="viewallocation.php" method="post">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Allocation ID</th>
                                <th>Department</th> 
                                <th>Amount</th>
                                <th>Receiver Name</th>
                                <th>Date</th>

                            </tr>
                        </thead>
                        <tbody style="cursor: pointer;">
                        <tbody style="cursor: pointer;">     
                            <?php
                            if (isset($_POST['search'])) {
                                $key = $_POST['sch'];
                                include 'Classes/allocation.php';
                                $alo = new allocation();
                                $alo->{"searchAllocation"}($key);
                                //call_user_method("searchAllocation", $alo, $key);
                            }
                            ?>

                            <?php
                            if (isset($_POST['view'])) {
                                require 'Classes/allocation.php';
                                $viewallocation = new allocation();
                                $viewallocation->viewAllocation();
                            }
                            ?>


                            <?php
                            include 'Classes/allocation.php';
                            $allo = new allocation();
                            $allo->viewAllocation();
                            ?>
                        </tbody>
                    </table>

                    <br/>


                </form>


            </div>
        </div>
    </div>
</body>
</html>

