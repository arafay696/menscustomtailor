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

    // Disable No. of Pocket Radio Button on No Pocket -
    $('input[type=radio][name=pocketStyle]').change(function () {
        if (this.value == 'No Pocket') {
            $('.selectPocketNo').css('display', 'none');
        }
        else {
            $('.selectPocketNo').css('display', 'block');
        }
    });

    // Disable Monogram Description Radio Button on No Monog -
    $('input[type=radio][name=monogramStyle]').change(function () {
        if (this.value == 'None') {
            $('.monogramDescription').css('display', 'none');
        }
        else {
            $('.monogramDescription').css('display', 'block');
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

    $('.sizeFitorNot').click(function () {
        $('.sizeFitorNot').removeClass('activeOption');
        $(this).addClass('activeOption');
        if ($(this).attr('id') == 'lastSizeFit') {
            $('#setCanChangeSize').val(0);
        } else {
            $('#setCanChangeSize').val(1);
        }
    });

    $('.continueStyling').click(function () {
        $('#myModal').css('display', 'none');
        if ($('#setCanChangeSize').val() == 0) {
            $('.canChangeSize select,.canChangeSize input').attr('disabled', 'disabled');
        }

    });

    var filterProducts = {
        choosePattern: "element-item",
        chooseColor: [],
        choosePrice: null,
        passProducts: [],
        filterExec: function () {
            $('.productGallery li').removeClass('Show');
            $('.productGallery li').removeClass('Hide');
            $('.productGallery li').removeClass('thirdTestPass');
            $('.productGallery li').each(function (key, value) {
                if ($(this).hasClass(filterProducts.choosePattern)) {
                    $(this).addClass('firstTestPass');
                }
            });

            if (filterProducts.choosePrice !== null) {
                $('.productGallery .firstTestPass').each(function () {
                    if ($(this).hasClass(filterProducts.choosePrice)) {
                        $(this).addClass("secondTestPass");
                    }
                });
            } else {
                $('.productGallery .firstTestPass').addClass("secondTestPass");
            }

            $('.productGallery li').removeClass('firstTestPass');

            if (filterProducts.chooseColor.length > 0) {
                $('.productGallery .secondTestPass').each(function () {
                    var getColors = $(this).attr("data-color").split(",");
                    var ele = $(this);
                    var find = false;
                    $.each(filterProducts.chooseColor, function (key) {
                        if (getColors.indexOf(filterProducts.chooseColor[key]) >= 0) {
                            if (!find) {
                                ele.addClass("thirdTestPass");
                                find = true;
                            }
                        }
                    });
                });
            } else {
                $('.productGallery .secondTestPass').addClass("thirdTestPass");
            }

            $('.productGallery li').removeClass('secondTestPass');

            $('.productGallery .thirdTestPass').each(function () {
                var getColors = $(this).addClass("Show");
            });

            $('.productGallery li').each(function () {
                if (!$(this).hasClass("Show")) {
                    $(this).addClass("Hide");
                }
            });

        }, removeByValue: function (arr) {
            var what, a = arguments, L = a.length, ax;
            while (L > 1 && arr.length) {
                what = a[--L];
                while ((ax = arr.indexOf(what)) !== -1) {
                    arr.splice(ax, 1);
                }
            }
            return arr;
        }
    };

    $('#filterPattern').change(function (e) {
        var active = $(this).val();
        filterProducts.choosePattern = "element-item";
        if (active !== 'All') {
            filterProducts.choosePattern = active;
        }
        filterProducts.filterExec();
    });

    $('.colours_pickers li').click(function () {
        var val = $(this).find('span:last').text();
        if (!$(this).hasClass('selected')) {
            filterProducts.chooseColor.push(val);
            $(this).find('.fa').css('visibility', 'visible');
            $(this).addClass('selected');
        } else {
            filterProducts.removeByValue(filterProducts.chooseColor, val);
            $(this).find('.fa').css('visibility', 'hidden');
            $(this).removeClass('selected');
        }
        filterProducts.filterExec();
    });


});