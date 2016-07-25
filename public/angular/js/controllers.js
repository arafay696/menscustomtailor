mct.controller('BaseCtrl', function ($scope) {
    $("body").find('#side-menu').metisMenu();
});

mct.controller('DashboardCtrl', function ($scope) {

});

mct.controller('ProductCtrl', function ($scope, ProductSrvc) {

    $scope.addProduct = {
        MerchantID: 1,
        ProductTypeID: 6,
        Basic: 1,
        Price: 0,
        Qty: 0,
        QtySold: 0,
        Weight: 0,
        EnableExpiry: 0,
        EnableExpiryDate: '',
        Code: 0,
        Name: '',
        Description: '',
        MetaTitle: '',
        MetaKeywords: '',
        MetaDescription: '',
        Categories: [],
        ColorID: [],
        ContrastColorID: [],
        Patterns: [],
        ThreadCound: '',
        Thickness: '',
        FabricType: [],
        Season: [],
        Opacity: [],
        ShirtStyle: [],
        Shine: 0,
        WrinkleResistance: 0,
        CustomType: []
    };
    $scope.addProductRequest = function () {
        ProductSrvc.addProduct('admin/product/add-product', $scope.addProduct).then(
            function (response) {
                console.log('success', $scope.addProduct);
                ProductSrvc.flashMsg('success', 'Product Added.');
            },
            function (data) {
                // Handle error here
                ProductSrvc.flashMsg('error', 'Product Failed.');
            }
        );
        //console.log($scope.addProduct);
    }

    ProductSrvc.getCategories().then(function (data) {
        $scope.settings = data.data;
    });

    $scope.addInArray = function (arr, checked, valueIs) {
        var find = false;
        angular.forEach(arr, function (val) {
            if (val === valueIs) {
                find = true;
            }
        });

        if (checked && !find) {
            arr.push(valueIs);
        } else {
            var getKey = null;
            angular.forEach(arr, function (val, key) {
                if (val === valueIs) {
                    getKey = key;
                }
            });

            var index = arr.indexOf(valueIs);
            if (index > -1) {
                arr.splice(index, 1);
            }
        }

        console.log(arr);
    }

    $scope.addColor = function (arr, valueIs) {
        $scope.addProduct[arr] = [];
        $scope.addProduct[arr] = valueIs;

        console.log($scope.addProduct[arr]);
    }
});