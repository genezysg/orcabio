var orcabioApp = angular.module('orcabioApp', []);

var orcabioapi="http://api.orcabio.com/api/v1/";

orcabioApp.controller('OrcabioController',function OrcabioController($http,$scope){
  $http.get(orcabioapi+"service").then(function(response) {
        $scope.services=response.data;
        $scope.services.push({description:"Escolha"})
  });

  $scope.calcularOrcamento= function(){

    var pmt={};
    if ($scope.serviceList!=null) {pmt.service1=$scope.serviceList.id};
    if ($scope.serviceList2!=null) {pmt.service2=$scope.serviceList2.id};
  //  if ($scope.serviceList.id!=null) service1=serviceList.id

    $http.get(orcabioapi+"orcamento",{
        params: pmt
     }).then(function(response) {
          $scope.orcamento=response.data.value;
    });
  };

});
