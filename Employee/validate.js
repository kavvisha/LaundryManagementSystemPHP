
var mainApp = angular.module("ValidateApp", []);

         
         mainApp.controller('validator', function($scope) {
                    $scope.telp = /^\+?\d{2}[- ]?\d{3}[- ]?\d{5}$/;
                    $scope.noOnly=/^[0-9]*$/;    
                    $scope.mnum="";
                    $scope.lnum="";
                   
                 
                  
         });
      

