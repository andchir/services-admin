
/**
 * Services Edit
 *
 */
var app = angular.module('servicesApp', ['ngRoute','apiServices']);

app
.config(['$routeProvider', '$locationProvider',
    function($routeProvider, $locationProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'templates/views/view.html',
                controller: 'ViewController',
                controllerAs: 'view'
            })
            .when('/edit/:itemId', {
                templateUrl: 'templates/views/edit.html',
                controller: 'EditController',
                controllerAs: 'edit'
            })
            .otherwise({
                redirectTo: '/'
            });
        $locationProvider.html5Mode(false);
    }
]);
