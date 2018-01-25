<?php include 'header.php'; ?>;
<style>

    body { 
        background: url(http://1001wallpapers.net/wp-content/uploads/2016/12/Abstract-Wallpaper-High-Quality-J574.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .panel-default {
        opacity: 0.9;
        margin-top:30px;
    }
    .form-group.last { margin-bottom:0px; }
</style>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-lock"></span> Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="login.php">
                            <div class="form-group">
                                <label  class="col-sm-3 control-label">
                                    Username</label>
                                <div class="col-sm-9">
                                    <input type="text" name="uname" class="form-control" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-3 control-label">
                                    Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"/>
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group last">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Sign in</button>
                                    <button type="reset" class="btn btn-default btn-sm">
                                        Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>


    <!--     jQuery 
        <script src="../vendor/jquery/jquery.min.js"></script>
    
         Bootstrap Core JavaScript 
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    
         Metis Menu Plugin JavaScript 
        <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    
         Custom Theme JavaScript 
        <script src="../dist/js/sb-admin-2.js"></script>-->

</body>

</html>
