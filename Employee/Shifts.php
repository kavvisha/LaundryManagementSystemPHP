<?php include 'header.php'; ?>

<div class="row">
    <div class="container">
        <h2>Manage Shifts</h2>
        <div class="col-md-4">
            <form>
                <label>Select Employee</label>
                <select class="form-control">
                    <option>Admin</option>
                    <option>Stock Manager</option>
                </select>
                <label>Start Time</label>
                <input type="text" name="stime" class="form-control" data-validation="time" data-validation-help="HH:mm"/>
                <label>End Time</label>
                <input type="text" name="etime" class="form-control" data-validation="time" data-validation-help="HH:mm"/>
                <label>Duty Point</label>
                <input type="text" name="dutyp" class="form-control" />
                <br />
                <input type="submit">
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Duty Point</th>
                        <th>Update</th>
                         <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>theekshana</td>
                        <td>10.00AM</td>
                         <td>10.00PM</td>
                         <td>Front Desk</td>
                        <td><a href="#" class="btn btn-default">Edit</a></td>
                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                    </tr>
                      <tr>
                        <td>Amila</td>
                        <td>10.00AM</td>
                         <td>10.00PM</td>
                         <td>Swimming Pool</td>
                        <td><a href="#" class="btn btn-default">Edit</a></td>
                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>

    $.validate({
        
    });



</script>

