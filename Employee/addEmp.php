<?php include '../inc/header.php'; ?>
<?php require '../Login/session.php'; ?>

<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src="validate.js"></script>
<style>
    #loading{display:none;}
</style>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add an Employee: </h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">


                        <h2>Add Employee</h2>
                        <div class="col-lg-12">
                            <form ng-app="ValidateApp" ng-controller="validator" name="addEmp" method="POST" id="uploadimage" action="addEmpP.php" enctype="multipart/form-data">
                                <label>Full Name</label>
                                <input type="text" name="fullname" class="form-control" required/>
                                <div id="checkEmployee">
                                    <label>NIC</label>
                                    <input type="text" id="NIC" name="nic" class="form-control" onblur="checkNIC()" required/><span id="msg"> </span>
                                    <p id="checking" style="display:none">checking</p>
                                </div>
                                
                                <label>Mobile Number</label>
                                <input  type="text" ng-model="mnum" ng-pattern="telp" name="mnum" class="form-control" required/>
                                <span ng-show="addEmp.mnum.$dirty&&addEmp.mnum.$invalid"><span ng-show="addEmp.mnum.$error.required" >Mobile Number Required and</span><span style="color:red;" ng-show="addEmp.mnum.$error.minlength & addEmp.mnum.$error.pattern">Mobile number must be 10 digits.</span></span><br/>
                                <label>Land Phone Number</label>
                                <input type="text" ng-model="lnum" ng-pattern="telp" name="lnum" class="form-control" required/>
                                <span ng-show="addEmp.lnum.$dirty&&addEmp.lnum.$invalid"><span ng-show="addEmp.lnum.$error.required" >Mobile Number Required and</span><span style="color:red;" ng-show="addEmp.lnum.$error.minlength & addEmp.lnum.$error.pattern">Land Phone number must be 10 digits.</span></span><br/>
                                <label>Address</label>
                                <textarea class="form-control" name="addr"></textarea>
                                <label>Contract Duration</label>
                                <input type="number" name="contdu" class="form-control" required/>
                                <label>Basic Salary</label>
                                <input type="number" name="bsalary" class="form-control" required/>
                                <label>Department</label>
                                <input type="text" name="dpt" class="form-control" required/>
                                <label>Position</label>
                                <input type="text" name="post" class="form-control" required/>

                                <label>Photo</label>
                                <input id="file" type="file" name="fileToUpload" id="fileToUpload" required/>
                                <div id="image_preview"><img id="previewing" class="img-thumbnail" src="uploads/preview.png" /></div>
                                <h4 id='loading' >loading..</h4>
                                <div id="message"></div>
                                <br />
                                <input ng-disabled="addEmp.lnum.$dirty&&addEmp.lnum.$invalid || addEmp.lnum.$error.required || addEmp.lnum.$error.minlength || addEmp.mnum.$dirty&&addEmp.mnum.$invalid || addEmp.mnum.$error.minlength" type="submit" value="Add" class="btn btn-info"/>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include '../inc/footer.php'; ?>
    <script>

        function checkNIC() {
            $("#checking").show();
            jQuery.ajax({
                url: "checkNIC.php",
                data: 'NIC=' + $("#NIC").val(),
                type: "POST",
                success: function (data) {
                    $("#msg").html(data);
                    $("#checking").hide();
                },
                error: function () {
                }
            });
        }


        $(document).ready(function (e) {
            $("#uploadimage").on('submit', (function (e) {
                e.preventDefault();
                $("#message").empty();
                $('#loading').show();
                $.ajax({
                    url: "addEmpP.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data)
                    {
                        $('#loading').hide();
                        $("#message").html(data);
                    }
                });
            }));

    // Preview
            $(function () {
                $("#file").change(function () {
                    $("#message").empty();
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match = ["image/jpeg", "image/png", "image/jpg"];
                    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
                    {
                        $('#previewing').attr('src', 'noimage.png');
                        $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                        return false;
                    }
                    else
                    {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });
            function imageIsLoaded(e) {
                $("#file").css("color", "green");
                $('#image_preview').css("display", "block");
                $('#previewing').attr('src', e.target.result);
                $('#previewing').attr('width', '250px');
                $('#previewing').attr('height', '230px');
            }
            ;
        });
    </script>

    <?php include '../inc/footer.php'; ?>