<?php include '../inc/header.php'; ?>

<body onload="getFocus()"> 

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add a Customer: </h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">


                            <form role="form" action="AddCustomer.php" method="post">

                                <label>*Name :</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" minlength="4"  name="cname" placeholder="Enter your name" required/>
                                </div>


                                <div class="form-group">
                                    <label >*NIC :</label>
                                    <div class="col-md-12">
                                        <input type="text" maxlength="10" minlength="10" class="form-control" name="nic" placeholder="Enter NIC number " required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email address :</label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" placeholder="Enter your Email" name="Gemail" required/>       
                                    </div>

                                    <div class="form-group">
                                        <label>*Telephone number :</label>
                                        <div class="col-md-12">
                                            <input  type="text" maxlength="10"   class="form-control" name="GTelno" placeholder="Enter your telephone number"  required/>
                                        </div>
                                    </div>
                                    <br/>

                                    <input class = "btn btn-primary" type="submit" name="add" value="Save"/>
                                    <button class = "btn btn-primary" type="reset">Clear Entries</button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



<?php include '../inc/footer.php'; ?>
<?php
if (isset($_POST['add'])) {
    $name = $_POST['cname'];
    $nic = $_POST['nic'];
    $email = $_POST['Gemail'];
    $tel = $_POST['GTelno'];

    include 'classes/Customer.php';
    $entry = new Customer();
    $entry->{"AddCustomer"}($name, $nic, $email, $tel);
}
?>
