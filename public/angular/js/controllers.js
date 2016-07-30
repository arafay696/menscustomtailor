mct.controller('BaseCtrl', function ($scope, HttpSrvc, common, $location, $window) {
    $("body").find('#side-menu').metisMenu();

    $scope.checkUserLogin = function () {
        common.flashMsg('info', 'Checking User Login Status.');
        var getUserList = HttpSrvc.get('admin/user/checkUserLogin');
        getUserList.then(
            function (response) {
                response = response.data;
                if (!response.userLogin) {
                    $location.path('/admin/auth/login');
                }
                $scope.loginUser = response.user;
                $window.localStorage.setItem('userID', $scope.loginUser.userId);
            },
            function (data) {
                // Handle error here
                $scope.loadingData = false;
                common.flashMsg('error', 'Users List: Error Occurred');
            }
        );
    }

    $scope.checkUserLogin();
});

mct.controller('DashboardCtrl', function ($scope) {

});

mct.controller('ProductCtrl', function ($route, $routeParams, $window, $scope, HttpSrvc, ProductSrvc, common, Upload, $timeout, $location) {

    $scope.uploadPic = function (file, zoom, productID) {
        console.log(zoom);
        file.upload = Upload.upload({
            url: 'admin/product/addImages',
            data: {file: file, zoomImg: zoom, product: productID}
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
    $scope.addProductRequest = function () {
        $scope.updateData = true;

        ProductSrvc.addProduct('admin/product/add-product', $scope.addProduct).then(
            function (response) {
                $scope.updateData = false;
                response = response.data;
                var productID = response.product;
                angular.forEach($scope.pic, function (val) {
                    $scope.uploadPic(val['pic'], val['zoomImg'],productID);
                });
                if (response.status) {
                    common.flashMsg('success', 'Product Added.');
                    $location.path('/product/products');
                } else {
                    common.flashMsg('error', response.msg);
                }

            },
            function (data) {
                // Handle error here
                $scope.updateData = false;
                common.flashMsg('error', 'Product Failed.');
            }
        );
        //console.log($scope.addProduct);
    }

    $scope.editProductRequest = function () {
        //console.log($scope.editProduct);
        //return false;

        $scope.updateData = true;
        HttpSrvc.post('admin/product/edit/' + $scope.productID, $scope.editProduct).then(
            function (response) {
                $scope.updateData = false;
                response = response.data;
                var productID = response.product;
                angular.forEach($scope.pic, function (val) {
                    console.log(val['zoomImg']);
                    $scope.uploadPic(val['pic'], val['zoomImg'],productID);
                });
                if (response.status) {
                    common.flashMsg('success', 'Product Updated.');
                    $location.path('/product/products');
                } else {
                    common.flashMsg('error', response.msg);
                }

            },
            function (data) {
                // Handle error here
                $scope.updateData = false;
                common.flashMsg('error', 'Product Failed.');
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

    $scope.getMPName = function (refID) {
        var value = null;
        angular.forEach($scope.relationNames, function (val) {
            if (val['ID'] === refID) {
                value = val['Name'];
                $scope.tempName = value;
                if (value === 'Threadcount' || value === 'Thickness' || value === 'Opacity' || value === 'Shine' || value === 'Wrinkle Resistance') {
                    $scope.find = false;
                } else {
                    $scope.find = true;
                }

            }
        });
    }

    $scope.getProductByID = function () {
        $scope.loadingData = true;
        var getProductList = HttpSrvc.get('admin/product/product/' + $scope.productID);
        getProductList.then(
            function (response) {
                $scope.loadingData = false;
                $scope.editProduct = response.data.data[0];
                $scope.editProductItems = response.data.data;
                $scope.relationNames = response.data.relation;
                angular.forEach($scope.editProductItems, function (val) {
                    if (val['PdRefTable'] === 'CP') {
                        $scope.getMPName(val['PdRefID']);
                        if (!$scope.find) {
                            $scope.tempName = $scope.tempName.replace(/\s/g, '');
                            if (typeof $scope.editProduct[$scope.tempName] === typeof undefined) {
                                $scope.editProduct[$scope.tempName] = val['PdRefID'];
                            }
                        } else {
                            name = $scope.tempName.replace(/\s/g, '');
                            if (typeof $scope.editProduct[name] === typeof undefined) {
                                $scope.editProduct[name] = [];
                                $scope.editProduct[name].push(val['PdRefID']);
                            } else {
                                if ($scope.editProduct[name].indexOf(val['PdRefID']) < 0) {
                                    $scope.editProduct[name].push(val['PdRefID']);
                                }
                            }
                        }

                    } else {
                        if (typeof $scope.editProduct[val['PdRefTable']] === typeof undefined) {
                            $scope.editProduct[val['PdRefTable']] = [];
                        }

                        if ($scope.editProduct[val['PdRefTable']].indexOf(val['PdRefID']) < 0) {
                            $scope.editProduct[val['PdRefTable']].push(val['PdRefID']);
                        }
                    }

                });
                console.log($scope.editProduct);
            },
            function (data) {
                // Handle error here
                $scope.loadingData = false;
                common.flashMsg('error', 'Products List: Error Occurred');
            }
        );
    }

    $scope.addColorForEdit = function (arr, valueIs) {
        $scope.editProduct[arr] = [];
        $scope.editProduct[arr] = valueIs;

    }

    $scope.checkCategory = function (PdRefID, PdRefTable, id) {
        var find = false;
        angular.forEach($scope.editProductItems, function (val) {
            if (val[PdRefID] === id && val['PdRefTable'] === PdRefTable && !find) {
                find = true;
            }
        });

        return find;
    }

    var url = $location.path();
    if (url.indexOf('new-product') > 0) {
        common.flashMsg('info', 'Loading..Product Categories.');
        ProductSrvc.getCategories().then(function (data) {
            $scope.settings = data.data;
        });
        $scope.addProduct = {
            MerchantID: $window.localStorage.getItem('userID'),
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
    } else if (url.indexOf('editProduct') > 0) {
        ProductSrvc.getCategories().then(function (data) {
            $scope.settings = data.data;
        });
        $scope.productID = $routeParams.id;
        $scope.getProductByID();
    } else {
        $scope.getProducts();
    }

    $scope.deleteProduct = function (id) {
        common.flashMsg('info', 'Processing Request...!');
        var deleteUser = HttpSrvc.get('admin/product/delete/' + id);
        deleteUser.then(
            function (response) {
                response = response.data;
                if (response.status) {
                    common.flashMsg('success', 'Product Deleted.');
                    $route.reload();
                }
            },
            function (data) {
                // Handle error here
                common.flashMsg('error', 'Product Delete: Error Occurred');
            }
        );
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
    $scope.addPic = function (zoom, valueIs) {
        //$scope.pic.push(valueIs);
        $scope.pic.push({zoomImg: zoom, pic: valueIs});
        console.log($scope.pic);
    }
});


mct.controller('UserCtrl', function ($window, $scope, HttpSrvc, common, Upload, $timeout, $location, $route, $routeParams) {

    $scope.getUsers = function () {
        $scope.loadingData = true;
        var userID = $window.localStorage.getItem('userID');
        var getUserList = HttpSrvc.get('admin/user/getUsers/' + userID);
        getUserList.then(
            function (response) {
                $scope.loadingData = false;
                $scope.users = response.data.data;
            },
            function (data) {
                // Handle error here
                $scope.loadingData = false;
                common.flashMsg('error', 'Users List: Error Occurred');
            }
        );
    }

    $scope.getUserByID = function () {
        $scope.loadingData = true;
        var userID = $scope.editUserID;
        var getUserList = HttpSrvc.get('admin/users/user/' + userID);
        getUserList.then(
            function (response) {
                $scope.loadingData = false;
                $scope.editUser = response.data.data[0];
            },
            function (data) {
                // Handle error here
                $scope.loadingData = false;
                common.flashMsg('error', 'User Fetch: Error Occurred');
            }
        );
    }

    $scope.deleteUser = function (id) {
        common.flashMsg('info', 'Processing Request...!');
        var deleteUser = HttpSrvc.get('admin/user/delete/' + id);
        deleteUser.then(
            function (response) {
                response = response.data;
                if (response.status) {
                    common.flashMsg('success', 'User Deleted.');
                    $route.reload();
                }
            },
            function (data) {
                // Handle error here
                common.flashMsg('error', 'User Delete: Error Occurred');
            }
        );
    }

    $scope.getUserTypes = function () {
        $scope.loadingData = true;
        var getUserTypes = HttpSrvc.get('admin/user/get-types');
        getUserTypes.then(
            function (response) {
                $scope.loadingData = false;
                $scope.userTypes = response.data.merchants;
            },
            function (data) {
                // Handle error here
                $scope.loadingData = false;
                common.flashMsg('error', 'User Type List: Error Occurred');
            }
        );
    }

    $scope.addUserRequest = function () {

        $scope.updateData = true;
        HttpSrvc.post('admin/user/add-user', $scope.addUser).then(
            function (response) {
                $scope.updateData = false;
                response = response.data;
                if (response.status) {
                    common.flashMsg('success', 'User Added.');
                    $location.path('/user/users');
                } else {
                    common.flashMsg('error', response.msg);
                }

            },
            function (data) {
                // Handle error here
                $scope.updateData = false;
                common.flashMsg('error', 'User Failed.');
            }
        );

    }

    $scope.editUserRequest = function () {

        $scope.updateData = true;
        HttpSrvc.post('admin/user/edit/' + $scope.editUserID, $scope.editUser).then(
            function (response) {
                $scope.updateData = false;
                response = response.data;
                if (response.status) {
                    common.flashMsg('success', 'User Updated.');
                    $location.path('/user/users');
                } else {
                    common.flashMsg('error', response.msg);
                }

            },
            function (data) {
                // Handle error here
                $scope.updateData = false;
                common.flashMsg('error', 'User Failed.');
            }
        );

    }

    var url = $location.path();
    if (url.indexOf('new-user') > 0) {
        $scope.getUserTypes();
        $scope.addUser = {
            Name: '',
            Email: '',
            Password: '',
            RePassword: '',
            Company: 'Production',
            Phone: '',
            Type: 'Dealer',
            Address: '',
            City: '',
            State: '',
            Country: '',
            ZipCode: ''
        };

    } else if (url.indexOf('edit') > 0) {
        $scope.editUserID = $routeParams.id;
        $scope.getUserByID();
    } else {
        $scope.getUsers();
    }
});