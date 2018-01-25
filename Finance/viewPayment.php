<?php include '../inc/header.php'; ?>
    <?php include '../inc/footer.php'; ?>
    <script type="text/javascript">
            $(document).ready(function(){
                $('table tbody tr').click(function(){
                    
                    var str=$.trim($(this).text());
                    var id = str.charAt(0);
                    document.cookie = "id="+id;
                    window.location.href = 'updatePay.php';
                   
                })
            });
            
     
        </script>

    
</head>
<body>
    <div id="page-wrapper">
<div class="row">
      <div class="container">
          <div class="col-lg-12">
             
             <h1>View Payments</h1><br/>
          </div>
          <div class="row">
           
            <div class="col-lg-6">
                 <form role="form" action="viewPayment.php" method="post">
                <div class="input-group">
                  
                <input type="text" class="form-control" placeholder="Search for..." name="sch">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="search"><i class="glyphicon glyphicon-search"></i></button>
                     <button type="submit" class="btn btn-default" name="view">View All</button>
                </span>
                  
              </div><!-- /input-group -->
                 </form>
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
          <br/>
          
          <table class="table table-bordered table-hover">
               <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Payment Type</th> 
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Remarks</th>
                    
                </tr>
               </thead>
               <tbody style="cursor: pointer;">
          
              <?php 
                          if(isset($_POST['search'])){
                               $key = $_POST['sch'];
                              
                               include 'Classes/payment.php';
                               $pay = new payment();
                               $pay->{"searchPayment"}($key);
                               //call_user_method("searchPayment", $pay, $key);
                          }
                ?>
                
               <?php 
                           if(isset($_POST['view'])){
                                require 'Classes/payment.php';
                                $viewpay = new payment();
                                $viewpay->viewPayment();
                           }
                ?>
     
              
              <?php
                    include 'Classes/payment.php';
                    $view=new payment();
                    $view->viewPayment();
              ?>
              
               </tbody>
          </table>
              <br/>
             
            
            </form>
            </div>
        </div>
   
    </div>
    </body>
    </html>
 