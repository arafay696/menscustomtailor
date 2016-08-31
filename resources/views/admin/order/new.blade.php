@extends('admin.default')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Order <i class="fa fa-spinner fa-spin savingCustomize"
                                                     style="display:none;"></i></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <p id="errorMsg" class="alert alert-danger hide">Error</p>
                <p id="successMsg" class="alert alert-success hide">Error</p>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Order
                    </div>
                    <form name="myForm" role="form">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="tablist nav nav-pills">
                                        <li class="active"><a href="#CustomerDetail" data-toggle="tab">Customer
                                                Details</a>
                                        </li>
                                        <li id="ProductDetailEnable">
                                            <a href="#">Product Detail</a>
                                        </li>
                                        <li id="SizeEnable">
                                            <a href="#Size" data-toggle="tab">Size</a>
                                        </li>
                                        <li id="StylingEnable">
                                            <a href="#Styling" data-toggle="tab">Styling</a>
                                        </li>
                                        <li id="InvoiceEnable">
                                            <a href="#Invoice" data-toggle="tab">Invoice</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="contentlist tab-content">
                                        <div class="tab-pane fade in active" id="CustomerDetail">
                                            <hr/>
                                            <div class="col-lg-12">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Customer</label>
                                                        <input id="customersearch" class="form-control" name="Name">
                                                        <p class="help-block">
                                                            Autocomplete Name.
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input id="firstName" class="form-control" name="firstname">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input id="phone" class="form-control" name="phone">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input id="email" class="form-control" name="Email">
                                                        <p class="help-block">
                                                            Customer Email.
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input id="lastName" class="form-control" name="lastname">

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Fax</label>
                                                        <input class="form-control" name="fax">
                                                    </div>
                                                    <button id="nextToProductDetail" type="button"
                                                            class="btn btn-success pull-right">
                                                        Next
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="ProductDetail">
                                            <hr/>
                                            <div class="col-lg-12">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Product</label>
                                                        <input id="chooseProduct" class="form-control" name="product">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Customer Price</label>
                                                        <input id="customerPrice" class="form-control" name="cprice">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Qty</label>
                                                        <input id="qty" class="form-control" name="qty">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Dealer Price</label>
                                                        <input id="dealerPrice" class="form-control" name="dprice">
                                                    </div>
                                                    <button id="nextToSizeDetail" type="button"
                                                            class="btn btn-success pull-right">
                                                        Next
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="Size">
                                            <hr/>
                                            <div class="col-lg-12">
                                                <form class="form" name="formSize">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                    <input type="hidden" class="setCustomerID" value=""/>
                                                    <input type="hidden" class="setProductID" value=""/>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Height Feet</label>
                                                            <select class="form-control" name="HeightFeet">
                                                                <option selected="">Height Feet</option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "3") ? "selected='selected'" : "" ?> value="3">
                                                                    3
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "4") ? "selected='selected'" : "" ?> value="4">
                                                                    4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "5") ? "selected='selected'" : "" ?> value="5">
                                                                    5
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "6") ? "selected='selected'" : "" ?> value="6">
                                                                    6
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "7") ? "selected='selected'" : "" ?> value="7">
                                                                    7
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "8") ? "selected='selected'" : "" ?> value="8">
                                                                    8
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "9") ? "selected='selected'" : "" ?> value="9">
                                                                    9
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Weight</label>
                                                            <input class="form-control" name="Weight">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Back Style</label>
                                                            <select class="form-control" size="1" name="BackStyle">
                                                                <option value="Two Pleats">Two Pleats</option>
                                                                <option value="Inverted Pleat Back">Inverted Pleat Back
                                                                </option>
                                                                <option value="Box Pleat">Box Pleat</option>
                                                                <option value="Box Pleat Back w. Locker Loop">Box Pleat
                                                                    Back
                                                                    w. Locker Loop
                                                                </option>
                                                                <option value="Smooth Back">Smooth Back</option>
                                                                <option value="Yoke Back">Yoke Back</option>
                                                                <option value="Split Yoke Regular Back">Split Yoke
                                                                    Regular
                                                                    Back
                                                                </option>
                                                                <option value="Split Yoke Smooth Back">Split Yoke Smooth
                                                                    Back
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Neck Size</label>
                                                            <input class="form-control" name="NeckSize" type="text"
                                                                   value="<?php echo (isset(Session::get('currentSize')['NeckSize']) && Session::get('currentSize')['NeckSize'] != "") ? Session::get('currentSize')['NeckSize'] : ""; ?>"
                                                                   placeholder="Neck size in/ cm"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Chest Size</label>
                                                            <select class="form-control" name="Chest">
                                                                <option>Select Chest Size</option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "30") ? "selected='selected'" : "" ?> value="30">
                                                                    30
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                                                    30 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                                                    30 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                                                    30 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "31") ? "selected='selected'" : "" ?> value="31">
                                                                    31
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                                                    31 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                                                    31 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                                                    31 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "32") ? "selected='selected'" : "" ?> value="32">
                                                                    32
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                                                    32 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                                                    32 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                                                    32 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "33") ? "selected='selected'" : "" ?> value="33">
                                                                    33
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                                                    33 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                                                    33 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                                                    33 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "34") ? "selected='selected'" : "" ?> value="34">
                                                                    34
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                                                    34 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                                                    34 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                                                    34 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "35") ? "selected='selected'" : "" ?> value="35">
                                                                    35
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                                                    35 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                                                    35 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "35 3/4") ? "selected='selected'" : "" ?> value="35 3/4">
                                                                    35 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "36") ? "selected='selected'" : "" ?> value="36">
                                                                    36
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                                                    36 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                                                    36 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                                                    36 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "37") ? "selected='selected'" : "" ?> value="37">
                                                                    37
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                                                    37 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                                                    37 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                                                    37 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "38") ? "selected='selected'" : "" ?> value="38">
                                                                    38
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                                                    38 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                                                    38 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                                                    38 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "39") ? "selected='selected'" : "" ?> value="39">
                                                                    39
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                                                    39 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                                                    39 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                                                    39 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "40") ? "selected='selected'" : "" ?> value="40">
                                                                    40
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                                                    40 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                                                    40 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                                                    40 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "41") ? "selected='selected'" : "" ?> value="41">
                                                                    41
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                                                    41 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                                                    41 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                                                    41 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "42") ? "selected='selected'" : "" ?> value="42">
                                                                    42
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                                                    42 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                                                    42 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                                                    42 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "43") ? "selected='selected'" : "" ?> value="43">
                                                                    43
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                                                    43 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                                                    43 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                                                    43 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "44") ? "selected='selected'" : "" ?> value="44">
                                                                    44
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                                                    44 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                                                    44 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                                                    44 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "45") ? "selected='selected'" : "" ?> value="45">
                                                                    45
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                                                    45 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                                                    45 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                                                    45 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "46") ? "selected='selected'" : "" ?> value="46">
                                                                    46
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "46 1/4") ? "selected='selected'" : "" ?> value="46 1/4">
                                                                    46 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "46 1/2") ? "selected='selected'" : "" ?> value="46 1/2">
                                                                    46 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "46 3/4") ? "selected='selected'" : "" ?> value="46 3/4">
                                                                    46 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "47") ? "selected='selected'" : "" ?> value="47">
                                                                    47
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "47 1/4") ? "selected='selected'" : "" ?> value="47 1/4">
                                                                    47 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "47 1/2") ? "selected='selected'" : "" ?> value="47 1/2">
                                                                    47 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "47 3/4") ? "selected='selected'" : "" ?> value="47 3/4">
                                                                    47 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "48") ? "selected='selected'" : "" ?> value="48">
                                                                    48
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "48 1/4") ? "selected='selected'" : "" ?> value="48 1/4">
                                                                    48 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "48 1/2") ? "selected='selected'" : "" ?> value="48 1/2">
                                                                    48 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "48 3/4") ? "selected='selected'" : "" ?> value="48 3/4">
                                                                    48 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "49") ? "selected='selected'" : "" ?> value="49">
                                                                    49
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "49 1/4") ? "selected='selected'" : "" ?> value="49 1/4">
                                                                    49 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "49 1/2") ? "selected='selected'" : "" ?> value="49 1/2">
                                                                    49 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "49 3/4") ? "selected='selected'" : "" ?> value="49 3/4">
                                                                    49 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "50") ? "selected='selected'" : "" ?> value="50">
                                                                    50
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "50 1/4") ? "selected='selected'" : "" ?> value="50 1/4">
                                                                    50 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "50 1/2") ? "selected='selected'" : "" ?> value="50 1/2">
                                                                    50 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "50 3/4") ? "selected='selected'" : "" ?> value="50 3/4">
                                                                    50 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "51") ? "selected='selected'" : "" ?> value="51">
                                                                    51
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "51 1/4") ? "selected='selected'" : "" ?> value="51 1/4">
                                                                    51 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "51 1/2") ? "selected='selected'" : "" ?> value="51 1/2">
                                                                    51 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "51 3/4") ? "selected='selected'" : "" ?> value="51 3/4">
                                                                    51 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "52") ? "selected='selected'" : "" ?> value="52">
                                                                    52
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "52 1/4") ? "selected='selected'" : "" ?> value="52 1/4">
                                                                    52 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "52 1/2") ? "selected='selected'" : "" ?> value="52 1/2">
                                                                    52 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "52 3/4") ? "selected='selected'" : "" ?> value="52 3/4">
                                                                    52 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "53") ? "selected='selected'" : "" ?> value="53">
                                                                    53
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "53 1/4") ? "selected='selected'" : "" ?> value="53 1/4">
                                                                    53 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "53 1/2") ? "selected='selected'" : "" ?> value="53 1/2">
                                                                    53 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "53 3/4") ? "selected='selected'" : "" ?> value="53 3/4">
                                                                    53 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "54") ? "selected='selected'" : "" ?> value="54">
                                                                    54
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "54 1/4") ? "selected='selected'" : "" ?> value="54 1/4">
                                                                    54 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "54 1/2") ? "selected='selected'" : "" ?> value="54 1/2">
                                                                    54 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "54 3/4") ? "selected='selected'" : "" ?> value="54 3/4">
                                                                    54 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "55") ? "selected='selected'" : "" ?> value="55">
                                                                    55
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "55 1/4") ? "selected='selected'" : "" ?> value="55 1/4">
                                                                    55 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "55 1/2") ? "selected='selected'" : "" ?> value="55 1/2">
                                                                    55 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "55 3/4") ? "selected='selected'" : "" ?> value="55 3/4">
                                                                    55 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "56") ? "selected='selected'" : "" ?> value="56">
                                                                    56
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "56 1/4") ? "selected='selected'" : "" ?> value="56 1/4">
                                                                    56 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "56 1/2") ? "selected='selected'" : "" ?> value="56 1/2">
                                                                    56 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "56 3/4") ? "selected='selected'" : "" ?> value="56 3/4">
                                                                    56 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "57") ? "selected='selected'" : "" ?> value="57">
                                                                    57
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "57 1/4") ? "selected='selected'" : "" ?> value="57 1/4">
                                                                    57 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "57 1/2") ? "selected='selected'" : "" ?> value="57 1/2">
                                                                    57 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "57 3/4") ? "selected='selected'" : "" ?> value="57 3/4">
                                                                    57 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "58") ? "selected='selected'" : "" ?> value="58">
                                                                    58
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "58 1/4") ? "selected='selected'" : "" ?> value="58 1/4">
                                                                    58 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "58 1/2") ? "selected='selected'" : "" ?> value="58 1/2">
                                                                    58 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "58 3/4") ? "selected='selected'" : "" ?> value="58 3/4">
                                                                    58 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "59") ? "selected='selected'" : "" ?> value="59">
                                                                    59
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "59 1/4") ? "selected='selected'" : "" ?> value="59 1/4">
                                                                    59 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "59 1/2") ? "selected='selected'" : "" ?> value="59 1/2">
                                                                    59 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "59 3/4") ? "selected='selected'" : "" ?> value="59 3/4">
                                                                    59 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "60") ? "selected='selected'" : "" ?> value="60">
                                                                    60
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "60 1/4") ? "selected='selected'" : "" ?> value="60 1/4">
                                                                    60 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "60 1/2") ? "selected='selected'" : "" ?> value="60 1/2">
                                                                    60 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "60 3/4") ? "selected='selected'" : "" ?> value="60 3/4">
                                                                    60 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "61") ? "selected='selected'" : "" ?> value="61">
                                                                    61
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "61 1/4") ? "selected='selected'" : "" ?> value="61 1/4">
                                                                    61 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "61 1/2") ? "selected='selected'" : "" ?> value="61 1/2">
                                                                    61 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "61 3/4") ? "selected='selected'" : "" ?> value="61 3/4">
                                                                    61 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "62") ? "selected='selected'" : "" ?> value="62">
                                                                    62
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "62 1/4") ? "selected='selected'" : "" ?> value="62 1/4">
                                                                    62 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "62 1/2") ? "selected='selected'" : "" ?> value="62 1/2">
                                                                    62 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "62 3/4") ? "selected='selected'" : "" ?> value="62 3/4">
                                                                    62 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "63") ? "selected='selected'" : "" ?> value="63">
                                                                    63
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "63 1/4") ? "selected='selected'" : "" ?> value="63 1/4">
                                                                    63 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "63 1/2") ? "selected='selected'" : "" ?> value="63 1/2">
                                                                    63 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "63 3/4") ? "selected='selected'" : "" ?> value="63 3/4">
                                                                    63 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "64") ? "selected='selected'" : "" ?> value="64">
                                                                    64
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "64 1/4") ? "selected='selected'" : "" ?> value="64 1/4">
                                                                    64 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "64 1/2") ? "selected='selected'" : "" ?> value="64 1/2">
                                                                    64 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "64 3/4") ? "selected='selected'" : "" ?> value="64 3/4">
                                                                    64 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "65") ? "selected='selected'" : "" ?> value="65">
                                                                    65
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "65 1/4") ? "selected='selected'" : "" ?> value="65 1/4">
                                                                    65 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "65 1/2") ? "selected='selected'" : "" ?> value="65 1/2">
                                                                    65 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "65 3/4") ? "selected='selected'" : "" ?> value="65 3/4">
                                                                    65 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "66") ? "selected='selected'" : "" ?> value="66">
                                                                    66
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "66 1/4") ? "selected='selected'" : "" ?> value="66 1/4">
                                                                    66 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "66 1/2") ? "selected='selected'" : "" ?> value="66 1/2">
                                                                    66 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "66 3/4") ? "selected='selected'" : "" ?> value="66 3/4">
                                                                    66 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "67") ? "selected='selected'" : "" ?> value="67">
                                                                    67
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "67 1/4") ? "selected='selected'" : "" ?> value="67 1/4">
                                                                    67 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "67 1/2") ? "selected='selected'" : "" ?> value="67 1/2">
                                                                    67 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "67 3/4") ? "selected='selected'" : "" ?> value="67 3/4">
                                                                    67 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "68") ? "selected='selected'" : "" ?> value="68">
                                                                    68
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "68 1/4") ? "selected='selected'" : "" ?> value="68 1/4">
                                                                    68 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "68 1/2") ? "selected='selected'" : "" ?> value="68 1/2">
                                                                    68 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "68 3/4") ? "selected='selected'" : "" ?> value="68 3/4">
                                                                    68 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "69") ? "selected='selected'" : "" ?> value="69">
                                                                    69
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "69 1/4") ? "selected='selected'" : "" ?> value="69 1/4">
                                                                    69 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "69 1/2") ? "selected='selected'" : "" ?> value="69 1/2">
                                                                    69 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "69 3/4") ? "selected='selected'" : "" ?> value="69 3/4">
                                                                    69 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "70") ? "selected='selected'" : "" ?> value="70">
                                                                    70
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "70 1/4") ? "selected='selected'" : "" ?> value="70 1/4">
                                                                    70 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "70 1/2") ? "selected='selected'" : "" ?> value="70 1/2">
                                                                    70 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "70 3/4") ? "selected='selected'" : "" ?> value="70 3/4">
                                                                    70 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "71") ? "selected='selected'" : "" ?> value="71">
                                                                    71
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "71 1/4") ? "selected='selected'" : "" ?> value="71 1/4">
                                                                    71 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "71 1/2") ? "selected='selected'" : "" ?> value="71 1/2">
                                                                    71 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "71 3/4") ? "selected='selected'" : "" ?> value="71 3/4">
                                                                    71 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "72") ? "selected='selected'" : "" ?> value="72">
                                                                    72
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "72 1/4") ? "selected='selected'" : "" ?> value="72 1/4">
                                                                    72 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "72 1/2") ? "selected='selected'" : "" ?> value="72 1/2">
                                                                    72 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "72 3/4") ? "selected='selected'" : "" ?> value="72 3/4">
                                                                    72 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "73") ? "selected='selected'" : "" ?> value="73">
                                                                    73
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "73 1/4") ? "selected='selected'" : "" ?> value="73 1/4">
                                                                    73 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "73 1/2") ? "selected='selected'" : "" ?> value="73 1/2">
                                                                    73 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "73 3/4") ? "selected='selected'" : "" ?> value="73 3/4">
                                                                    73 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "74") ? "selected='selected'" : "" ?> value="74">
                                                                    74
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "74 1/4") ? "selected='selected'" : "" ?> value="74 1/4">
                                                                    74 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "74 1/2") ? "selected='selected'" : "" ?> value="74 1/2">
                                                                    74 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "74 3/4") ? "selected='selected'" : "" ?> value="74 3/4">
                                                                    74 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "75") ? "selected='selected'" : "" ?> value="75">
                                                                    75
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "75 1/4") ? "selected='selected'" : "" ?> value="75 1/4">
                                                                    75 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "75 1/2") ? "selected='selected'" : "" ?> value="75 1/2">
                                                                    75 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "75 3/4") ? "selected='selected'" : "" ?> value="75 3/4">
                                                                    75 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "76") ? "selected='selected'" : "" ?> value="76">
                                                                    76
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "76 1/4") ? "selected='selected'" : "" ?> value="76 1/4">
                                                                    76 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "76 1/2") ? "selected='selected'" : "" ?> value="76 1/2">
                                                                    76 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "76 3/4") ? "selected='selected'" : "" ?> value="76 3/4">
                                                                    76 3/4
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Waist</label>
                                                            <select class="form-control" title="Waist" size="1"
                                                                    name="Waist">
                                                                <option value="">Select Waist</option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "24") ? "selected='selected'" : "" ?> value="24">
                                                                    24
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "24 1/4") ? "selected='selected'" : "" ?> value="24 1/4">
                                                                    24 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "24 1/2") ? "selected='selected'" : "" ?> value="24 1/2">
                                                                    24 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "24 3/4") ? "selected='selected'" : "" ?> value="24 3/4">
                                                                    24 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "25") ? "selected='selected'" : "" ?> value="25">
                                                                    25
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "25 1/4") ? "selected='selected'" : "" ?> value="25 1/4">
                                                                    25 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "25 1/2") ? "selected='selected'" : "" ?> value="25 1/2">
                                                                    25 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "25 3/4") ? "selected='selected'" : "" ?> value="25 3/4">
                                                                    25 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "26") ? "selected='selected'" : "" ?> value="26">
                                                                    26
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "26 1/3") ? "selected='selected'" : "" ?> value="26 1/4">
                                                                    26 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "26 1/2") ? "selected='selected'" : "" ?> value="26 1/2">
                                                                    26 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "26 3/4") ? "selected='selected'" : "" ?> value="26 3/4">
                                                                    26 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "27") ? "selected='selected'" : "" ?> value="27">
                                                                    27
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "27 1/4") ? "selected='selected'" : "" ?> value="27 1/4">
                                                                    27 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "27 1/2") ? "selected='selected'" : "" ?> value="27 1/2">
                                                                    27 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "27 3/4") ? "selected='selected'" : "" ?> value="27 3/4">
                                                                    27 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "28") ? "selected='selected'" : "" ?> value="28">
                                                                    28
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "28 1/4") ? "selected='selected'" : "" ?> value="28 1/4">
                                                                    28 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "28 1/2") ? "selected='selected'" : "" ?> value="28 1/2">
                                                                    28 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "28 3/4") ? "selected='selected'" : "" ?> value="28 3/4">
                                                                    28 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "29") ? "selected='selected'" : "" ?> value="29">
                                                                    29
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "29 1/4") ? "selected='selected'" : "" ?> value="29 1/4">
                                                                    29 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "29 1/2") ? "selected='selected'" : "" ?> value="29 1/2">
                                                                    29 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "29 3/4") ? "selected='selected'" : "" ?> value="29 3/4">
                                                                    29 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "30") ? "selected='selected'" : "" ?> value="30">
                                                                    30
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                                                    30 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                                                    30 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                                                    30 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "31") ? "selected='selected'" : "" ?> value="31">
                                                                    31
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                                                    31 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                                                    31 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                                                    31 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "32") ? "selected='selected'" : "" ?> value="32">
                                                                    32
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                                                    32 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                                                    32 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                                                    32 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "33") ? "selected='selected'" : "" ?> value="33">
                                                                    33
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                                                    33 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                                                    33 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                                                    33 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "34") ? "selected='selected'" : "" ?> value="34">
                                                                    34
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                                                    34 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                                                    34 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                                                    34 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "35") ? "selected='selected'" : "" ?> value="35">
                                                                    35
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                                                    35 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                                                    35 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "35 3/4") ? "selected='selected'" : "" ?> value="35 3/4">
                                                                    35 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "36") ? "selected='selected'" : "" ?> value="36">
                                                                    36
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                                                    36 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                                                    36 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                                                    36 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "37") ? "selected='selected'" : "" ?> value="37">
                                                                    37
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                                                    37 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                                                    37 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                                                    37 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "38") ? "selected='selected'" : "" ?> value="38">
                                                                    38
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                                                    38 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                                                    38 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                                                    38 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "39") ? "selected='selected'" : "" ?> value="39">
                                                                    39
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                                                    39 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                                                    39 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                                                    39 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "40") ? "selected='selected'" : "" ?> value="40">
                                                                    40
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                                                    40 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                                                    40 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                                                    40 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "41") ? "selected='selected'" : "" ?> value="41">
                                                                    41
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                                                    41 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                                                    41 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                                                    41 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "42") ? "selected='selected'" : "" ?> value="42">
                                                                    42
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                                                    42 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                                                    42 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                                                    42 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "43") ? "selected='selected'" : "" ?> value="43">
                                                                    43
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                                                    43 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                                                    43 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                                                    43 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "44") ? "selected='selected'" : "" ?> value="44">
                                                                    44
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                                                    44 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                                                    44 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                                                    44 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "45") ? "selected='selected'" : "" ?> value="45">
                                                                    45
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                                                    45 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                                                    45 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                                                    45 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "46") ? "selected='selected'" : "" ?> value="46">
                                                                    46
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "46 1/4") ? "selected='selected'" : "" ?> value="46 1/4">
                                                                    46 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "46 1/2") ? "selected='selected'" : "" ?> value="46 1/2">
                                                                    46 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "46 3/4") ? "selected='selected'" : "" ?> value="46 3/4">
                                                                    46 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "47") ? "selected='selected'" : "" ?> value="47">
                                                                    47
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "47 1/4") ? "selected='selected'" : "" ?> value="47 1/4">
                                                                    47 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "47 1/2") ? "selected='selected'" : "" ?> value="47 1/2">
                                                                    47 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "47 3/4") ? "selected='selected'" : "" ?> value="47 3/4">
                                                                    47 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "48") ? "selected='selected'" : "" ?> value="48">
                                                                    48
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "48 1/4") ? "selected='selected'" : "" ?> value="48 1/4">
                                                                    48 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "48 1/2") ? "selected='selected'" : "" ?> value="48 1/2">
                                                                    48 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "48 3/4") ? "selected='selected'" : "" ?> value="48 3/4">
                                                                    48 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "49") ? "selected='selected'" : "" ?> value="49">
                                                                    49
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "49 1/4") ? "selected='selected'" : "" ?> value="49 1/4">
                                                                    49 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "49 1/2") ? "selected='selected'" : "" ?> value="49 1/2">
                                                                    49 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "49 3/4") ? "selected='selected'" : "" ?> value="49 3/4">
                                                                    49 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "50") ? "selected='selected'" : "" ?> value="50">
                                                                    50
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "50 1/4") ? "selected='selected'" : "" ?> value="50 1/4">
                                                                    50 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "50 1/2") ? "selected='selected'" : "" ?> value="50 1/2">
                                                                    50 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "50 3/4") ? "selected='selected'" : "" ?> value="50 3/4">
                                                                    50 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "51") ? "selected='selected'" : "" ?> value="51">
                                                                    51
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "51 1/4") ? "selected='selected'" : "" ?> value="51 1/4">
                                                                    51 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "51 1/2") ? "selected='selected'" : "" ?> value="51 1/2">
                                                                    51 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "51 3/4") ? "selected='selected'" : "" ?> value="51 3/4">
                                                                    51 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "52") ? "selected='selected'" : "" ?> value="52">
                                                                    52
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "52 1/4") ? "selected='selected'" : "" ?> value="52 1/4">
                                                                    52 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "52 1/2") ? "selected='selected'" : "" ?> value="52 1/2">
                                                                    52 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "52 3/4") ? "selected='selected'" : "" ?> value="52 3/4">
                                                                    52 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "53") ? "selected='selected'" : "" ?> value="53">
                                                                    53
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "53 1/4") ? "selected='selected'" : "" ?> value="53 1/4">
                                                                    53 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "53 1/2") ? "selected='selected'" : "" ?> value="53 1/2">
                                                                    53 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "53 3/4") ? "selected='selected'" : "" ?> value="53 3/4">
                                                                    53 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "54") ? "selected='selected'" : "" ?> value="54">
                                                                    54
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "54 1/4") ? "selected='selected'" : "" ?> value="54 1/4">
                                                                    54 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "54 1/2") ? "selected='selected'" : "" ?> value="54 1/2">
                                                                    54 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "54 3/4") ? "selected='selected'" : "" ?> value="54 3/4">
                                                                    54 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "55") ? "selected='selected'" : "" ?> value="55">
                                                                    55
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "55 1/4") ? "selected='selected'" : "" ?> value="55 1/4">
                                                                    55 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "55 1/2") ? "selected='selected'" : "" ?> value="55 1/2">
                                                                    55 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "55 3/4") ? "selected='selected'" : "" ?> value="55 3/4">
                                                                    55 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "56") ? "selected='selected'" : "" ?> value="56">
                                                                    56
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "56 1/4") ? "selected='selected'" : "" ?> value="56 1/4">
                                                                    56 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "56 1/2") ? "selected='selected'" : "" ?> value="56 1/2">
                                                                    56 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "56 3/4") ? "selected='selected'" : "" ?> value="56 3/4">
                                                                    56 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "57") ? "selected='selected'" : "" ?> value="57">
                                                                    57
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "57 1/4") ? "selected='selected'" : "" ?> value="57 1/4">
                                                                    57 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "57 1/2") ? "selected='selected'" : "" ?> value="57 1/2">
                                                                    57 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "57 3/4") ? "selected='selected'" : "" ?> value="57 3/4">
                                                                    57 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "58") ? "selected='selected'" : "" ?> value="58">
                                                                    58
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "58 1/4") ? "selected='selected'" : "" ?> value="58 1/4">
                                                                    58 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "58 1/2") ? "selected='selected'" : "" ?> value="58 1/2">
                                                                    58 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "58 3/4") ? "selected='selected'" : "" ?> value="58 3/4">
                                                                    58 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "59") ? "selected='selected'" : "" ?> value="59">
                                                                    59
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "59 1/4") ? "selected='selected'" : "" ?> value="59 1/4">
                                                                    59 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "59 1/2") ? "selected='selected'" : "" ?> value="59 1/2">
                                                                    59 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "59 3/4") ? "selected='selected'" : "" ?> value="59 3/4">
                                                                    59 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "60") ? "selected='selected'" : "" ?> value="60">
                                                                    60
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "60 1/4") ? "selected='selected'" : "" ?> value="60 1/4">
                                                                    60 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "60 1/2") ? "selected='selected'" : "" ?> value="60 1/2">
                                                                    60 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "60 3/4") ? "selected='selected'" : "" ?> value="60 3/4">
                                                                    60 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "61") ? "selected='selected'" : "" ?> value="61">
                                                                    61
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "61 1/4") ? "selected='selected'" : "" ?> value="61 1/4">
                                                                    61 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "61 1/2") ? "selected='selected'" : "" ?> value="61 1/2">
                                                                    61 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "61 3/4") ? "selected='selected'" : "" ?> value="61 3/4">
                                                                    61 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "62") ? "selected='selected'" : "" ?> value="62">
                                                                    62
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "62 1/4") ? "selected='selected'" : "" ?> value="62 1/4">
                                                                    62 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "62 1/2") ? "selected='selected'" : "" ?> value="62 1/2">
                                                                    62 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "62 3/4") ? "selected='selected'" : "" ?> value="62 3/4">
                                                                    62 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "63") ? "selected='selected'" : "" ?> value="63">
                                                                    63
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "63 1/4") ? "selected='selected'" : "" ?> value="63 1/4">
                                                                    63 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "63 1/2") ? "selected='selected'" : "" ?> value="63 1/2">
                                                                    63 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "63 3/4") ? "selected='selected'" : "" ?> value="63 3/4">
                                                                    63 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "64") ? "selected='selected'" : "" ?> value="64">
                                                                    64
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "64 1/4") ? "selected='selected'" : "" ?> value="64 1/4">
                                                                    64 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "64 1/2") ? "selected='selected'" : "" ?> value="64 1/2">
                                                                    64 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "64 3/4") ? "selected='selected'" : "" ?> value="64 3/4">
                                                                    64 3/4
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Posture</label>
                                                            <select class="form-control" name="Posture">
                                                                <option selected="" value="">Posture</option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Posture']) && Session::get('currentSize')['Posture'] == "Flat") ? "selected='selected'" : "" ?> value="Flat">
                                                                    Flat
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Posture']) && Session::get('currentSize')['Posture'] == "Average") ? "selected='selected'" : "" ?> value="Average">
                                                                    Average
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Posture']) && Session::get('currentSize')['Posture'] == "Rounded") ? "selected='selected'" : "" ?> value="Rounded">
                                                                    Rounded
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Posture']) && Session::get('currentSize')['Posture'] == "Stout") ? "selected='selected'" : "" ?> value="Stout">
                                                                    Stout
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div class="form-group">
                                                            <label>Height Inches</label>
                                                            <select class="form-control" name="HeightInches" size="1">
                                                                <option value="0" selected="">Height Inches</option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "1") ? "selected='selected'" : "" ?> value="1">
                                                                    1
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "2") ? "selected='selected'" : "" ?> value="2">
                                                                    2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "3") ? "selected='selected'" : "" ?> value="3">
                                                                    3
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "4") ? "selected='selected'" : "" ?> value="4">
                                                                    4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "5") ? "selected='selected'" : "" ?> value="5">
                                                                    5
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "6") ? "selected='selected'" : "" ?> value="6">
                                                                    6
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "7") ? "selected='selected'" : "" ?> value="7">
                                                                    7
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "8") ? "selected='selected'" : "" ?> value="8">
                                                                    8
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "9") ? "selected='selected'" : "" ?> value="9">
                                                                    9
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "10") ? "selected='selected'" : "" ?> value="10">
                                                                    10
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "11") ? "selected='selected'" : "" ?> value="11">
                                                                    11
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Neck Height</label>
                                                            <select class="form-control" name="NeckHeight">
                                                                <option>Select Neck Height</option>
                                                                <option value="Short" <?php echo (isset(Session::get('currentSize')['NeckHeight']) && Session::get('currentSize')['NeckHeight'] == "Short") ? "selected='selected'" : "" ?>>
                                                                    Short
                                                                </option>
                                                                <option value="Average" <?php echo (isset(Session::get('currentSize')['NeckHeight']) && Session::get('currentSize')['NeckHeight'] == "Average") ? "selected='selected'" : "" ?>>
                                                                    Average
                                                                </option>
                                                                <option value="Long" <?php echo (isset(Session::get('currentSize')['NeckHeight']) && Session::get('currentSize')['NeckHeight'] == "Long") ? "selected='selected'" : "" ?>>
                                                                    Long
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sleeve Length</label>
                                                            <select class="form-control" title="Sleeve Length"
                                                                    name="sleeveLength">
                                                                <option value="">Select Sleeve Length</option>
                                                                <option value="24" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "24") ? "selected='selected'" : "" ?>>
                                                                    24
                                                                </option>
                                                                <option value="24 1/4" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "24 1/4") ? "selected='selected'" : "" ?>>
                                                                    24 1/4
                                                                </option>
                                                                <option value="24 1/2" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "24 1/2") ? "selected='selected'" : "" ?>>
                                                                    24 1/2
                                                                </option>
                                                                <option value="24 3/4" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "24 3/4") ? "selected='selected'" : "" ?>>
                                                                    24 3/4
                                                                </option>
                                                                <option value="25" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "25") ? "selected='selected'" : "" ?>>
                                                                    25
                                                                </option>
                                                                <option value="25 1/4" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "25 1/4") ? "selected='selected'" : "" ?>>
                                                                    25 1/4
                                                                </option>
                                                                <option value="25 1/2" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "25 1/2") ? "selected='selected'" : "" ?>>
                                                                    25 1/2
                                                                </option>
                                                                <option value="25 3/4" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "25 3/4") ? "selected='selected'" : "" ?>>
                                                                    25 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "26") ? "selected='selected'" : "" ?> value="26">
                                                                    26
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "26 1/4") ? "selected='selected'" : "" ?> value="26 1/4">
                                                                    26 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "26 1/2") ? "selected='selected'" : "" ?> value="26 1/2">
                                                                    26 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "26 3/4") ? "selected='selected'" : "" ?> value="26 3/4">
                                                                    26 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "27") ? "selected='selected'" : "" ?> value="27">
                                                                    27
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "27 1/4") ? "selected='selected'" : "" ?> value="27 1/4">
                                                                    27 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "27 1/2") ? "selected='selected'" : "" ?> value="27 1/2">
                                                                    27 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "27 3/4") ? "selected='selected'" : "" ?> value="27 3/4">
                                                                    27 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "28") ? "selected='selected'" : "" ?> value="28">
                                                                    28
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "28 1/4") ? "selected='selected'" : "" ?> value="28 1/4">
                                                                    28 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "28 1/2") ? "selected='selected'" : "" ?> value="28 1/2">
                                                                    28 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "28 3/4") ? "selected='selected'" : "" ?> value="28 3/4">
                                                                    28 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "29") ? "selected='selected'" : "" ?> value="29">
                                                                    29
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "29 1/4") ? "selected='selected'" : "" ?> value="29 1/4">
                                                                    29 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "29 1/2") ? "selected='selected'" : "" ?> value="29 1/2">
                                                                    29 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "29 3/4") ? "selected='selected'" : "" ?> value="29 3/4">
                                                                    29 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "30") ? "selected='selected'" : "" ?> value="30">
                                                                    30
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                                                    30 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                                                    30 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                                                    30 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "31") ? "selected='selected'" : "" ?> value="31">
                                                                    31
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                                                    31 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                                                    31 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                                                    31 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "32") ? "selected='selected'" : "" ?> value="32">
                                                                    32
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                                                    32 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                                                    32 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                                                    32 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "33") ? "selected='selected'" : "" ?> value="33">
                                                                    33
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                                                    33 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                                                    33 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                                                    33 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "34") ? "selected='selected'" : "" ?> value="34">
                                                                    34
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                                                    34 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                                                    34 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                                                    34 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "35") ? "selected='selected'" : "" ?> value="35">
                                                                    35
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                                                    35 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                                                    35 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "36") ? "selected='selected'" : "" ?> value="35 3/4">
                                                                    35 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "36") ? "selected='selected'" : "" ?> value="36">
                                                                    36
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                                                    36 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                                                    36 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                                                    36 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "37") ? "selected='selected'" : "" ?> value="37">
                                                                    37
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                                                    37 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                                                    37 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                                                    37 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "38") ? "selected='selected'" : "" ?> value="38">
                                                                    38
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                                                    38 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                                                    38 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                                                    38 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "39") ? "selected='selected'" : "" ?> value="39">
                                                                    39
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                                                    39 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                                                    39 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                                                    39 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "40") ? "selected='selected'" : "" ?> value="40">
                                                                    40
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                                                    40 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                                                    40 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                                                    40 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "41") ? "selected='selected'" : "" ?> value="41">
                                                                    41
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                                                    41 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                                                    41 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                                                    41 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "42") ? "selected='selected'" : "" ?> value="42">
                                                                    42
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                                                    42 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                                                    42 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                                                    42 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "43") ? "selected='selected'" : "" ?> value="43">
                                                                    43
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                                                    43 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                                                    43 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                                                    43 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "44") ? "selected='selected'" : "" ?> value="44">
                                                                    44
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                                                    44 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                                                    44 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                                                    44 3/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "45") ? "selected='selected'" : "" ?> value="45">
                                                                    45
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                                                    45 1/4
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                                                    45 1/2
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                                                    45 3/4
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Chest Description</label>
                                                            <select class="form-control" name="ChestDescription">
                                                                <option>Select Chect Description</option>
                                                                <option <?php echo (isset(Session::get('currentSize')['ChestDescription']) && Session::get('currentSize')['ChestDescription'] == "Slender") ? "selected='selected'" : "" ?> value="Slender">
                                                                    Slender
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['ChestDescription']) && Session::get('currentSize')['ChestDescription'] == "Regular Build") ? "selected='selected'" : "" ?> value="Regular Build">
                                                                    Regular Build
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['ChestDescription']) && Session::get('currentSize')['ChestDescription'] == "Very Muscular") ? "selected='selected'" : "" ?> value="Very Muscular">
                                                                    Very Muscular
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['ChestDescription']) && Session::get('currentSize')['ChestDescription'] == "Husky / Hefty") ? "selected='selected'" : "" ?> value="Husky / Hefty">
                                                                    Husky / Hefty
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Body Proportion</label>
                                                            <select class="form-control" size="1" name="BodyProportion">
                                                                <option selected="" value="">Select Body proportion
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['BodyProportion']) && Session::get('currentSize')['BodyProportion'] == "Evenly Proportioned") ? "selected='selected'" : "" ?> value="Evenly Proportioned">
                                                                    Evenly Proportioned
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['BodyProportion']) && Session::get('currentSize')['BodyProportion'] == "Short Torso / Long Legs") ? "selected='selected'" : "" ?> value="Short Torso / Long Legs">
                                                                    Short Torso / Long Legs
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['BodyProportion']) && Session::get('currentSize')['BodyProportion'] == "Long Torso / Short Legs") ? "selected='selected'" : "" ?> value="Long Torso / Short Legs">
                                                                    Long Torso / Short Legs
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Body Shape</label>
                                                            <select class="form-control" size="1" name="BodyShape">
                                                                <option selected="" value="">Select Body Shape</option>
                                                                <option <?php echo (isset(Session::get('currentSize')['BodyShape']) && Session::get('currentSize')['BodyShape'] == "Average") ? "selected='selected'" : "" ?> value="Average">
                                                                    Average
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['BodyShape']) && Session::get('currentSize')['BodyShape'] == "Athletic") ? "selected='selected'" : "" ?> value="Athletic">
                                                                    Athletic
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['BodyShape']) && Session::get('currentSize')['BodyShape'] == "Portly") ? "selected='selected'" : "" ?> value="Portly">
                                                                    Portly
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Shoulder</label>
                                                            <select class="form-control" size="1" name="Shoulder">
                                                                <option selected="" value="">Select Shoulder Type
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Shoulder']) && Session::get('currentSize')['Shoulder'] == "Sloping") ? "selected='selected'" : "" ?> value="Sloping">
                                                                    Sloping
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Shoulder']) && Session::get('currentSize')['Shoulder'] == "Average") ? "selected='selected'" : "" ?> value="Average">
                                                                    Average
                                                                </option>
                                                                <option <?php echo (isset(Session::get('currentSize')['Shoulder']) && Session::get('currentSize')['Shoulder'] == "Square") ? "selected='selected'" : "" ?> value="Square">
                                                                    Square
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <button id="nextToSizeDetail" type="button"
                                                                class="btn btn-success pull-right">
                                                            Create Order & Continue
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="Styling">
                                            <hr/>
                                            <div class="col-lg-12">
                                                <form class="form" name="formStyling">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                    <input type="hidden" class="setCustomerID" value=""/>
                                                    <input type="hidden" class="setProductID" value=""/>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Collar Style</label>
                                                            <select class="form-control" size="1" name="CollarStyle">
                                                                <option value="Traditional Point">Traditional Point
                                                                </option>
                                                                <option value="Curve Point">Curve Point</option>
                                                                <option value="Narrow Point">Narrow Point</option>
                                                                <option value="Medium Spread">Medium Spread</option>
                                                                <option value="Wide Spread">Wide Spread</option>
                                                                <option value="Wide Spread 2 Button">
                                                                    Wide Spread 2 Button
                                                                </option>
                                                                <option value="Extreme Wide Spread Straightaway">
                                                                    Extreme Wide Spread Straightaway
                                                                </option>
                                                                <option value="Button Down">Button Down</option>
                                                                <option value="Hidden Button Down">Hidden Button Down
                                                                </option>
                                                                <option value="Michael Jordan Collar">
                                                                    Michael Jordan Collar
                                                                </option>
                                                                <option value="Tab Collar">Tab Collar</option>
                                                                <option value="Traditional Band Collar">
                                                                    Traditional Band Collar
                                                                </option>
                                                                <option value="Versace Band Collar">
                                                                    Versace Band Collar
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Collar Length</label>
                                                            <input class="form-control" name="CollarLength">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Back Style</label>
                                                            <select class="form-control" size="1" name="BackStyle">
                                                                <option value="Two Pleats">Two Pleats</option>
                                                                <option value="Inverted Pleat Back">Inverted Pleat Back
                                                                </option>
                                                                <option value="Box Pleat">Box Pleat</option>
                                                                <option value="Box Pleat Back w. Locker Loop">Box Pleat
                                                                    Back
                                                                    w. Locker Loop
                                                                </option>
                                                                <option value="Smooth Back">Smooth Back</option>
                                                                <option value="Yoke Back">Yoke Back</option>
                                                                <option value="Split Yoke Regular Back">Split Yoke
                                                                    Regular
                                                                    Back
                                                                </option>
                                                                <option value="Split Yoke Smooth Back">Split Yoke Smooth
                                                                    Back
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No. Of Pockets</label>
                                                            <select class="form-control" size="1" name="NoOfPockets"
                                                                    id="NoOfPockets">
                                                                <option value="0" selected="">No Pocket</option>
                                                                <option value="1">Single pocket</option>
                                                                <option value="2">Two pockets</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Monogram</label>
                                                            <select class="form-control" size="1" name="Monogram">
                                                                <option value="No Monogram">No Monogram</option>
                                                                <option value="Block Letters">Block Letters</option>
                                                                <option value="Script">Script</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Monogram Color</label>
                                                            <select size="1" name="MonoColor" class="form-control">
                                                                <option value="We Pick">We Pick</option>
                                                                <option value="Brown">Brown</option>
                                                                <option value="Black">Black</option>
                                                                <option value="Blue">Blue</option>
                                                                <option value="Green">Green</option>
                                                                <option value="Gray">Gray</option>
                                                                <option value="Lavender">Lavender</option>
                                                                <option value="Maroon">Maroon</option>
                                                                <option value="Navy">Navy</option>
                                                                <option value="Red">Red</option>
                                                                <option value="Silver">Silver</option>
                                                                <option value="Tan">Tan</option>
                                                                <option value="Yellow">Yellow</option>
                                                                <option value="Same As Fabric">Same As Fabric</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Label</label>
                                                            <select class="form-control" name="Label">
                                                                <option value="MCT Label">MCT Label</option>
                                                                <option value="Customer Name Label">Customer Name Label
                                                                </option>
                                                                <option value="No Label">No Label</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div class="form-group">
                                                            <label>Front Style</label>
                                                            <select class="form-control" size="1" name="FrontStyle">
                                                                <option value="Tab Front">Tab Front</option>
                                                                <option value="Tab Front Edge Stitch 1 ¼">Tab Front Edge
                                                                    Stitch 1 ¼
                                                                </option>
                                                                <option value="French Front">French Front</option>
                                                                <option value="Sport Front">Sport Front</option>
                                                                <option value="Fly Front">Fly Front</option>
                                                                <option value="Plain Front">Plain Front</option>
                                                                <option value="Plain Front-4 studs">Plain Front-4 studs
                                                                </option>
                                                                <option value="4 studs ¼ pleats">4 studs ¼ pleats
                                                                </option>
                                                                <option value="4 studs ½ pleats">4 studs ½ pleats
                                                                </option>
                                                                <option value="Bosom Front">Bosom Front</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Cuff Style</label>
                                                            <input class="form-control" name="CuffStyle">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Cuff Style</label>
                                                            <input class="form-control" name="CuffStyle">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pocket Style</label>
                                                            <select class="form-control" size="1" name="PocketStyle">
                                                                <option value="Regular Pocket">Regular Pocket</option>
                                                                <option value="Round Cornered Pocket">Round Cornered
                                                                    Pocket
                                                                </option>
                                                                <option value="Angle Corner Pocket">Angle Corner Pocket
                                                                </option>
                                                                <option value="Pocket With Flap">Pocket With Flap
                                                                </option>
                                                                <option value="Pleated Pocket With Flap">Pleated Pocket
                                                                    With
                                                                    Flap
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Monogram Initials</label>
                                                            <input class="form-control" name="MonoInitials">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Monogram Position</label>
                                                            <select class="form-control" size="1" name="MonoPosition">
                                                                <option value="Cuff">Cuff</option>
                                                                <option value="Chest">Chest</option>
                                                                <option value="Pocket">Pocket</option>
                                                                <option value="Waist">Waist</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Advance Option</label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control2"
                                                                       name="WhiteCuffs">White Cuff
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control2"
                                                                       name="WhiteCollar">White Collar
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control2" name="Fit">Make
                                                                this shirt fit
                                                            </label>
                                                        </div>
                                                        <button id="nextToSizeDetail" type="button"
                                                                class="btn btn-success pull-right">
                                                            Create Order & Continue
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="Invoice">
                                            <h4>Settings Tab</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                quis nostrud
                                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                Duis aute
                                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                                fugiat nulla
                                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                                qui officia
                                                deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                    </form>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@endsection