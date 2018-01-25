<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laundry Management System</title>

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <!--        <link href="http://localhost/ITP/vendor/morrisjs/morris.css" rel="stylesheet">-->

        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
         <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

        
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">Hotel Management System</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">

                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->

                    <!-- /.dropdown -->

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="../Login/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="../dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>


                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> Employee Management<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="../Employee/addEmp.php">Add an Employee</a>
                                    </li>   
                                    <li>
                                        <a href="viewEmployees.php">View, Delete Employee</a>
                                    </li> 
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> Booking Management<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="../Booking/RoomB-GetCustomerDetails.php">Add a Booking</a>
                                    </li>   
                                    <li>
                                        <a href="../Booking/RoomB-AddRoom.php">Add a Room</a>
                                    </li>   
                                    <li>
                                        <a href="../Booking/RoomDetails.php">View Room Details</a>
                                    </li>  
                                    <li>
                                        <a href="../Booking/CustomerDetails.php">View Customer Details</a>
                                    </li>  
                                    <li>
                                        <a href="../Booking/ConfirmedDetails.php">View Confirm Bookings</a>
                                    </li>  
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> Package Management<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="http://localhost/ITP/Package/AddPackage.php">Add Package</a>
                                    </li> 
                                    <li>
                                        <a href="http://localhost/ITP/Package/AddVehicle.php">Add Vehicle</a>
                                    </li>   
                                    <li>
                                        <a href="http://localhost/ITP/Package/AddCustomer.php">Add Customer</a>
                                    </li> 
                                    <li>
                                        <a href="http://localhost/ITP/Package/Adddownpayment.php">Add Downpayment</a>
                                    </li> 
                                    <li>
                                        <a href="http://localhost/ITP/Package/BookPackage.php">Book Package</a>
                                    </li> 
                                    <li>
                                        <a href="http://localhost/ITP/Package/TablePackage.php">View,Update, Delete Packages</a>
                                    </li>
                                    <li>
                                        <a href="http://localhost/ITP/Package/TableVehicle.php">View,Update, Delete Vehicles</a>
                                    </li>
                                    <li>
                                        <a href="http://localhost/ITP/Package/TableBooking.php">View,Update, Delete Booking</a>
                                    </li>
                                    <li>
                                        <a href="http://localhost/ITP/Package/TableDownPayment.php">View,Update, Delete Downpayments</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>



                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> Inventory Management<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#"><i class="fa fa-user fa-fw"></i> Category Management<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li> <a href="../Inventory/addItemCategory.php">Add Item Category</a></li>
                                            <li> <a href="../Inventory/viewCategory.php">View/Update Item Category</a></li>

                                        </ul>
                                    </li>   
                                    <li>
                                        <a href="#"><i class="fa fa-user fa-fw"></i> Supplier Management<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li> <a href="../Inventory/addSupplier.php">Add Supplier</a></li>
                                            <li> <a href="../Inventory/viewSupplier.php">View/Update Suppliers</a></li>

                                        </ul>
                                    </li>   

                                    <li>
                                        <a href="#"><i class="fa fa-user fa-fw"></i> Item Batch Management<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li> <a href="../Inventory/AddItemBatches.php">Add Item Batch</a></li>
                                            <li> <a href="../Inventory/viewBatch.php">View/Update Batches</a></li>

                                        </ul>
                                    </li>  
                                </ul>

                            </li>


                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> Finance Management<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    
                                    <li>
                                        <a href="#"><i class="fa fa-user fa-fw"></i> Payment Type Management<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li> <a href="../Finance/payments.php">Add Payment Type</a></li>
                                               

                                        </ul>
                                    </li>   
                                    <li>
                                        <a href="#"><i class="fa fa-user fa-fw"></i> Payment Management<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li> <a href="../Finance/paymenthandle.php">Add Payment</a></li>
                                            <li> <a href="../Finance/viewPayment.php">View/Update/Delete Payments</a></li>

                                        </ul>
                                    </li>   

                                    <li>
                                        <a href="#"><i class="fa fa-user fa-fw"></i> Money Allocation<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li> <a href="../Finance/allocate.php">Allocate Money</a></li>
                                            <li> <a href="../Finance/viewallocation.php">View/Update/Delete Allocation</a></li>

                                        </ul>
                                    </li>  
                                    
                                        <li>
                                        <a href="#"><i class="fa fa-user fa-fw"></i> Expense Management<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li> <a href="../Finance/insertExpenses.php">Add Expenses</a></li>
                                            <li> <a href="../Finance/viewExpenses.php">View/Update/Delete Expenses</a></li>

                                        </ul>
                                    </li>  
                                </ul>

                            </li>


                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> User Management<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="">Add an User</a>
                                    </li>   
                                    <li>
                                        <a href="">View, Delete Employee</a>
                                    </li> 
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>