<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotel Booking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <?php 
    include 'Header.php ';
 ?>
  <script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
    }
</script>
  <script>
if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
        $('#datee').datepicker({

        minDate: 0,
        onSelect: function(date) {
        $("#datee2").datepicker('option', 'minDate', date);
        }
        });
        $('#datee2').datepicker(
        {
        
        });
        

    })
}

</script>



</head>

<body>
    
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
    <div class="container text-center">
  <h3>Check the availability</h3><br>
    </div>

    <form class="form-horizontal" action="RoomB-Book.php" method="post">
        <div class="row">
            <div class="col-lg-6">
            <div class="form-group">

                <label class="control-label col-sm-5" for="datee">Check in date :</label>
                  <div class="col-sm-5">
                  <input type="date" id="datee" name="check-in" class="form-control" size="20"  required/>
                </div>
            </div>
            </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-sm-5" for="datee2">Check out date :</label>
                  <div class="col-sm-5">
                  <input type="date" id="datee2" name="check-out" class="form-control" size="20" required />
                </div>
              </div>
        </div>
        </div>
              

                <div class="form-group">
 <label class="control-label col-sm-5" for="sel1">No Of Rooms :</label>
 <div class="col-sm-2">
     <select class="form-control" id="sel1" name="NoOfRooms" required>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
     <option value=5>5</option>
     <option value=6>6</option>
     <option value=7>7</option>
     <option value=8>8</option>
     <option value=9>9</option>
     <option value=10>10</option>
     <option value=11>11</option>
     <option value=12>12</option>
     <option value=13>13</option>
     <option value=14>14</option>
     <option value=15>15</option>
     <option value=16>16</option>
     <option value=17>17</option>
     <option value=18>18</option>
     <option value=19>19</option>
     <option value=20>20</option>
     <option value=21>21</option>
     <option value=22>22</option>
     <option value=23>23</option>
     <option value=24>24</option>
     <option value=25>25</option>
     <option value=26>26</option>
     <option value=27>27</option>
     <option value=28>28</option>
     <option value=29>29</option>

 </select>

</div>
</div>

 <div class="form-group">
 <label class="control-label col-sm-5" for="sel1">No Of Adults :</label>
 <div class="col-sm-2">
 <select class="form-control" id="AdultNo" name="AdultNo">
    <option>0</option>
   <option selected value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
     <option value=5>5</option>
     <option value=6>6</option>
     <option value=7>7</option>
     <option value=8>8</option>
     <option value=9>9</option>
     <option value=10>10</option>
     <option value=11>11</option>
     <option value=12>12</option>
     <option value=13>13</option>
     <option value=14>14</option>
     <option value=15>15</option>
     <option value=16>16</option>
     <option value=17>17</option>
     <option value=18>18</option>
     <option value=19>19</option>
     <option value=20>20</option>
     <option value=21>21</option>
     <option value=22>22</option>
     <option value=23>23</option>
     <option value=24>24</option>
     <option value=25>25</option>
     <option value=26>26</option>
     <option value=27>27</option>
     <option value=28>28</option>
     <option value=29>29</option>

 </select>

</div>
</div>

<div class="form-group">
 <label class="control-label col-sm-5" for="sel1">No Of Children :</label>
 <div class="col-sm-2">
 <select class="form-control" id="ChildrenNo" name="ChildrenNo">
   <option selected value=0>0</option>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
     <option value=5>5</option>
     <option value=6>6</option>
     <option value=7>7</option>
     <option value=8>8</option>
     <option value=9>9</option>
     <option value=10>10</option>
     <option value=11>11</option>


 </select>

</div>
</div>
       <div class="form-group">
       <label class="control-label col-sm-5" for="submitA"></label>
  <div class="col-sm-4"> 
    <a href="RoomB-Book.php">
    <Input type="submit" class="btn btn-primary"  > </input>
    </a>
  </div>
  </div>


            </div>
        </form>

</div>
    </body>
</html>