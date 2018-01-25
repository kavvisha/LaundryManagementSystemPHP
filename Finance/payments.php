<?php include '../inc/header.php'; ?>

<!-- jQuery -->


<?php include '../inc/footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('table tbody tr').click(function () {

            var str = $.trim($(this).text());
            var id = str.charAt(0);
            document.cookie = "id=" + id;
            window.location.href = 'updatePayTypes.php';

        })
    });


</script>


</head>
<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    <form action="payments.php" method="POST">

                        <h1>Add Payment Types</h1><br>
                        <br>
                        <label>Payment Type</label>
                        <input class="form-control" type="text" name="pt" required><br>
                        <input class="btn btn-success" type="submit" name="add" value="Add"/>
                        <input class="btn btn-success" type="reset" value="Clear Entries"/><br><br/>

                        <?php
                        if (isset($_POST['add'])) {
                            $paymentName = $_POST['pt'];
                            include 'Classes/paymentType.php';
                            $add = new paymentType();
                            $add->{"addPaymentType"}($paymentName);
                            //call_user_method("addPaymentType", $add,$paymentName);
                        }
                        include 'Classes/paymentType.php';
                        $pay = new paymentType();
                        $pay->viewPaymentType();
                        ?>      



                    </form>
                </div>
            </div>
        </div>



    </div>
    <!-- jQuery -->




    <?php include '../inc/footer.php'; ?>
</body>
</html>