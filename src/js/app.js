var orcabioApp = angular.module('orcabioApp', []);

var orcabioapi="http://api.orcabio.com/api/v1/";

var option=[];

orcabioApp.controller('OrcabioController',function OrcabioController($http,$scope,$filter){
  $http.get(orcabioapi+"service").then(function(response) {
        $scope.services=response.data;
  });

  $scope.calcularOrcamento= function(serviceid){
    console.log("Calculando Orcamento");
    var pmt=[];
    $scope.escolhidos=$filter('filter')($scope.services, {checked: true});;
    $scope.escolhidos.map(function(escolhido){
      pmt.push(escolhido.id);
    });
    console.log(pmt);

    $http.get(orcabioapi+"orcamento",{
        params:{"services[]": pmt}
     }).then(function(response) {
          $scope.orcamento=response.data.value;
    });
  };

});
