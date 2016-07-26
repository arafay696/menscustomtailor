'use strict';
var mutifilters = angular.module('mct.filters', []);

mutifilters.filter('titleCase', function() {
    return function(input) {
        input = input || '';
        return input.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    };
});

mutifilters.filter('capitalize', function () {
    return function (input, all) {
        var reg = (all) ? /([^\W_]+[^\s-]*) */g : /([^\W_]+[^\s-]*)/;
        return (!!input) ? input.replace(reg, function (txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }) : '';
    }
});

mutifilters.filter('formatToDate', function () {

    function formatTime(formatToTime) { // birthday is a date

        if (typeof(formatToTime) == "undefined" || formatToTime === null) {
            return '';
        }

        var today = null;
        var t = formatToTime.split(/[- :]/);
        var currentTime = new Date(t[0], t[1] - 1, t[2], t[3], t[4], t[5]);
        var Month = new Array("January", "February", "March",
            "April", "May", "June", "July", "August", "September",
            "October", "November", "December");
        var Suffix = new Array("th", "st", "nd", "rd", "th", "th", "th", "th", "th", "th");
        var day = currentTime.getDate();
        var month = currentTime.getMonth();
        var year = currentTime.getFullYear();
        if (day % 100 >= 11 && day % 100 <= 13)
            today = day + "th";
        else
            today = day + Suffix[day % 10];

        return today + " " + Month[month] + " " + year;
    }

    return function (formatToTime) {
        return formatTime(formatToTime);
    };
});
