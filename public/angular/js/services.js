angular.module('mct.services', [])

    .factory('common', function ($q, $http) {
        return {
            // Find in Array by Value
            findByValue: function (input, fieldName, fieldValue) {
                var i = 0, len = input.length;
                for (; i < len; i++) {
                    if (input[i][fieldName] === fieldValue) {
                        return true;
                    }
                }
                return false;
            }
        };
    })

    .service('HttpSrvc', function ($http) {
        return {
            get: function (url) {
                // $http returns a promise
                var getPromise = $http.get(url);
                // Return the promise to the controller
                return getPromise;
            },
            post: function (url, data) {
                var postPromise = $http.post(url, data);
                return postPromise;
            }
        };

    })

    .factory('ProductSrvc', function (HttpSrvc, $timeout) {

        var ProductSrvc = {
            branches: null,
            init: function () {
                return true;
            },
            getCategories: function () {
                HttpSrvc.get('admin/product/getSettings');
            },
            flashMsg: function (msgType, msg) {
                var change = 'errorMsg';
                switch (msgType) {
                    case 'success':
                        change = 'successMsg';
                        break;
                    case 'info':
                        change = 'infoMsg';
                        break;
                    default:
                        change = 'errorMsg';
                        break;
                }
                $('.flashMsg').addClass(change);
                var ele = $('.' + change);
                ele.empty();
                ele.fadeIn('slow');
                ele.html(msg);
                $timeout(function () {
                    ele.fadeOut(1000);
                    $('.flashMsg').removeClass(change);
                }, 4000);
            },
            getKeyByValue: function (findArray, findBy, value) {
                var getKey = null;
                angular.forEach(findArray, function (val, key) {
                    if (val[findBy] === value) {
                        getKey = key;
                    }
                });
                return getKey;
            }
        };

        return ProductSrvc;
    });
