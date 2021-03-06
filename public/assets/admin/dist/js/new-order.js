var baseUrl = $('#baseUrl').val();
$(document).ready(function () {

    var NewOrder = {
        initCustomer: function () {
            var availableCustomrs = [];
            $.ajax({
                type: "GET",
                url: baseUrl + "/admin/customers",
                beforeSend: function () {
                    $('.savingCustomize').css('display', 'inline-block');
                }, success: function (result) {
                    var rs = JSON.parse(result);
                    $('.savingCustomize').css('display', 'none');
                    if (rs.status) {
                        $.each(rs.users, function (key, value) {
                            availableCustomrs.push({
                                label: rs.users[key].Name,
                                id: rs.users[key].ID,
                                email: rs.users[key].Email,
                                phone: rs.users[key].Phone,
                                name: rs.users[key].Name
                            });
                        });
                        $("#customersearch").autocomplete({
                            source: availableCustomrs,
                            select: function (event, ui) {
                                $('.setCustomerID').val(ui.item.id);
                                $('#firstName').val(ui.item.name);
                                $('.setCustomerName').val(ui.item.name);
                                $('.setCustomerEmail').val(ui.item.email);
                                $('#phone').val(ui.item.phone);
                                $('#InPhoneNo').text(ui.item.phone);
                                $('#email').val(ui.item.email);
                                $('#lastName').val(ui.item.name);
                                $('#InCustomerName').text(ui.item.name);
                            }
                        });
                    } else {
                        alert('Customers not found');
                    }
                }, error: function () {
                    alert('Error Occured');
                }
            });
        }, initProductDetail: function () {
            var availableProducts = [];
            $.ajax({
                type: "GET",
                url: baseUrl + "/admin/products",
                beforeSend: function () {
                    $('.savingCustomize').css('display', 'inline-block');
                }, success: function (result) {
                    var rs = JSON.parse(result);
                    $('.savingCustomize').css('display', 'none');
                    if (rs.status) {
                        $.each(rs.products, function (key, value) {
                            availableProducts.push({
                                label: rs.products[key].Code,
                                id: rs.products[key].ID,
                                price: rs.products[key].Price
                            });
                        });
                        $("#chooseProduct").autocomplete({
                            source: availableProducts,
                            select: function (event, ui) {
                                $('.setProductID').val(ui.item.id);
                                $('#InProductCode').text(ui.item.id);
                                $('#customerPrice').val(ui.item.price);
                                $('#InProductPrice').text(ui.item.price);
                                $('#InProductTotal').text(ui.item.price);
                                $('.setPrice').val(ui.item.price);
                                $('#qty').val(1);
                                $('#InProductQty').text(1);
                                $('.setQty').val(1);
                                $('#dealerPrice').val(ui.item.price);
                                $('#InSubTotal').text(ui.item.price);
                                $('#InTotal').text(ui.item.price);
                            }
                        });
                    } else {
                        alert('Products not found');
                    }
                }, error: function () {
                    alert('Error Occured');
                }
            });
        }, loadSizeByCustomerID: function () {
            var cID = $('.setCustomerID').val();
            $.ajax({
                type: "GET",
                url: baseUrl + "/admin/customer/size/" + cID,
                beforeSend: function () {
                    $('.savingCustomize').css('display', 'inline-block');
                }, success: function (result) {
                    var rs = JSON.parse(result);
                    $('.savingCustomize').css('display', 'none');
                    if (rs.status) {
                        $("#Size select").each(function () {
                            name = $(this).attr('name');
                            getVal = rs.size[name];
                            if (typeof getVal !== typeof undefined && getVal !== null) {
                                $('select[name="' + name + '"] option[value="' + getVal + '"]').attr('selected', 'selected');
                            }
                        });

                        $("#Size input").each(function () {
                            name = $(this).attr('name');
                            getVal = rs.size[name];
                            if (typeof getVal !== typeof undefined && getVal !== null) {
                                $('input[name="' + name + '"]').val(getVal);
                            }
                        });
                    } else {
                        alert('Size not found');
                    }
                }, error: function () {
                    alert('Error Occured');
                }
            });
        }, nextToProductDetail: function (event) {
            if ($('#customersearch').val() == "" || $('#firstName').val() == "" || $('#email').val() == "") {
                $('#errorMsg').removeClass('hide');
                $('#errorMsg').text('All fields(cusomter,email & firstname) Required.');
                NewOrder.hideMsg('errorMsg');
            } else {
                $('.tablist li').removeClass('active');
                $('#ProductDetailEnable').addClass('active');
                $('#ProductDetailEnable a').attr('href', '#ProductDetail');
                $('#ProductDetailEnable a').attr('data-toggle', 'tab');
                $('.contentlist .tab-pane').removeClass('in active');
                $('#ProductDetail').addClass('in active');
                NewOrder.initProductDetail();
            }
        }, nextToSizeDetail: function (event) {
            if ($('#chooseProduct').val() == "" || $('#qty').val() == "" || $('#customerPrice').val() == "") {
                $('#errorMsg').removeClass('hide');
                $('#errorMsg').text('All fields(Product,Quantitym & Customer Price) Required.');
                NewOrder.hideMsg('errorMsg');
            } else {
                $('.tablist li').removeClass('active');
                $('#SizeEnable').addClass('active');
                $('#SizeEnable a').attr('href', '#Size');
                $('#SizeEnable a').attr('data-toggle', 'tab');
                $('.contentlist .tab-pane').removeClass('in active');
                $('#Size').addClass('in active');
                NewOrder.loadSizeByCustomerID();
            }
        }, nextToStyleDetail: function (event) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: baseUrl + "/admin/order/save",
                type: "POST",
                data: $("form#formSizePost").serialize(),
                beforeSend: function () {
                    $('.savingCustomize').css('display', 'inline-block');
                }, success: function (result) {
                    var rs = JSON.parse(result);
                    $('.savingCustomize').css('display', 'none');
                    if (rs.status) {
                        $('#setOrderID').val(rs.orderID);
                        $('#InOrderNo').text(rs.orderID);
                        $('#InOrderDate').text(rs.OrderDate);
                        $('#setSizeID').val(rs.sizeID);
                        $('#successMsg').removeClass('hide');
                        $('#successMsg').text('Order Saved :). Fill Shirt Style.');
                        NewOrder.hideMsg('successMsg');

                        $('.tablist li').removeClass('active');
                        $('#StylingEnable').addClass('active');
                        $('#StylingEnable a').attr('href', '#Styling');
                        $('#StylingEnable a').attr('data-toggle', 'tab');
                        $('.contentlist .tab-pane').removeClass('in active');
                        $('#Styling').addClass('in active');
                    } else {
                        $('#errorMsg').removeClass('hide');
                        $('#errorMsg').text('Order not saved' + rs.msg);
                        NewOrder.hideMsg('errorMsg');
                    }
                }, error: function () {
                    alert('Error Occured');
                }
            });
        }, nextToInvoice: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.setQty').val($('#qty').val());

            $.ajax({
                url: baseUrl + "/admin/order/style/save",
                type: "POST",
                data: $("form#formStylingPost").serialize(),
                beforeSend: function () {
                    $('.savingCustomize').css('display', 'inline-block');
                }, success: function (result) {
                    var rs = JSON.parse(result);
                    $('.savingCustomize').css('display', 'none');
                    if (rs.status) {
                        $('#successMsg').removeClass('hide');
                        $('#successMsg').text('Shirt Style Save :)');
                        NewOrder.hideMsg('successMsg');

                        $('.tablist li').removeClass('active');
                        $('#InvoiceEnable').addClass('active');
                        $('#InvoiceEnable a').attr('href', '#Invoice');
                        $('#InvoiceEnable a').attr('data-toggle', 'tab');
                        $('.contentlist .tab-pane').removeClass('in active');
                        $('#Invoice').addClass('in active');
                    } else {
                        $('#errorMsg').removeClass('hide');
                        $('#errorMsg').text('Shirt Detail not saved' + rs.msg);
                        NewOrder.hideMsg('errorMsg');
                    }
                }, error: function () {
                    alert('Error Occured');
                }
            });
        }, hideMsg: function (msg) {
            setTimeout(function () {
                $('#' + msg).addClass('hide');
            }, 3000);
        }, loadFabricCodeforEdit: function () {
            var availableProducts = [];
            $.ajax({
                type: "GET",
                url: baseUrl + "/admin/products",
                beforeSend: function () {
                    $('.savingCustomize').css('display', 'inline-block');
                }, success: function (result) {
                    var rs = JSON.parse(result);
                    $('.savingCustomize').css('display', 'none');
                    if (rs.status) {
                        $.each(rs.products, function (key, value) {
                            availableProducts.push({
                                label: rs.products[key].Code,
                                id: rs.products[key].ID,
                                price: rs.products[key].Price
                            });
                        });
                        $("#loadFabricCode").autocomplete({
                            source: availableProducts,
                            select: function (event, ui) {
                                $('#InProductCode').text(ui.item.Code);
                                $('#customerPrice').val(ui.item.price);
                            }
                        });
                    } else {
                        alert('Products not found');
                    }
                }, error: function () {
                    alert('Error Occured');
                }
            });
        }
    };

    NewOrder.initCustomer();

    $('#nextToProductDetail').click(function () {
        NewOrder.nextToProductDetail(this);
    });

    $('#nextToSizeDetail').click(function () {
        NewOrder.nextToSizeDetail(this);
    });

    $('#nextToStyleDetail').click(function () {
        NewOrder.nextToStyleDetail(this);
    });

    $('#nextToInvoice').click(function () {
        NewOrder.nextToInvoice(this);
    });

    // Load Fabric Code for Edit Order
    if ($('#loadFabricCode').length > 0) {
        NewOrder.loadFabricCodeforEdit();
    }

    //Init Monogram
    $('select[name=Monogram]').change(function () {
        if ($(this).val() == 'No Monogram') {
            $('input[name=MonoInitials]').prop('disabled', true);
            $('select[name=MonoColor]').prop('disabled', true);
            $('select[name=MonoPosition]').prop('disabled', true);
        } else {
            $('input[name=MonoInitials]').prop('disabled', false);
            $('select[name=MonoColor]').prop('disabled', false);
            $('select[name=MonoPosition]').prop('disabled', false);
        }

    });

    //Init Monogram
    if ($('select[name=Monogram]').val() == 'No Monogram') {
        $('input[name=MonoInitials]').prop('disabled', true);
        $('select[name=MonoColor]').prop('disabled', true);
        $('select[name=MonoPosition]').prop('disabled', true);
    } else {
        $('input[name=MonoInitials]').prop('disabled', false);
        $('select[name=MonoColor]').prop('disabled', false);
        $('select[name=MonoPosition]').prop('disabled', false);
    }
});