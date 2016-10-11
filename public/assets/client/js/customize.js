var baseUrl = $('#baseUrl').val();
$(document).ready(function (e) {

    // Save data in Session - Style/Size Page
    $('.nextSection').click(function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
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
                $(this).addClass('disableNextPrev');
                $(this).next().addClass('disableNextPrev');
            },
            success: function (result) {
                result = JSON.parse(result);
                //alert(result.message);
                $(this).removeClass('disableNextPrev');
                $(this).next().removeClass('disableNextPrev');
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

    // Make All Same Style
    $('.makeAllSame').click(function () {
        if ($(this).hasClass('makeAllSameInactive')) {
            //$(this).text('Design Each Shirt Differently');
            $(this).find('.fa').addClass('fa-check').removeClass('fa-times');
            $(this).addClass('makeAllSameActive').removeClass('makeAllSameInactive');
            $('.swathces_images li').addClass('activeSwatchAllSame');
            $('.active_swatch').addClass('dummy').removeClass('active_swatch');
            $('#makeSame').val('yes');
        } else {
            //$(this).text('Make All Same');
            $(this).find('.fa').addClass('fa-times').removeClass('fa-check');
            $(this).addClass('makeAllSameInactive').removeClass('makeAllSameActive');
            $('.swathces_images li').removeClass('activeSwatchAllSame');
            $('.dummy').addClass('active_swatch').removeClass('dummy');
            $('#makeSame').val('no');
        }

    });

    // Previous Section on Size/Measurement Page
    $('.previousSection').click(function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
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

    // Change Front Style on Tuxedo
    $('input[type=radio][name=shirtType]').change(function () {
        if (this.value == 'Tuxedo') {
            $('.frontTuxedo').removeClass('hide');
            $('.frontDressCasual').addClass('hide');
        }
        else {
            $('.frontTuxedo').addClass('hide');
            $('.frontDressCasual').removeClass('hide');
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
        if ($('[name="chooseFab[]"]:checked').length > 0) {
            $('.nextBtnCustomize').removeClass('disableNextToCustomize');
        }
    });

    //Un-select check
    $('.chkFab').change(function () {
        if ($('[name="chooseFab[]"]:checked').length > 0) {
            $('.nextBtnCustomize').removeClass('disableNextToCustomize');
        } else {
            $('.nextBtnCustomize').addClass('disableNextToCustomize');
        }
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

    var colorCombo = [];
    colorCombo['Blue'] = ['Royal Blue', 'Light Blue', 'Navy', 'French Blue'];
    colorCombo['Gray'] = ['Light Gray'];
    colorCombo['Red'] = ['Burgundy'];
    /* Fabric Page Filters Price Sort,Color && Pattern Type*/
    var filterProducts = {
        choosePattern: "element-item",
        chooseColor: [],
        choosePriceSort: null,
        passProducts: [],
        filterExec: function () {

            // Reset Filters
            $('.productGallery li').removeClass('Show');
            $('.productGallery li').removeClass('Hide');
            $('.productGallery li').removeClass('secondTestPass');

            // Check Patterns if has, will passed First Test
            $('.productGallery li').each(function (key, value) {
                if ($(this).hasClass(filterProducts.choosePattern)) {
                    $(this).addClass('firstTestPass');
                }
            });

            // If Color filter On, will check Color and Pass Second Test
            if (filterProducts.chooseColor.length > 0) {
                $('.productGallery .firstTestPass').each(function () {
                    var getColors = $(this).attr("data-color").split(",");
                    var ele = $(this);
                    var find = false;
                    $.each(filterProducts.chooseColor, function (key) {
                        if (getColors.indexOf(filterProducts.chooseColor[key]) >= 0) {
                            if (!find) {
                                ele.addClass("secondTestPass");
                                find = true;
                            }
                        }
                    });
                });
            } else {
                $('.productGallery .firstTestPass').addClass("secondTestPass");
            }

            // Remove First Test Check
            $('.productGallery .secondTestPass').removeClass('firstTestPass');

            // Sort By Price, High to Low && Low to High
            if (filterProducts.choosePriceSort !== null) {
                if (filterProducts.choosePriceSort == "LH") {
                    var $wrapper = $('.productGallery');
                    $wrapper.find('li').sort(function (a, b) {
                        return +a.dataset.percentage - +b.dataset.percentage;
                    }).appendTo($wrapper);
                } else {
                    var $wrapper = $('.productGallery');
                    $wrapper.find('li').sort(function (a, b) {
                        return +b.dataset.percentage - +a.dataset.percentage;
                    }).appendTo($wrapper);
                }
            }

            // Do Fun - Add Show Class
            $('.productGallery .secondTestPass').each(function () {
                var getColors = $(this).addClass("Show");
            });

            // Hide Other element, which don't Pass test
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
        }, resetFilter: function () {
            filterProducts.choosePattern = "element-item";
            filterProducts.chooseColor = [];
            filterProducts.choosePriceSort = null;
            filterProducts.passProducts = [];

            $('#filterPattern').val('All');
            $('#filterPattern').siblings('span').text('All');

            $('#sortByPrice option[value="Default"]').prop('selected', true);
            $('#sortByPrice').siblings('span').text('Price');

            $('.colorFilter').find('.fa').css('visibility', 'hidden');
            $('.colorFilter').removeClass('selected');

            filterProducts.filterExec();
        }
    };

    /* Filter by Pattern */
    $('#filterPattern').change(function (e) {
        var active = $(this).val();
        filterProducts.choosePattern = "element-item";
        if (active !== 'All') {
            filterProducts.choosePattern = active;
        }
        filterProducts.filterExec();
    });

    /* Sort By Price */
    $('#sortByPrice').change(function (e) {
        var activePriceSort = $(this).val();
        filterProducts.choosePriceSort = "element-item";
        if (activePriceSort !== 'Default') {
            filterProducts.choosePriceSort = activePriceSort;
        }
        filterProducts.filterExec();
    });

    /* Color Filters: Click add to array and Filter exec */
    $('.colours_pickers li').click(function () {
        var val = $(this).find('span:last').text();
        if (!$(this).hasClass('selected')) {
            var getCombo = (typeof colorCombo[val] !== typeof undefined) ? colorCombo[val] : [];
            if (getCombo.length > 0) {
                for (i = 0; i < getCombo.length; i++) {
                    filterProducts.chooseColor.push(getCombo[i]);
                }
            }
            filterProducts.chooseColor.push(val);
            $(this).find('.fa').css('visibility', 'visible');
            $(this).addClass('selected');
        } else {
            var getCombo = (typeof colorCombo[val] !== typeof undefined) ? colorCombo[val] : [];
            if (getCombo.length > 0) {
                for (i = 0; i < getCombo.length; i++) {
                    filterProducts.removeByValue(filterProducts.chooseColor, getCombo[i]);
                }
            }
            filterProducts.removeByValue(filterProducts.chooseColor, val);
            $(this).find('.fa').css('visibility', 'hidden');
            $(this).removeClass('selected');
        }
        console.log(filterProducts.chooseColor);
        filterProducts.filterExec();
    });

    // Check Auto Filter - Tuxedo
    if ($('#autoFilter').length > 0 && $('#autoFilter').val().length > 0) {
        filterProducts.chooseColor.push('White');
        $('.whiteFilter').find('.fa').css('visibility', 'visible');
        $('.whiteFilter').addClass('selected');
        filterProducts.filterExec();
    }

    //reset Filter
    $('#showAll').click(function () {
        filterProducts.resetFilter();
    });

    /* END: Fabric Page Filters Price Sort,Color && Pattern Type*/

    // ----------------------------Cart JS----------------------------//
    var Cart = {
        discountPercentage: 0,
        giftAmount: 0,
        ShipMethod: "USPS Priority",
        USPSPriority: [9.50, 13.50, 16.50, 23.50, 29.50, 32.50, 35.50, 37.50, 39.50, 40.50, 55.50],
        USPSNextDay: [25, 35, 40, 65, 65, 65, 95],
        //International: [25, 38, 45, 45, 45, 75, 75, 75, 150],
        International: [],
        calShipCharges: function () {
            var getQty = 0;
            var charges = 0;
            $('input[name^="ProductQty"]').each(function () {
                getQty += parseInt($(this).val());
            });
            if (Cart.ShipMethod == "USPS Priority") {
                charges = (typeof Cart.USPSPriority[getQty - 1] !== typeof undefined) ? Cart.USPSPriority[getQty - 1] : 55.50;
            } else if (Cart.ShipMethod == "USPS Next Day") {
                charges = (typeof Cart.USPSNextDay[getQty - 1] !== typeof undefined) ? Cart.USPSNextDay[getQty - 1] : 95;
            } else {
                charges = (typeof Cart.International[getQty - 1] !== typeof undefined) ? Cart.International[getQty - 1] : 125;
            }
            //alert('Is ' + Cart.ShipMethod + ' Charges' + charges);
            $('#ShippingHidden').val();
            return charges;
        }, updateQty: function (e) {
            var qty = $(e).val();
            $(e).next().val(qty);
            $('.updateCart').removeClass('disableUpdateCart');
            $('.saveChangesMsg').removeClass('hide');
            var actualPrice = $(e).closest('.q_colmn_list').siblings('.price_colmn_list').find('.ActualPrice').text();
            var price = (qty * actualPrice).toFixed(2);
            $(e).closest('.q_colmn_list').siblings('.total_colmn_list').find('.TotalProductPrice').text(price);
        }, updateCart: function () {

            var total = 0;
            $('.cartItems li').each(function () {
                total += parseFloat($(this).find('.TotalProductPrice').text().trim().replace(',', ''));
            });
            $('#SubTotal').text(total.toFixed(2));

            // apply discount
            if (!$('.showDiscountDetail').hasClass('hide')) {
                var getDiscount = parseFloat($('#DiscountAmount').text());
                total = total - getDiscount;
            }


            //apply gift card
            if (!$('.showGCardDetail').hasClass('hide')) {
                var giftCard = parseFloat($('#GiftCardAmount').text());
                total = total - giftCard;
            }

            // apply shipment charges
            var getShipCharges = Cart.calShipCharges();
            $('#ShippCharges').text(getShipCharges);
            var TotalPlusShip = (total + getShipCharges).toFixed(2);

            // set amount
            $('#TotalAmount').text(TotalPlusShip);
            $('#TotalAmountHidden').val(TotalPlusShip);
        }, applyDiscount: function () {
            var total = 0;
            $('.cartItems li').each(function () {
                total += parseFloat($(this).find('.TotalProductPrice').text().trim().replace(',', ''));
            });
            //alert(total);
            var getDiscount = parseFloat($('#DiscountAmount').text());
            var calcDiscunt = (total * Cart.discountPercentage) / 100;
            $('#setDiscountAmount').val(calcDiscunt);
            getDiscount = getDiscount + calcDiscunt;
            $('#DiscountAmount').text(getDiscount.toFixed(2));
            $('#offerType').val('Discount');
            Cart.updateCart();
        }, applyGiftCard: function () {
            $('#GiftCardAmount').text(Cart.giftAmount);
            $('#setDiscountAmount').val(Cart.giftAmount);
            $('#offerType').val('Gift');
            Cart.updateCart();
        }
    };

    $('.updateQty').change(function (e) {
        if ($(this).val() <= 0) {
            $(this).val(1);
            return false;
        }
        Cart.updateQty(this);
        Cart.updateCart();
    });

    $('#ShipMethod').change(function (e) {
        Cart.ShipMethod = $(this).val();
        $('#ShippingMethodHidden').val($(this).val());
        Cart.updateCart();
    });

    // Change Country in Cart
    $('#slctCountry').change(function (e) {
        var cntry = $(this).val();
        if (cntry == 'US') {
            $('#ShipMethod option[value="USPS Priority"]').prop('disabled', false);
            $('#ShipMethod option[value="USPS Next Day"]').prop('disabled', false);
            $('#ShipMethod option[value="International Global Priority"]').prop('disabled', true);
        } else {
            $('#ShipMethod option[value="USPS Priority"]').prop('disabled', true);
            $('#ShipMethod option[value="USPS Next Day"]').prop('disabled', true);
            $('#ShipMethod option[value="International Global Priority"]').prop('disabled', false);
        }
    });

    $('.updateCart').click(function () {
        var Qty = new Array();
        var token = $('#_token').val();
        $('input[name^="ProductQty"]').each(function () {
            Qty.push($(this).val());
        });

        $.ajax({
            context: this,
            type: "POST",
            url: "" + baseUrl + "/cart/update",
            data: "Qty=" + Qty + "&_token=" + token,
            beforeSend: function () {
                $('.updateCartSpin').removeClass('hide');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.response + 'error ' + ajaxOptions);
            },
            success: function (result) {
                $('.updateCartSpin').addClass('hide');
                $(this).addClass('disableUpdateCart');
                $('.saveChangesMsg').addClass('hide');
                $('.saveChangesSuccesMsg').removeClass('hide');
                $('.saveChangesSuccesMsg').delay(2000).fadeOut(function () {
                    $('.saveChangesSuccesMsg').addClass('hide');
                });
            }

        });
    });

    // Apply Discount Coupon
    $('#checkDiscountCoupon').click(function () {
        var code = $('#discountCoupon').val();
        var token = $('#_token').val();
        $('#setCoupon').val(code);
        $.ajax({
            type: "POST",
            url: "" + baseUrl + "/verifyDiscountCoupon",
            data: "discountCoupon=" + code + "&_token=" + token,
            beforeSend: function () {
                $('.updateCartSpin').removeClass('hide');
                $('#waitDCounpon').removeClass('hide');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.response + 'error ' + ajaxOptions);
            },
            success: function (result) {
                $('.updateCartSpin').addClass('hide');
                $('#waitDCounpon').addClass('hide');
                result = JSON.parse(result);
                if (result.status) {
                    var discountPercentage = result.discount;
                    $('.showDiscountDetail').removeClass('hide');
                    Cart.discountPercentage = discountPercentage;
                    Cart.applyDiscount();
                    $('.applyGCardHere').addClass('hide');
                    $('.SuccesCouponMsg').removeClass('hide');
                    $('.SuccesCouponMsg').removeAttr('style');
                    $('.SuccesCouponMsg').delay(2000).fadeOut(function () {
                        $('.SuccesCouponMsg').addClass('hide');
                    });
                } else {
                    $('.errorCoupon').removeClass('hide');
                    $('.errorCoupon').removeAttr('style');
                    $('.errorCoupon').delay(2000).fadeOut(function () {
                        $('.errorCoupon').addClass('hide');
                    });
                }
            }

        });
    });

    // Apply Gift Card Here
    $('#checkGiftCardCoupon').click(function () {
        var code = $('#giftCoupon').val();
        var token = $('#_token').val();
        $('#setCoupon').val(code);
        $.ajax({
            type: "POST",
            url: "" + baseUrl + "/verifyGiftCoupon",
            data: "giftCoupon=" + code + "&_token=" + token,
            beforeSend: function () {
                $('.updateCartSpin').removeClass('hide');
                $('#waitGCounpon').removeClass('hide');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.response + 'error ' + ajaxOptions);
            },
            success: function (result) {
                $('.updateCartSpin').addClass('hide');
                $('#waitGCounpon').addClass('hide');
                result = JSON.parse(result);
                if (result.status) {
                    var discountPercentage = result.discount;
                    $('.showGCardDetail').removeClass('hide');
                    Cart.giftAmount = discountPercentage;
                    Cart.applyGiftCard();
                    $('.applyDiscountHere').addClass('hide');
                    $('.SuccesCouponMsg').removeClass('hide');
                    $('.SuccesCouponMsg').removeAttr('style');
                    $('.SuccesCouponMsg').delay(2000).fadeOut(function () {
                        $('.SuccesCouponMsg').addClass('hide');
                    });
                } else {
                    $('.errorCoupon').removeClass('hide');
                    $('.errorCoupon').removeAttr('style');
                    $('.errorCoupon').delay(2000).fadeOut(function () {
                        $('.errorCoupon').addClass('hide');
                    });
                }
            }

        });
    });

    // ----------------------------Cart JS END----------------------------//

    // ---------------------------Gift Card----------------------------//
    $('.chooseAmount li').on("click", function () {
        $('.chooseAmount li').removeClass('active');
        $(this).addClass('active');
        $('#giftAmount').val($(this).attr('id'));
        $('#giftAmountSet').text($(this).attr('id'));
        $('#giftAmountText').val($(this).attr('id'));
    });

    $('#nextToPayment').click(function () {
        $('#recNameSet').text($('#recName').val());
        $('#fromNameSet').text($('#purchaseName').val());
        $('#giftAmountSet').text($('#giftAmount').val());
        $('#giftAmountText').val($('#giftAmount').val());

        $('.giftCardTab .tab li a').removeClass('active');
        $('.giftCardTab .tabcontent').css('display', 'none');

        $('#Paris').css('display', 'block');
        $('#finishStep').addClass('active');
    });

    $('#testIt').click(function () {
        html2canvas(document.body, {
            onrendered: function (canvas) {
                var canvasImg = canvas.toDataURL("image/jpg");
                console.log(canvasImg);
                $('#setImage').prop('src', canvasImg);
            }
        });
    });

    $('#testIt2').click(function () {
        var imgData = $('#setImage').attr('src');
        var doc = new jsPDF();

        doc.setFontSize(40);
        doc.text(35, 25, "Paranyan loves jsPDF");
        doc.addImage(imgData, 'JPEG', 15, 40, 180, 160);
        doc.save('sample-file.pdf');
    });

    $('.generatePdf').click(function () {
        var id = $(this).attr('id');
        $(this).siblings('.updateCartSpin').addClass('dummy');
        $.ajax({
            context:this,
            type: "GET",
            url: "" + baseUrl + "/generate-invoice/" + id,
            beforeSend: function () {
                $('.dummy').removeClass('hide');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.response + 'error ' + ajaxOptions);
            },
            success: function (result) {

                result = JSON.parse(result);
                var html = '';
                var orderID = '';
                if (result.status) {
                    var subTotal = 0;
                    var discount = 0;
                    var total = 0;
                    var shipping = 0;
                    $.each(result.data, function (value, key) {
                        OrderID = result.data[value]['OrderID'];
                        var fabricPrice = parseFloat(result.data[value]['FabricPrice']).toFixed(2);
                        var fabricTotal = parseFloat(result.data[value]['FabricPrice'] * result.data[value]['Qty']).toFixed(2);
                        discount = parseFloat(result.data[value]['Discount']);
                        shipping = parseFloat(result.data[value]['Shiping']);
                        subTotal += parseFloat(fabricTotal);
                        html += '<li class="clearfix"><div class="shirt_colmn_list">' +
                            '<img src="resources/assets/images/' + result.data[value]['Image'] + '" alt="#"/></div>' +
                            '<div class="product_colmn_list">' +
                            '<label>' + result.data[value]['Name'] + '</label></div>' +
                            '<div class="product_colmn_list price_colmn_list">' +
                            '<b>$' + fabricPrice + '</b></div>' +
                            '<div class="product_colmn_list q_colmn_list">' +
                            '<input type="number" value="' + result.data[value]['Qty'] + '"/></div>' +
                            '<div class="product_colmn_list total_colmn_list">' +
                            '<h5>$' + fabricTotal + '</h5></div></li>';

                    });
                    total = parseFloat((subTotal + shipping) - discount);
                    $('#setSubTotal').text(subTotal.toFixed(2));
                    $('#setDiscount').text(discount.toFixed(2));
                    $('#setShipping').text(shipping.toFixed(2));
                    $('#setTotal').text(total.toFixed(2));
                    $('#setOrderID').text(OrderID);
                    $('#appendElements').append(html);
                    var divHeight = $('#pdfInvoice').height();
                    var divWidth = $('#pdfInvoice').width();
                    var ratio = divHeight / divWidth;
                    html2canvas($('#pdfInvoice'), {
                        onrendered: function (canvas) {
                            $('.dummy').addClass('hide');
                            $('.dummy').removeClass('dummy');
                            var canvasImg = canvas.toDataURL("image/jpg");
                            //$('#SetImage').prop('src', canvasImg);
                            var imgData = canvasImg;
                            var doc = new jsPDF();
                            var width = doc.internal.pageSize.width;
                            var height = doc.internal.pageSize.height;
                            height = ratio * width;
                            doc.setFontSize(30);
                            //doc.text(35, 25, "Men's Custom Tailor - Invoice " + OrderID);
                            doc.addImage(imgData, 'JPEG', 5, 5, width-20, height);
                            doc.save('mct-invoice.pdf');
                            $('#appendElements').empty();
                        }
                    });
                } else {
                    $('.dummy').addClass('hide');
                    $('.dummy').removeClass('dummy');
                }
            }

        });
    });


});