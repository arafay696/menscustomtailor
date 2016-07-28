var mct = angular.module('mct', ['mct.filters', 'mct.services', 'mct.directives', 'ngRoute', 'ngFileUpload','angular.filter'])

mct.config(['$routeProvider', '$httpProvider', function ($routeProvider, $httpProvider, CSRF_TOKEN) {

    $routeProvider.when('/dashboard', {
        controller: 'DashboardCtrl',
        templateUrl: 'resources/views/admin/dashboard.blade.php'
    });

    $routeProvider.when('/product/new-product', {
        controller: 'ProductCtrl',
        templateUrl: 'public/angular/partials/product/new-product.html'
    });

    $routeProvider.when('/product/products', {
        controller: 'ProductCtrl',
        templateUrl: 'public/angular/partials/product/productListing.html'
    });

    $routeProvider.when('/product/editProduct/:id', {
        controller: 'ProductCtrl',
        templateUrl: 'public/angular/partials/product/edit-product.html'
    });

    // ----------------------- User ----------------- //

    $routeProvider.when('/user/new-user', {
        controller: 'UserCtrl',
        templateUrl: 'public/angular/partials/user/add-user.html'
    });

    $routeProvider.when('/user/edit/:id', {
        controller: 'UserCtrl',
        templateUrl: 'public/angular/partials/user/edit-user.html'

    });

    $routeProvider.when('/user/users', {
        controller: 'UserCtrl',
        templateUrl: 'public/angular/partials/user/userListing.html'
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
