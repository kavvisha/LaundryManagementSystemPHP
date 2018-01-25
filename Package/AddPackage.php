<?php
$imgid = (mt_rand(10, 9999999999));
?>

<script type="text/javascript">
    function getFocus() {
        document.getElementById("ptype").focus();
    }

</script>
<?php include '../inc/header.php'; ?>

<body onload="getFocus()"> 

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add a Package: </h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                            <form role="form" action="AddPackage.php" method="post">


                                <label>Package Type  :</label>
                                <input class="form-control" type="text" name="ptype"><br>

                                <label>Package Name   :</label>
                                <input class="form-control" type="text" name="pname" required/><br>

                                <label>Package Price  :</label>
                                <input data-validation="number" class="form-control" type="text" name="pprice" required/><br>

                                <label>Offer Duration :</label>
                                <input class="form-control" type="text" name="pduration" required/><br>


                                <label>Eligibility  :</label>
                                <input class="form-control" type="text" name="pelig" /><br>


                                <label>Description   :</label>
                                <input class="form-control" type="text" name="pdes" required/><br>


                                <input class="form-control" type="text" name="imgid" value="<?php echo $imgid; ?>" readonly/></br>

                                <input class = "btn btn-primary" type="submit" name="add" value="Add Package"/>

                                <button class = "btn btn-primary" type="reset">Clear Entries</button>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script
    src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
crossorigin="anonymous"></script>

<script src="js/dropzone.js"></script>
<link rel="stylesheet" href="css/dropzone.css">


<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<form action="upload.php" class="dropzone">
    <input type="text" name="imgid" value="<?php echo $imgid; ?>" readonly/>
</form>
</body>

</html>


<?php
if (isset($_POST['add'])) {
    $type = $_POST['ptype'];
    $name = $_POST['pname'];
    $price = $_POST['pprice'];
    $dura = $_POST['pduration'];
    $elig = $_POST['pelig'];
    $des = $_POST['pdes'];
    $imgid = $_POST['imgid'];
    $img = $_POST['fileToUpload'];

    include 'classes/Package.php';
    $entry = new Package();
    $entry->{"AddPackage"}($type, $name, $price, $dura, $elig, $des, $imgid);
}
?>

