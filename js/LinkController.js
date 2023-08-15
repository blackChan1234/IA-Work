var app = angular.module("myApp", []);

app.controller("LinkController", function($scope, $http) {
    $http.get('data/file.json').then(function(response) {
        $scope.links = response.data;
    });
});