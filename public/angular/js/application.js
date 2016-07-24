var mct = angular.module('mct', ['mct.filters', 'mct.services', 'mct.directives', 'ngRoute'])

mct.config(['$routeProvider', '$httpProvider', function ($routeProvider, $httpProvider) {

    $routeProvider.when('/dashboard', {
        controller: 'DashboardCtrl',
        templateUrl: 'resources/views/admin/dashboard.blade.php'
    });

    $routeProvider.when('/product/new-product', {
        controller: 'ProductCtrl',
        templateUrl: 'public/angular/partials/product/new-product.html'
    });

    $routeProvider.otherwise({
        redirectTo: '/dashboard',
        templateUrl: 'resources/views/admin/dashboard'
    });

}]);
