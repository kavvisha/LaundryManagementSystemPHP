
 var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
 app.controller("usercontroller", function($scope, $http){  
            
             

      $scope.displayData = function(){  
           $http.get("select.php")  
           .success(function(data){  
                $scope.names = data;  
           });  
      } 
      $scope.displayRoomData = function(){  
           $http.get("selectRoom.php")  
           .success(function(data){  
                $scope.Rnames = data;  
           });  
      } 
      $scope.DisplayConfirmedData = function(){
          $http.get("selectBookings.php").success(function(data){
              $scope.Bnames = data;
          });
      }
     
     
     $scope.btnName = "Delete";  

 
      
            $scope.DeleteData = function(CustomerID){  
         if (confirm("Do you really want to delete!") == true) {        
           $scope.CustomerID = CustomerID;  
            $http.post(  
                     "delete.php",  
                     { 'CustomerID':$scope.CustomerID,'btnName':$scope.btnName}  
                ).success(function(data){  
                     alert(data);  
                 $scope.displayData(); 
                       
                }); 
            }
           
            }
            

       $scope.DeleteRoomData = function(RoomNo){
       if (confirm("Do you really want to delete!") == true) {    
           $scope.RoomNo = RoomNo;  
            $http.post(  
                     "deleteRoom.php",  
                   {'RoomNo':$scope.RoomNo}  
                ).success(function(data){  
                     alert(data);  
                 $scope.displayRoomData(); 
                       
                }); 
            }
           
            }
            
      $scope.DeleteConfirmedData = function(RoomID){
       if (confirm("Do you really want to delete!") == true) {    
           $scope.RoomID = RoomID;  
            $http.post(  
                     "deleteConfirmed.php",  
                   {'RoomID':$scope.RoomID}  
                ).success(function(data){  
                     alert(data);  
                 $scope.DisplayConfirmedData(); 
                       
                }); 
            }
           
            }      

           
            
 
            $scope.Confirm = function(CustomerID){
                
                $scope.CustomerID = CustomerID;
                $http.post(
                        "CustomerDetails.php",
                {'CustomerID':$scope.CustomerID}).success(function(data){
                 
                });
                        
            }
            
        $scope.sort = function(keyname){
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }
           
    
       
      });
      
  
 
