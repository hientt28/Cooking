var app = angular.module('cookApp', ['ngRoute', 'ngResource']);

app.constant('API_URL', 'http://localhost:8000/api');

app.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
    $routeProvider.when('/users/:id', {
        controller: 'ShowProfile',
        templateUrl: '/templates/users/profile.html'

    });
    $routeProvider.when('/users/:id/edit', {
        controller: 'EditProfile',
        templateUrl: '/templates/users/editProfile.html'
    });
    $routeProvider.when('/methods/create', {
        controller: 'methodController',
        templateUrl: '/templates/methods/createMethod.html'    
    });
    $routeProvider.when('/methods/:id/edit', {
        controller: 'EditMethod',
        templateUrl: '/templates/methods/editMethod.html'    
    });

    $locationProvider.html5Mode(true);
}]);
