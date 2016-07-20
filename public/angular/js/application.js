var mct = angular.module('mct', ['mct.filters', 'mct.services', 'mct.directives', 'ngRoute'])

mct.config(['$routeProvider', '$httpProvider', function ($routeProvider, $httpProvider) {

    $routeProvider.when('/dashboard', {
        controller: 'root',
        templateUrl: 'public/angular/partials/home.html'
    });

    $routeProvider.otherwise({
        redirectTo: '/dashboard',
        templateUrl: 'public/angular/partials/home.html'
    });

}]);
