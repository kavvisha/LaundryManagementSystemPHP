<?php

$imgid = (mt_rand(10, 9999999999));
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="dropzone.js"></script>
<link rel="stylesheet" href="dropzone.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add a Vehicle: </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-red">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-group ajax"  method="POST"  action="Iupload.php">                                           
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Vehicle Number</label>
                                        <input type="text" class="form-control margin-bottom-20" name="vnumber">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Make</label>
                                        <select class="form-control" name="vmake">
                                            <?php
                                            $sql = "SELECT * from make";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<option value='" . $row['mid'] . "'/>" . $row['make'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Model</label>
                                        <input type="text" class="form-control margin-bottom-20" name="model">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Year</label>
                                        <input type="number" class="form-control margin-bottom-20" name="year">
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Engine Size</label>
                                        <input type="text" class="form-control margin-bottom-20" name="esize">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Transmission</label>
                                        <select name="transm"  class="form-control">
                                            <option>Automatic</option>   
                                            <option>Manual</option>   
                                        </select>
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Fuel</label>
                                        <select name="fuel"  class="form-control">
                                            <option>Diesel</option>   
                                            <option>Petrol</option> 
                                            <option>Diesel Hybrid</option>
                                            <option>Petrol Hybrid</option>
                                             <option>Electric</option>
                                              <option>Plugged-in Electric</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Color</label>
                                        <input type="text" class="form-control margin-bottom-20" name="color">
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Condition</label>
                                        <select name="cond"  class="form-control">
                                            <option>New</option>   
                                            <option>Used</option>                                             
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Body Type</label>
                                        <select name="btype"  class="form-control">
                                            <?php
                                            $sql = "SELECT vtid,vtype from vtypes";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" . $row['vtid'] . "'>" . $row['vtype'] . "</option>";
                                            }
                                            ?>                                             
                                        </select>
                                    </div>
                                </div>                         
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Cylinders</label>
                                        <input type="number" class="form-control margin-bottom-20" name="cyli">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Speeds</label>
                                        <input type="number" class="form-control margin-bottom-20" name="speeds">
                                    </div>
                                </div>               
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>City MPG/KPL:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="cmpg">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Highway MPG/KPL:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="hmpg">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Wheelbase:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="wbase">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Wheeltype:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="wtype">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Rear axel type:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="raxel">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Brakes type:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="brtype">
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Exterior colors:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="ecolors">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Number of doors:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="ndoors">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Interior colors:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="icolors">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Number of seats:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="nseats">
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Dashboard options:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="doptions">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Interior extras:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="iextras">
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                        <label>Safety options:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="soptions">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Warranty options:</label>
                                        <input type="text" class="form-control margin-bottom-20" name="woptions">
                                    </div>
                                </div>                          
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Price</label>
                                        <input type="text" class="form-control margin-bottom-20" name="price">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Contact</label>
                                        <input type="number" class="form-control margin-bottom-20" name="tel">
                                    </div>
                                </div> 
                                <label>Additional Information</label>
                                <textarea class="form-control" name="content"></textarea>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Video 1</label>
                                        <input type="text" class="form-control margin-bottom-20" name="v1">
                                    </div> 
                                    <div class="col-sm-6">
                                        <label>Video 2</label>
                                         <input type="text" class="form-control margin-bottom-20" name="v2">
                                    </div>                                 
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Mileage</label>
                                        <input type="text" class="form-control margin-bottom-20" name="miles">
                                    </div> 
                                    <div class="col-sm-6">
                                        <label>Listing Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="2">Coming Soon</option>
                                        </select>
                                    </div>                             
                                    <input class="form-control" name="imgid" type="text" value="<?php echo $imgid; ?>"  readonly>                           </div>
                                <hr>                           



                                <div class="row">                                               
                                    <div class="col-lg-6 text-right">
                                        <input class="btn btn-danger" type="submit" value="Add"/>   

                                    </div>
                                    <div id="success"></div>
                                </div>
                            </form>
                            <!-- 3 -->
                            <form action="upload.php" class="dropzone">
                                <input type="text" name="imgid" value="<?php echo $imgid; ?>" readonly/>

                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
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


<?php

mysqli_close($conn);
?>
<script>
    $('form.ajax').on('submit', function () {

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

                $('#success').finish().show().delay(2000).fadeOut("slow");

            }
        });
        return false;
    });
</script>


