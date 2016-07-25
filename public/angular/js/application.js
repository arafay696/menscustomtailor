var mct = angular.module('mct', ['mct.filters', 'mct.services', 'mct.directives', 'ngRoute'])

mct.config(['$routeProvider', '$httpProvider', function ($routeProvider, $httpProvider, CSRF_TOKEN) {

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

    /**
     * adds CSRF token to header
     */
    $httpProvider.defaults.headers.common['X-CSRF-TOKEN'] = CSRF_TOKEN;

}]);
