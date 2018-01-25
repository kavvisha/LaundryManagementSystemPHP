<?php include '../inc/header.php'; ?>
 <?php 
    include 'Header.php ';
 ?>
  <script src="View.js"></script>
    <script src="dirPagination.js"></script>
</head>
<body>
    
    <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
<h1 class="page-header">Add an Customer: </h1>
        </div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
        <div class="container text-center">
            <h3>Rooms Details</h3><br>
        </div>
        <div class="Uncmfirmed">
            <div ng-app="myapp" ng-controller="usercontroller" ng-init="displayRoomData()">   
                <form class="form-inline">
        <div class="form-group">
            <label >Search</label>
            <input type="text" ng-model="search" class="form-control" placeholder="Search">
        </div>
    </form>   
                            <div class="col-lg-16">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Rooms details
                        </div>
     
                       
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th ng-click="sort('RoomNumber')" >Room Number
                                                 <span class="glyphicon sort-icon" ng-show="sortKey==='RoomNumber'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            
                                            <th ng-click="sort('CostPerNight')">Cost per night
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='CostPerNight'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('RoomType')">Room Type
                                                 <span class="glyphicon sort-icon" ng-show="sortKey==='RoomType'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('Adults')">Adults
                                                 <span class="glyphicon sort-icon" ng-show="sortKey==='Adults'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('Children')">Children
                                                 <span class="glyphicon sort-icon" ng-show="sortKey==='Children'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('Floor')">Floor
                                                 <span class="glyphicon sort-icon" ng-show="sortKey==='Floor'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('Description')">Description
                                                 <span class="glyphicon sort-icon" ng-show="sortKey==='Description'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('SmokeStatus')">Smoke Status
                                                 <span class="glyphicon sort-icon" ng-show="sortKey==='SmokeStatus'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('RoomSize')">Room Size
                                                 <span class="glyphicon sort-icon" ng-show="sortKey==='RoomSize'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th>Delete</th>
                                         
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr name="Row3" dir-paginate="x in Rnames|itemsPerPage:5|orderBy:sortKey:reverse|filter:search">
                                            <td >{{x.RoomNo}}</td>
                                            <td>{{x.CostPerNight}}</td>
                                            <td>{{x.RoomType}}</td>
                                            <td>{{x.NoOfAdults}}</td>
                                            <td>{{x.NoOfChildren}}</td>
                                            <td>{{x.Floor}}</td>
                                            <td>{{x.Description}}</td>
                                            <td>{{x.SmokeStatus}}</td>
                                            <td>{{x.roomSize}}</td>
                                           
                                           <td><button ng-click="DeleteRoomData(x.RoomNo)">Delete</button></td>
                                               
                                          
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
</div>                  
                    </div>
                   
          
                        <div class="form-group">
                            <label class="control-label col-sm-5"></label>
                            <div class="col-sm-2">
                                <a href="RoomB-ConfirmABook.php"><input type="button" class="btn btn-success" name="RDetails" value="Update"/></a>
                            </div>
                        </div>
<div class="Uncmfirmed">
    <div class="control label col-sm-11">
        <div class="col-sm-22">
   <dir-pagination-controls
       max-size="5"
       direction-links="true"
       boundary-links="true">
       
    </dir-pagination-controls>
</div>
</div>
</div>
        </div>
      </div>
</body>
</html>



