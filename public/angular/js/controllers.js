mct.controller('BaseCtrl', function ($scope) {
    $("body").find('#side-menu').metisMenu();
});

mct.controller('DashboardCtrl', function ($scope) {

});

mct.controller('ProductCtrl', function ($scope, ProductSrvc) {

    ProductSrvc.getCategories();
});