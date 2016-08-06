var baseUrl = $('#baseUrl').val();
$(document).ready(function (e) {
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
            },
            success: function (result) {
                console.log(result);
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
});