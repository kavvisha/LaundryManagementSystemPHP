<?php include '../inc/header.php'; ?>

  

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="Stylesheet" type="text/css" href="RoomB.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
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
    <div ng-app="myapp" ng-controller="usercontroller" ng-init="displayData()">  
        <div class="container text-center">
            <h3>Customer Details</h3><br>
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
                            Customer details
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th ng-click="sort('GuestId')">Guest ID
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='GuestID'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('Title')">Title
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='Title'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('FirstName')">First Name
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='FirstName'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('MiddleName')">Middle Name
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='MiddleName'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('Lastname')">Last Name
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='Lastname'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('Country')">Country
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='Country'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('NIC/Passport')">NIC/Passport
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='NIC/Passport'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('HomeAddress')">Home Address
                                                <span class="glyphicon sort-icon" ng-show="sortKey==='HomeAddress'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('Phone')">Phone number
                                                  <span class="glyphicon sort-icon" ng-show="sortKey==='Phone'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th ng-click="sort('Email')">Email
                                                  <span class="glyphicon sort-icon" ng-show="sortKey==='Email'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                            </th>
                                            <th>Delete</th>
                                            <th>Select</th>
                                         
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr name="Row1"  dir-paginate="x in names|itemsPerPage:5|orderBy:sortKey:reverse|filter:search">
                                            <td  >{{x.CustomerID}}</td>
                                            <td>{{x.Title}}</td>
                                            <td>{{x.FirstName}}</td>
                                            <td>{{x.MiddleName}}</td>
                                            <td>{{x.Lastname}}</td>
                                            <td>{{x.Country}}</td>
                                            <td>{{x.NICPassport}}</td>
                                            <td>{{x.HomeAddress}}</td>
                                            <td>{{x.phone}}</td>
                                            <td>{{x.Email}}</td>
                                            <td><button ng-click="DeleteData(x.CustomerID)" name="delete">Delete</button></td>
                                            <td><button ng-click="Confirm(x.CustomerID)" name="select">Select</button></td>
                                          
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
    
    
 
    
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th >Guest ID</th>
                                            <th></th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <form action="RoomB-ConfirmABook.php" method="post">
                                    <tbody>
                                        <tr name="Row2">
                                            <td><input type="text" name="CID"  value="ng-model" ng-model="CustomerID"/></td>
                                           

   
                                            <td><input type="submit" value="Submit"></td>
                                            <td><a href=""><input type="submit" value="Update"></td>
                                          
                                        </tr>

                                    </tbody>
                                    </form>
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
       boundary-links="true">
    </dir-pagination-controls>

</div>
</div>
</div>
        </div>
            </div>
</body>
</html>

