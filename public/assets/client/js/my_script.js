$(document).ready(function (e) {


    $('.customselect select').change(function (e) {
        var menuVal = $(this).val();
        $(this).parent().find('span').text(menuVal);
        return false
    })


    $('.customselect_customize select').change(function (e) {
        var menuVal = $(this).val();
        $(this).parent().find('span').text(menuVal);
        return false
    })

    $(".cart_div a").click(function () {
        $(".mobile_cart_section").slideToggle();
        $(".cart_div a b").toggle();
    });

    $("a.icon_search").click(function () {
        $(".search_div").fadeIn();
        $(".card_popup").slideUp();
    });

    $(".search_div a").click(function () {
        $(".search_div").fadeOut();
    });


    $("a.icon_cart").click(function () {
        $(".card_popup").slideToggle();
        $(".search_div").fadeOut();
    });


    $(".menuIcon").click(function () {
        $(".mens_menu").fadeIn();

    });

    $(".mens_menu b").click(function () {
        $(".mens_menu").fadeOut();
    });


    $(".login_profile a").click(function () {
        $(".login_profile ul").fadeToggle();

    });


    $(".artistProducer label").click(function (e) {
        $(".artistProducer label").removeClass('select');
        $(this).addClass('select');
    });


    $(".servicesTerm label,.whiteCollar label,.whiteCuff label").click(function (e) {
        $(this).toggleClass('active');
    });




});
$(window).scroll(function () {
    var sticky = $('.header, #wrapper')
    scroll = $(window).scrollTop();
    if (scroll >= 150) {
        sticky.addClass('fixed');
        setTimeout(function () {
            sticky.addClass('animate');
        }, 100)
    } else {
        sticky.removeClass('fixed animate');
    }
});
	