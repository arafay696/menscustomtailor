var baseUrl = $('#baseUrl').val();
$(document).ready(function (e) {

    // Save data in Session - Style/Size Page
    $('.nextSection').click(function () {
        var hasNext = false;
        if ($('.customize_slider .active-customize').next().length > 0) {
            hasNext = true;
        }
        $.ajax({
            context: this,
            type: "POST",
            data: $('.customize_slider .active-customize').find('form').serialize(),
            url: baseUrl + "/fabric/customize",
            beforeSend: function () {
                $('.savingCustomize').css('display', 'block');
            },
            success: function (result) {
                //console.log(result);
                $('.savingCustomize').css('display', 'none');
                if (hasNext) {
                    $('.customize_slider .active-customize').addClass('in');
                    $('.customize_slider .in').animate({marginLeft: "-1000px", opacity: 0}, 800, "linear", function () {
                        $('.customize_slider .active-customize').next().addClass('active-customize');
                        $(this).removeAttr('style');
                        $('.customize_slider .in').removeClass('active-customize');
                        $('.customize_slider .in').removeClass('in');
                    });
                } else {
                    window.location.href = baseUrl + '/cart';
                }
            }, error: function () {
                alert('Error Occured');
            }
        });

    });

    // Previous Section on Size/Measurement Page
    $('.previousSection').click(function () {
        if ($('.customize_slider .active-customize').prev().length > 0) {
            $('.customize_slider .active-customize').addClass('in');
            $('.customize_slider .in').animate({marginLeft: "1000px", opacity: 0}, 800, "linear", function () {
                $(this).removeAttr('style');
                $('.customize_slider .active-customize').prev().addClass('active-customize');
                $('.customize_slider .in').removeClass('active-customize');
                $('.customize_slider .in').removeClass('in');
            });
        }
    });

    // ------------------------ MY JS --------------------------------- //
    /*
     * Close Session Output
     * */
    $('.closeSessionOutput').click(function () {
        if ($(this).closest('div').hasClass('errorMsgs')) {
            $('.errorMsgs,.successMsgs').stop(true, true).fadeOut();
        } else if ($(this).closest('div').hasClass('successMsgs')) {
            $('.errorMsgs,.successMsgs').stop(true, true).fadeOut();
        } else {
            $(this).closest('.alert').slideUp('slow');
        }
    });

    /*
     * ------ Error Msg or Success Message timeout after 8seconds
     *
     * */
    if ($('.errorMsgs,.successMsgs').is(':visible')) {
        $('.errorMsgs,.successMsgs').delay(2000).fadeOut();
    }

    /*
     * --- Add Return URL
     *
     * */

    $('#top_login').click(function () {
        getUrl = window.location.href;

        if (getUrl.indexOf('auth/login') > 0) {
            //alert('dont add');
        } else {
            $(this).attr('href', baseUrl + '/login?returnUrl=' + encodeURIComponent(getUrl))
        }
    });

    // Select Shirt on click on Fabric - Fabric Page
    $('.selectFabric').click(function () {
        $(this).siblings('.check_quentity').find('label').addClass('active');
        $(this).siblings('.check_quentity').find('.chkFab').prop('checked', true);
    });

});