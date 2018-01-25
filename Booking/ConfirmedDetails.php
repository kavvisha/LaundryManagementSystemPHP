<?php include '../inc/header.php'; ?>
  
<?php include("Header.php") ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="Stylesheet" type="text/css" href="RoomB.css">

  <script src="View.js"></script>
  <script src="dirPagination.js"></script>
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
    
    <div ng-app="myapp" ng-controller="usercontroller" ng-init="DisplayConfirmedData()">  
        <div class="container text-center">
            <h3>Confirmed Details</h3><br>
        </div>
        <div class="Uncmfirmed">
    <form class="form-inline">
        <div class="form-group">
            <label >Search</label>
            <input type="text" ng-model="search" class="form-control" placeholder="Search">
        </div>
    </form>            
                            <div class="col-lg-16">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Confirmed details
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th ng-click="sort('RoomID')">RoomID
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='RoomID'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('CheckInDate')">Check In Date
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='CheckInDate'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('CheckOutDate')">Check Out Date
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='CheckOutDate'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('BookedDate')">BookedDate
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='BookedDate'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('NoOfAdults')">No Of Adults
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='NoOfAdults'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('NoOfChildren')">No Of Children
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='NoOfChildren'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('RoomNumber')">Room Number
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='RoomNumber'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('CustomerID')">Customer ID
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='CustomerID'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('BookedTime')">Booked Time
                                                  <span class="glyphicon sort-icon" ng-show="sortKey==='BookedTime'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th>Delete</th>
                                            <th>Select</th>
                                         
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr name="Row1" dir-paginate="x in Bnames|itemsPerPage:5|orderBy:sortKey:reverse|filter:search">
                                            <td  >{{x.RoomID}}</td>
                                            <td>{{x.CheckInDate}}</td>
                                            <td>{{x.CheckOutDate}}</td>
                                            <td>{{x.BookedDate}}</td>
                                            <td>{{x.NoOfAdults}}</td>
                                            <td>{{x.NoOfChildren}}</td>
                                            <td>{{x.RoomNumbr}}</td>
                                            <td>{{x.CustomerID}}</td>
                                            <td>{{x.BookedTime}}</td>
                                            
                                            <td><button ng-click="DeleteConfirmedData(x.RoomID)" name="delete">Delete</button></td>
                                            
                                          
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
    
    
 
    
  
    
    
    
    
    
    
    
</div>                  
                    </div>
                   
                </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5"></label>
                            <div class="col-sm-2">
                                <a href="RoomB-ConfirmABook.php"><input type="button" class="btn btn-success" name="CRBDetails" value="Confirm"/></a>
                            </div>
                        </div>
<div class="Uncmfirmed">


    <div class="control label col-sm-11">
        <div class="col-sm-22">
   <dir-pagination-controls
       max-size="5"
       direction-links="true"
       boundary-links="true" >
    </dir-pagination-controls>
</div>
</div>
</div>
        </div>
            </div>
</body>
</html>

