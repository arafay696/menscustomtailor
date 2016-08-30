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
                                $('#firstName').val(ui.item.name);
                                $('#phone').val(ui.item.phone);
                                $('#email').val(ui.item.email);
                                $('#lastName').val(ui.item.name);
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
                                $('#customerPrice').val(ui.item.price);
                                $('#qty').val(1);
                                $('#dealerPrice').val(ui.item.price);
                            }
                        });
                    } else {
                        alert('Products not found');
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
        }, hideMsg: function (msg) {
            setTimeout(function () {
                $('#' + msg).addClass('hide');
            }, 3000);
        }
    };

    NewOrder.initCustomer();

    $('#nextToProductDetail').click(function () {
        NewOrder.nextToProductDetail(this);
    });
});