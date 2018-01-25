
var mainApp = angular.module("mainApp", []);

         
         mainApp.controller('CustomerDController', function($scope) {
                    $scope.telp = /^\+?\d{2}[- ]?\d{3}[- ]?\d{5}$/;
                    $scope.noOnly=/^[0-9]*$/;    
                    $scope.firstname="";
                    $scope.lastName="" ;
                    $scope.roomsize="";
                    $scope.RoomNo="";
                    $scope.roomrate="";
                    $scope.NoOfChildren="";
                    $scope.NoOfAdlts="";
                    $scope.NIC="";
                    $scope.NoOfChildren2="";
                    $scope.NoOfAdlts2="";
                    $scope.RoomNo2="";
                    
                 
                  
         });
        mainApp.directive('validimage',function(){
              return {
                require:'ngModel',
                link:function(scope,el,attrs,ngModel){
            el.bind('change',function(){
            scope.$apply(function(){
            ngModel.$setViewValue(el.val());
            ngModel.$render();
        });
      });
    }
  }
});

