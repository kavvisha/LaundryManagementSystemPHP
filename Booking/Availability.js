var mainApp = angular.module("AApp", []);

         
         mainApp.controller('AvailabilityDController', function($scope,$http) {
                          $scope.displayAvailability = function(){  
                    $http.get("RoomB-Book.php")  
                         .success(function(data){  
                    $scope.RAvailablitySingle = data;  
                    });  
                   }
      

             
             
                    $scope.telp = /^\+?\d{2}[- ]?\d{3}[- ]?\d{5}$/;
                    $scope.noOnly=/^[0-9]*$/;    
                  //  $scope.ChildrenNo="";
                   // $scope.NoOfAdlts="";
                   // $scope.RoomNo="";
                    
                    $scope.loadRoomNo =function(){
                        
                        $http.get("selectRoomID.php").success(function(data){
                            $scope.RoomNos= data;
                        })
                    }
                    
                    $scope.loardCap =function(){
                        
                        $http.post("selectRoomCap.php",{'RoomNo':$scope.RoomNo}).success(function(data){
                            $scope.cap =data;
                        })
                        $http.post("AddConfirm.php",{'RoomNo':$scope.RoomNo}).success(function(data1){
                            $scope.cost=data1;
                        })
                            
                        
                    }
                    

                  
         });

