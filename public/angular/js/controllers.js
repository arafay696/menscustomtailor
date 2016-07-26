mct.controller('BaseCtrl', function ($scope) {
    $("body").find('#side-menu').metisMenu();
});

mct.controller('DashboardCtrl', function ($scope) {

});

mct.controller('ProductCtrl', function ($scope, HttpSrvc, ProductSrvc, common, Upload, $timeout, $location) {

    $scope.uploadPic = function (file, productID) {
        file.upload = Upload.upload({
            url: 'admin/product/addImages',
            data: {file: file,product: productID}
        });

        file.upload.then(function (response) {
            $timeout(function () {
                file.result = response.data;
            });
        }, function (response) {
            if (response.status > 0)
                $scope.errorMsg = response.status + ': ' + response.data;
        }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    }
    $scope.updateData = false;
    $scope.addProductRequest = function (picFile) {
        $scope.updateData = true;

        ProductSrvc.addProduct('admin/product/add-product', $scope.addProduct).then(
            function (response) {
                $scope.updateData = false;
                response = response.data;
                var productID = response.product;
                angular.forEach($scope.pic, function (val) {
                    $scope.uploadPic(val, productID);
                });
                if (response.status) {
                    common.flashMsg('success', 'Product Added.');
                } else {
                    common.flashMsg('error', response.msg);
                }

            },
            function (data) {
                // Handle error here
                $scope.updateData = false;
                ProductSrvc.flashMsg('error', 'Product Failed.');
            }
        );
        //console.log($scope.addProduct);
    }

    $scope.uploadFiles = function (files, errFiles) {
        $scope.files = files;
        $scope.errFiles = errFiles;
        angular.forEach(files, function (file) {
            file.upload = Upload.upload({
                url: 'admin/product/addImages',
                data: {file: file}
            });

            file.upload.then(function (response) {
                $timeout(function () {
                    file.result = response.data;
                });
            }, function (response) {
                if (response.status > 0)
                    $scope.errorMsg = response.status + ': ' + response.data;
            }, function (evt) {
                file.progress = Math.min(100, parseInt(100.0 *
                evt.loaded / evt.total));
            });
        });
    }

    $scope.getProducts = function () {
        $scope.loadingData = true;
        var getProductList = HttpSrvc.get('admin/product/getProducts');
        getProductList.then(
            function (response) {
                $scope.loadingData = false;
                $scope.products = response.data.data;
            },
            function (data) {
                // Handle error here
                $scope.loadingData = false;
                common.flashMsg('error', 'Products List: Error Occurred');
            }
        );
    }

    var url = $location.path();
    if (url.indexOf('new-product') <= 0) {
        $scope.getProducts();
    } else {
        common.flashMsg('info', 'Loading..Product Categories.');
        ProductSrvc.getCategories().then(function (data) {
            $scope.settings = data.data;
        });
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
            Opacity: 0,
            ShirtStyle: [],
            Shine: 0,
            WrinkleResistance: 0,
            CustomType: []
        };
    }


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

    }

    $scope.addColor = function (arr, valueIs) {
        $scope.addProduct[arr] = [];
        $scope.addProduct[arr] = valueIs;
    }

    $scope.pic = [];
    $scope.addPic = function (valueIs) {
        $scope.pic.push(valueIs);
        console.log($scope.pic);
    }
});