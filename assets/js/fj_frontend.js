var module = angular.module("sampleApp", ['ngRoute']);

module.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl: 'home.html',
                controller: 'RouteController'
            }).
            when('/contact', {
                templateUrl: 'contact.html',
                controller: 'RouteController'
            }).
            when('/work', {
                templateUrl: 'work.html',
                controller: 'RouteController'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);

module.controller("RouteController", function($scope) {
});
