<?php include '../inc/header.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add an User: </h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">

                        <h2>Add Users</h2>
                        <div class="col-lg-12">
                            <form method="POST" action="adduserp.php" class="ajax">
                                <div id="frmCheckUsername">
                                    <label>Username</label>
                                    <input type="text" name="uname" id="uname" onBlur="checkAvailability()" class="form-control"/><span id="user-availability-status"></span>
                                    <p id="checking" style="display:none">checking</p>
                                </div>
                                <label>User Role</label>
                                <select name="role" class="form-control">
                                    <option>Super Admin</option>
                                    <option>Manager</option>
                                    <option>Stock Manager</option>
                                </select>
                                <label>Password</label>
                                <input type="passowrd" name="password" class="form-control" />
                                <label>Re Enter Password</label>
                                <input type="text" name="cpassword" class="form-control"/>
                                <br />
                                <input class="btn btn-default" type="submit" value="Add">
                                <input class="btn btn-default" type="reset" value="Reset">
                            </form>
                        </div>
                        <div id="success"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../inc/footer.php'; ?>
<script>

    function checkAvailability() {
        $("#checking").show();
        jQuery.ajax({
            url: "checkusername.php",
            data: 'uname=' + $("#uname").val(),
            type: "POST",
            success: function (data) {
                $("#user-availability-status").html(data);
                $("#checking").hide();
            },
            error: function () {
            }
        });
    }

    $('form.ajax').on('submit', function () {
//console.log('trigger');
        var that = $(this),
                url = that.attr('action'),
                type = that.attr('method'),
                data = {};

        that.find('[name]').each(function (index, value) {
            var that = $(this),
                    name = that.attr('name'),
                    value = that.val();

            data[name] = value;
        });
        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function (response) {
                $("#success").html("<h3 class='alert alert-warning'>" + response + "</h3>");
                //console.log(response);
                $('#success').finish().show().delay(2000).fadeOut("slow");

            }
        });
        return false;
    });
</script>

