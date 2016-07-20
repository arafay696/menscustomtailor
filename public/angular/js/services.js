var serviceapp = angular.module('mct.services', [])

serviceapp.factory('common', function ($q, $http) {
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
        },
    };
})
