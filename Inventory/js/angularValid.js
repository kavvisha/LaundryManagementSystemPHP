var mainApp = angular.module("mainApp", []);

         
         mainApp.controller('CustomerDController', function($scope) {
                    $scope.telp = /^\+?\d{2}[- ]?\d{3}[- ]?\d{5}$/;
                    $scope.noOnly=/^[0-9]*$/;    
                    $scope.firstname="";
                    $scope.lastName="" ;
                    $scope.suppName="";
                 
                  
         });

