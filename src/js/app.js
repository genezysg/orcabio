var orcabioApp = angular.module('orcabioApp', []);


orcabioApp.controller('OrcabioController',function OrcabioController($scope){
  $scope.services=[
    {"id":1,
      "description":"compra"},
    {"id":2,
      "description":"venda"}
  ]
});
