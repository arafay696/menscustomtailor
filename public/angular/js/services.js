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
                return HttpSrvc.get('admin/product/getSettings');
            },
            addProduct: function (url, data) {
                return HttpSrvc.post(url, data);
            },
            flashMsg: function (msgType, msg) {
                var change = 'errorMsg';
                switch (msgType) {
                    case 'success':
                        change = 'successMsg';
                        $('.flashMsg').addClass('successMsg');
                        $('.flashMsg').addClass('alert-success');
                        break;
                    case 'info':
                        change = 'infoMsg';
                        $('.flashMsg').addClass('infoMsg');
                        $('.flashMsg').addClass('alert-info');
                        break;
                    default:
                        change = 'errorMsg';
                        $('.flashMsg').addClass('errorMsg');
                        $('.flashMsg').addClass('alert-danger');
                        break;
                }

                var ele = $('.' + change);
                ele.find('.changeText').empty();
                ele.fadeIn('slow');
                ele.find('.changeText').html(msg);
                $timeout(function () {
                    ele.fadeOut(1000);
                    if(change === 'successMsg'){
                        $('.flashMsg').removeClass('successMsg');
                        $('.flashMsg').removeClass('alert-success');
                    }else if(change === 'infoMsg'){
                        $('.flashMsg').removeClass('infoMsg');
                        $('.flashMsg').removeClass('alert-info');
                    }else {
                        $('.flashMsg').removeClass('errorMsg');
                        $('.flashMsg').removeClass('alert-danger');
                    }

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
