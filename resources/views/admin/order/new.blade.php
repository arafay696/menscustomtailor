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

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="tablist nav nav-pills">
                                        <li class="active">
                                            <a href="#CustomerDetail" data-toggle="tab">
                                                Customer Details
                                            </a>
                                        </li>
                                        <li id="ProductDetailEnable">
                                            <a href="#ProductDetail" data-toggle="tab">Product Detail</a>
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
                                            <div class="setSizeForm col-lg-12">
                                                <form id="formSizePost" method="post" action="<?= URL::to('admin/order/save'); ?>"  name="formSize">
                                                    <input type="hidden" name="CustomerID" class="setCustomerID" value=""/>
                                                    <input type="hidden" name="ProductCode" class="setProductID" value=""/>
                                                    <input type="hidden" name="ProductPrice" class="setPrice" value=""/>
                                                    <input type="hidden" name="CustomerName" class="setCustomerName" value=""/>
                                                    <input type="hidden" name="CustomerEmail" class="setCustomerEmail" value=""/>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Height Feet</label>
                                                            <select class="form-control" name="HeightFeet">
                                                                <option selected="">Height Feet</option>
                                                                <option value="3">
                                                                    3
                                                                </option>
                                                                <option value="4">
                                                                    4
                                                                </option>
                                                                <option value="5">
                                                                    5
                                                                </option>
                                                                <option value="6">
                                                                    6
                                                                </option>
                                                                <option value="7">
                                                                    7
                                                                </option>
                                                                <option value="8">
                                                                    8
                                                                </option>
                                                                <option value="9">
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
                                                                   value="" placeholder="Neck size in/cm"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Chest Size</label>
                                                            <select class="form-control" name="Chest">
                                                                <option>Select Chest Size</option>
                                                                <option value="30">
                                                                    30
                                                                </option>
                                                                <option value="30 1/4">
                                                                    30 1/4
                                                                </option>
                                                                <option value="30 1/2">
                                                                    30 1/2
                                                                </option>
                                                                <option value="30 3/4">
                                                                    30 3/4
                                                                </option>
                                                                <option value="31">
                                                                    31
                                                                </option>
                                                                <option value="31 1/4">
                                                                    31 1/4
                                                                </option>
                                                                <option value="31 1/2">
                                                                    31 1/2
                                                                </option>
                                                                <option value="31 3/4">
                                                                    31 3/4
                                                                </option>
                                                                <option value="32">
                                                                    32
                                                                </option>
                                                                <option value="32 1/4">
                                                                    32 1/4
                                                                </option>
                                                                <option value="32 1/2">
                                                                    32 1/2
                                                                </option>
                                                                <option value="32 3/4">
                                                                    32 3/4
                                                                </option>
                                                                <option value="33">
                                                                    33
                                                                </option>
                                                                <option value="33 1/4">
                                                                    33 1/4
                                                                </option>
                                                                <option value="33 1/2">
                                                                    33 1/2
                                                                </option>
                                                                <option value="33 3/4">
                                                                    33 3/4
                                                                </option>
                                                                <option value="34">
                                                                    34
                                                                </option>
                                                                <option value="34 1/4">
                                                                    34 1/4
                                                                </option>
                                                                <option value="34 1/2">
                                                                    34 1/2
                                                                </option>
                                                                <option value="34 3/4">
                                                                    34 3/4
                                                                </option>
                                                                <option value="35">
                                                                    35
                                                                </option>
                                                                <option value="35 1/4">
                                                                    35 1/4
                                                                </option>
                                                                <option value="35 1/2">
                                                                    35 1/2
                                                                </option>
                                                                <option value="35 3/4">
                                                                    35 3/4
                                                                </option>
                                                                <option value="36">
                                                                    36
                                                                </option>
                                                                <option value="36 1/4">
                                                                    36 1/4
                                                                </option>
                                                                <option value="36 1/2">
                                                                    36 1/2
                                                                </option>
                                                                <option value="36 3/4">
                                                                    36 3/4
                                                                </option>
                                                                <option value="37">
                                                                    37
                                                                </option>
                                                                <option value="37 1/4">
                                                                    37 1/4
                                                                </option>
                                                                <option value="37 1/2">
                                                                    37 1/2
                                                                </option>
                                                                <option value="37 3/4">
                                                                    37 3/4
                                                                </option>
                                                                <option value="38">
                                                                    38
                                                                </option>
                                                                <option value="38 1/4">
                                                                    38 1/4
                                                                </option>
                                                                <option value="38 1/2">
                                                                    38 1/2
                                                                </option>
                                                                <option value="38 3/4">
                                                                    38 3/4
                                                                </option>
                                                                <option value="39">
                                                                    39
                                                                </option>
                                                                <option value="39 1/4">
                                                                    39 1/4
                                                                </option>
                                                                <option value="39 1/2">
                                                                    39 1/2
                                                                </option>
                                                                <option value="39 3/4">
                                                                    39 3/4
                                                                </option>
                                                                <option value="40">
                                                                    40
                                                                </option>
                                                                <option value="40 1/4">
                                                                    40 1/4
                                                                </option>
                                                                <option value="40 1/2">
                                                                    40 1/2
                                                                </option>
                                                                <option value="40 3/4">
                                                                    40 3/4
                                                                </option>
                                                                <option value="41">
                                                                    41
                                                                </option>
                                                                <option value="41 1/4">
                                                                    41 1/4
                                                                </option>
                                                                <option value="41 1/2">
                                                                    41 1/2
                                                                </option>
                                                                <option value="41 3/4">
                                                                    41 3/4
                                                                </option>
                                                                <option value="42">
                                                                    42
                                                                </option>
                                                                <option value="42 1/4">
                                                                    42 1/4
                                                                </option>
                                                                <option value="42 1/2">
                                                                    42 1/2
                                                                </option>
                                                                <option value="42 3/4">
                                                                    42 3/4
                                                                </option>
                                                                <option value="43">
                                                                    43
                                                                </option>
                                                                <option value="43 1/4">
                                                                    43 1/4
                                                                </option>
                                                                <option value="43 1/2">
                                                                    43 1/2
                                                                </option>
                                                                <option value="43 3/4">
                                                                    43 3/4
                                                                </option>
                                                                <option value="44">
                                                                    44
                                                                </option>
                                                                <option value="44 1/4">
                                                                    44 1/4
                                                                </option>
                                                                <option value="44 1/2">
                                                                    44 1/2
                                                                </option>
                                                                <option value="44 3/4">
                                                                    44 3/4
                                                                </option>
                                                                <option value="45">
                                                                    45
                                                                </option>
                                                                <option value="45 1/4">
                                                                    45 1/4
                                                                </option>
                                                                <option value="45 1/2">
                                                                    45 1/2
                                                                </option>
                                                                <option value="45 3/4">
                                                                    45 3/4
                                                                </option>
                                                                <option value="46">
                                                                    46
                                                                </option>
                                                                <option value="46 1/4">
                                                                    46 1/4
                                                                </option>
                                                                <option value="46 1/2">
                                                                    46 1/2
                                                                </option>
                                                                <option value="46 3/4">
                                                                    46 3/4
                                                                </option>
                                                                <option value="47">
                                                                    47
                                                                </option>
                                                                <option value="47 1/4">
                                                                    47 1/4
                                                                </option>
                                                                <option value="47 1/2">
                                                                    47 1/2
                                                                </option>
                                                                <option value="47 3/4">
                                                                    47 3/4
                                                                </option>
                                                                <option value="48">
                                                                    48
                                                                </option>
                                                                <option value="48 1/4">
                                                                    48 1/4
                                                                </option>
                                                                <option value="48 1/2">
                                                                    48 1/2
                                                                </option>
                                                                <option value="48 3/4">
                                                                    48 3/4
                                                                </option>
                                                                <option value="49">
                                                                    49
                                                                </option>
                                                                <option value="49 1/4">
                                                                    49 1/4
                                                                </option>
                                                                <option value="49 1/2">
                                                                    49 1/2
                                                                </option>
                                                                <option value="49 3/4">
                                                                    49 3/4
                                                                </option>
                                                                <option value="50">
                                                                    50
                                                                </option>
                                                                <option value="50 1/4">
                                                                    50 1/4
                                                                </option>
                                                                <option value="50 1/2">
                                                                    50 1/2
                                                                </option>
                                                                <option value="50 3/4">
                                                                    50 3/4
                                                                </option>
                                                                <option value="51">
                                                                    51
                                                                </option>
                                                                <option value="51 1/4">
                                                                    51 1/4
                                                                </option>
                                                                <option value="51 1/2">
                                                                    51 1/2
                                                                </option>
                                                                <option value="51 3/4">
                                                                    51 3/4
                                                                </option>
                                                                <option value="52">
                                                                    52
                                                                </option>
                                                                <option value="52 1/4">
                                                                    52 1/4
                                                                </option>
                                                                <option value="52 1/2">
                                                                    52 1/2
                                                                </option>
                                                                <option value="52 3/4">
                                                                    52 3/4
                                                                </option>
                                                                <option value="53">
                                                                    53
                                                                </option>
                                                                <option value="53 1/4">
                                                                    53 1/4
                                                                </option>
                                                                <option value="53 1/2">
                                                                    53 1/2
                                                                </option>
                                                                <option value="53 3/4">
                                                                    53 3/4
                                                                </option>
                                                                <option value="54">
                                                                    54
                                                                </option>
                                                                <option value="54 1/4">
                                                                    54 1/4
                                                                </option>
                                                                <option value="54 1/2">
                                                                    54 1/2
                                                                </option>
                                                                <option value="54 3/4">
                                                                    54 3/4
                                                                </option>
                                                                <option value="55">
                                                                    55
                                                                </option>
                                                                <option value="55 1/4">
                                                                    55 1/4
                                                                </option>
                                                                <option value="55 1/2">
                                                                    55 1/2
                                                                </option>
                                                                <option value="55 3/4">
                                                                    55 3/4
                                                                </option>
                                                                <option value="56">
                                                                    56
                                                                </option>
                                                                <option value="56 1/4">
                                                                    56 1/4
                                                                </option>
                                                                <option value="56 1/2">
                                                                    56 1/2
                                                                </option>
                                                                <option value="56 3/4">
                                                                    56 3/4
                                                                </option>
                                                                <option value="57">
                                                                    57
                                                                </option>
                                                                <option value="57 1/4">
                                                                    57 1/4
                                                                </option>
                                                                <option value="57 1/2">
                                                                    57 1/2
                                                                </option>
                                                                <option value="57 3/4">
                                                                    57 3/4
                                                                </option>
                                                                <option value="58">
                                                                    58
                                                                </option>
                                                                <option value="58 1/4">
                                                                    58 1/4
                                                                </option>
                                                                <option value="58 1/2">
                                                                    58 1/2
                                                                </option>
                                                                <option value="58 3/4">
                                                                    58 3/4
                                                                </option>
                                                                <option value="59">
                                                                    59
                                                                </option>
                                                                <option value="59 1/4">
                                                                    59 1/4
                                                                </option>
                                                                <option value="59 1/2">
                                                                    59 1/2
                                                                </option>
                                                                <option value="59 3/4">
                                                                    59 3/4
                                                                </option>
                                                                <option value="60">
                                                                    60
                                                                </option>
                                                                <option value="60 1/4">
                                                                    60 1/4
                                                                </option>
                                                                <option value="60 1/2">
                                                                    60 1/2
                                                                </option>
                                                                <option value="60 3/4">
                                                                    60 3/4
                                                                </option>
                                                                <option value="61">
                                                                    61
                                                                </option>
                                                                <option value="61 1/4">
                                                                    61 1/4
                                                                </option>
                                                                <option value="61 1/2">
                                                                    61 1/2
                                                                </option>
                                                                <option value="61 3/4">
                                                                    61 3/4
                                                                </option>
                                                                <option value="62">
                                                                    62
                                                                </option>
                                                                <option value="62 1/4">
                                                                    62 1/4
                                                                </option>
                                                                <option value="62 1/2">
                                                                    62 1/2
                                                                </option>
                                                                <option value="62 3/4">
                                                                    62 3/4
                                                                </option>
                                                                <option value="63">
                                                                    63
                                                                </option>
                                                                <option value="63 1/4">
                                                                    63 1/4
                                                                </option>
                                                                <option value="63 1/2">
                                                                    63 1/2
                                                                </option>
                                                                <option value="63 3/4">
                                                                    63 3/4
                                                                </option>
                                                                <option value="64">
                                                                    64
                                                                </option>
                                                                <option value="64 1/4">
                                                                    64 1/4
                                                                </option>
                                                                <option value="64 1/2">
                                                                    64 1/2
                                                                </option>
                                                                <option value="64 3/4">
                                                                    64 3/4
                                                                </option>
                                                                <option value="65">
                                                                    65
                                                                </option>
                                                                <option value="65 1/4">
                                                                    65 1/4
                                                                </option>
                                                                <option value="65 1/2">
                                                                    65 1/2
                                                                </option>
                                                                <option value="65 3/4">
                                                                    65 3/4
                                                                </option>
                                                                <option value="66">
                                                                    66
                                                                </option>
                                                                <option value="66 1/4">
                                                                    66 1/4
                                                                </option>
                                                                <option value="66 1/2">
                                                                    66 1/2
                                                                </option>
                                                                <option value="66 3/4">
                                                                    66 3/4
                                                                </option>
                                                                <option value="67">
                                                                    67
                                                                </option>
                                                                <option value="67 1/4">
                                                                    67 1/4
                                                                </option>
                                                                <option value="67 1/2">
                                                                    67 1/2
                                                                </option>
                                                                <option value="67 3/4">
                                                                    67 3/4
                                                                </option>
                                                                <option value="68">
                                                                    68
                                                                </option>
                                                                <option value="68 1/4">
                                                                    68 1/4
                                                                </option>
                                                                <option value="68 1/2">
                                                                    68 1/2
                                                                </option>
                                                                <option value="68 3/4">
                                                                    68 3/4
                                                                </option>
                                                                <option value="69">
                                                                    69
                                                                </option>
                                                                <option value="69 1/4">
                                                                    69 1/4
                                                                </option>
                                                                <option value="69 1/2">
                                                                    69 1/2
                                                                </option>
                                                                <option value="69 3/4">
                                                                    69 3/4
                                                                </option>
                                                                <option value="70">
                                                                    70
                                                                </option>
                                                                <option value="70 1/4">
                                                                    70 1/4
                                                                </option>
                                                                <option value="70 1/2">
                                                                    70 1/2
                                                                </option>
                                                                <option value="70 3/4">
                                                                    70 3/4
                                                                </option>
                                                                <option value="71">
                                                                    71
                                                                </option>
                                                                <option value="71 1/4">
                                                                    71 1/4
                                                                </option>
                                                                <option value="71 1/2">
                                                                    71 1/2
                                                                </option>
                                                                <option value="71 3/4">
                                                                    71 3/4
                                                                </option>
                                                                <option value="72">
                                                                    72
                                                                </option>
                                                                <option value="72 1/4">
                                                                    72 1/4
                                                                </option>
                                                                <option value="72 1/2">
                                                                    72 1/2
                                                                </option>
                                                                <option value="72 3/4">
                                                                    72 3/4
                                                                </option>
                                                                <option value="73">
                                                                    73
                                                                </option>
                                                                <option value="73 1/4">
                                                                    73 1/4
                                                                </option>
                                                                <option value="73 1/2">
                                                                    73 1/2
                                                                </option>
                                                                <option value="73 3/4">
                                                                    73 3/4
                                                                </option>
                                                                <option value="74">
                                                                    74
                                                                </option>
                                                                <option value="74 1/4">
                                                                    74 1/4
                                                                </option>
                                                                <option value="74 1/2">
                                                                    74 1/2
                                                                </option>
                                                                <option value="74 3/4">
                                                                    74 3/4
                                                                </option>
                                                                <option value="75">
                                                                    75
                                                                </option>
                                                                <option value="75 1/4">
                                                                    75 1/4
                                                                </option>
                                                                <option value="75 1/2">
                                                                    75 1/2
                                                                </option>
                                                                <option value="75 3/4">
                                                                    75 3/4
                                                                </option>
                                                                <option value="76">
                                                                    76
                                                                </option>
                                                                <option value="76 1/4">
                                                                    76 1/4
                                                                </option>
                                                                <option value="76 1/2">
                                                                    76 1/2
                                                                </option>
                                                                <option value="76 3/4">
                                                                    76 3/4
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Waist</label>
                                                            <select class="form-control" title="Waist" size="1"
                                                                    name="Waist">
                                                                <option value="">Select Waist</option>
                                                                <option value="24">
                                                                    24
                                                                </option>
                                                                <option value="24 1/4">
                                                                    24 1/4
                                                                </option>
                                                                <option value="24 1/2">
                                                                    24 1/2
                                                                </option>
                                                                <option value="24 3/4">
                                                                    24 3/4
                                                                </option>
                                                                <option value="25">
                                                                    25
                                                                </option>
                                                                <option value="25 1/4">
                                                                    25 1/4
                                                                </option>
                                                                <option value="25 1/2">
                                                                    25 1/2
                                                                </option>
                                                                <option value="25 3/4">
                                                                    25 3/4
                                                                </option>
                                                                <option value="26">
                                                                    26
                                                                </option>
                                                                <option value="26 1/4">
                                                                    26 1/4
                                                                </option>
                                                                <option value="26 1/2">
                                                                    26 1/2
                                                                </option>
                                                                <option value="26 3/4">
                                                                    26 3/4
                                                                </option>
                                                                <option value="27">
                                                                    27
                                                                </option>
                                                                <option value="27 1/4">
                                                                    27 1/4
                                                                </option>
                                                                <option value="27 1/2">
                                                                    27 1/2
                                                                </option>
                                                                <option value="27 3/4">
                                                                    27 3/4
                                                                </option>
                                                                <option value="28">
                                                                    28
                                                                </option>
                                                                <option value="28 1/4">
                                                                    28 1/4
                                                                </option>
                                                                <option value="28 1/2">
                                                                    28 1/2
                                                                </option>
                                                                <option value="28 3/4">
                                                                    28 3/4
                                                                </option>
                                                                <option value="29">
                                                                    29
                                                                </option>
                                                                <option value="29 1/4">
                                                                    29 1/4
                                                                </option>
                                                                <option value="29 1/2">
                                                                    29 1/2
                                                                </option>
                                                                <option value="29 3/4">
                                                                    29 3/4
                                                                </option>
                                                                <option value="30">
                                                                    30
                                                                </option>
                                                                <option value="30 1/4">
                                                                    30 1/4
                                                                </option>
                                                                <option value="30 1/2">
                                                                    30 1/2
                                                                </option>
                                                                <option value="30 3/4">
                                                                    30 3/4
                                                                </option>
                                                                <option value="31">
                                                                    31
                                                                </option>
                                                                <option value="31 1/4">
                                                                    31 1/4
                                                                </option>
                                                                <option value="31 1/2">
                                                                    31 1/2
                                                                </option>
                                                                <option value="31 3/4">
                                                                    31 3/4
                                                                </option>
                                                                <option value="32">
                                                                    32
                                                                </option>
                                                                <option value="32 1/4">
                                                                    32 1/4
                                                                </option>
                                                                <option value="32 1/2">
                                                                    32 1/2
                                                                </option>
                                                                <option value="32 3/4">
                                                                    32 3/4
                                                                </option>
                                                                <option value="33">
                                                                    33
                                                                </option>
                                                                <option value="33 1/4">
                                                                    33 1/4
                                                                </option>
                                                                <option value="33 1/2">
                                                                    33 1/2
                                                                </option>
                                                                <option value="33 3/4">
                                                                    33 3/4
                                                                </option>
                                                                <option value="34">
                                                                    34
                                                                </option>
                                                                <option value="34 1/4">
                                                                    34 1/4
                                                                </option>
                                                                <option value="34 1/2">
                                                                    34 1/2
                                                                </option>
                                                                <option value="34 3/4">
                                                                    34 3/4
                                                                </option>
                                                                <option value="35">
                                                                    35
                                                                </option>
                                                                <option value="35 1/4">
                                                                    35 1/4
                                                                </option>
                                                                <option value="35 1/2">
                                                                    35 1/2
                                                                </option>
                                                                <option value="35 3/4">
                                                                    35 3/4
                                                                </option>
                                                                <option value="36">
                                                                    36
                                                                </option>
                                                                <option value="36 1/4">
                                                                    36 1/4
                                                                </option>
                                                                <option value="36 1/2">
                                                                    36 1/2
                                                                </option>
                                                                <option value="36 3/4">
                                                                    36 3/4
                                                                </option>
                                                                <option value="37">
                                                                    37
                                                                </option>
                                                                <option value="37 1/4">
                                                                    37 1/4
                                                                </option>
                                                                <option value="37 1/2">
                                                                    37 1/2
                                                                </option>
                                                                <option value="37 3/4">
                                                                    37 3/4
                                                                </option>
                                                                <option value="38">
                                                                    38
                                                                </option>
                                                                <option value="38 1/4">
                                                                    38 1/4
                                                                </option>
                                                                <option value="38 1/2">
                                                                    38 1/2
                                                                </option>
                                                                <option value="38 3/4">
                                                                    38 3/4
                                                                </option>
                                                                <option value="39">
                                                                    39
                                                                </option>
                                                                <option value="39 1/4">
                                                                    39 1/4
                                                                </option>
                                                                <option value="39 1/2">
                                                                    39 1/2
                                                                </option>
                                                                <option value="39 3/4">
                                                                    39 3/4
                                                                </option>
                                                                <option value="40">
                                                                    40
                                                                </option>
                                                                <option value="40 1/4">
                                                                    40 1/4
                                                                </option>
                                                                <option value="40 1/2">
                                                                    40 1/2
                                                                </option>
                                                                <option value="40 3/4">
                                                                    40 3/4
                                                                </option>
                                                                <option value="41">
                                                                    41
                                                                </option>
                                                                <option value="41 1/4">
                                                                    41 1/4
                                                                </option>
                                                                <option value="41 1/2">
                                                                    41 1/2
                                                                </option>
                                                                <option value="41 3/4">
                                                                    41 3/4
                                                                </option>
                                                                <option value="42">
                                                                    42
                                                                </option>
                                                                <option value="42 1/4">
                                                                    42 1/4
                                                                </option>
                                                                <option value="42 1/2">
                                                                    42 1/2
                                                                </option>
                                                                <option value="42 3/4">
                                                                    42 3/4
                                                                </option>
                                                                <option value="43">
                                                                    43
                                                                </option>
                                                                <option value="43 1/4">
                                                                    43 1/4
                                                                </option>
                                                                <option value="43 1/2">
                                                                    43 1/2
                                                                </option>
                                                                <option value="43 3/4">
                                                                    43 3/4
                                                                </option>
                                                                <option value="44">
                                                                    44
                                                                </option>
                                                                <option value="44 1/4">
                                                                    44 1/4
                                                                </option>
                                                                <option value="44 1/2">
                                                                    44 1/2
                                                                </option>
                                                                <option value="44 3/4">
                                                                    44 3/4
                                                                </option>
                                                                <option value="45">
                                                                    45
                                                                </option>
                                                                <option value="45 1/4">
                                                                    45 1/4
                                                                </option>
                                                                <option value="45 1/2">
                                                                    45 1/2
                                                                </option>
                                                                <option value="45 3/4">
                                                                    45 3/4
                                                                </option>
                                                                <option value="46">
                                                                    46
                                                                </option>
                                                                <option value="46 1/4">
                                                                    46 1/4
                                                                </option>
                                                                <option value="46 1/2">
                                                                    46 1/2
                                                                </option>
                                                                <option value="46 3/4">
                                                                    46 3/4
                                                                </option>
                                                                <option value="47">
                                                                    47
                                                                </option>
                                                                <option value="47 1/4">
                                                                    47 1/4
                                                                </option>
                                                                <option value="47 1/2">
                                                                    47 1/2
                                                                </option>
                                                                <option value="47 3/4">
                                                                    47 3/4
                                                                </option>
                                                                <option value="48">
                                                                    48
                                                                </option>
                                                                <option value="48 1/4">
                                                                    48 1/4
                                                                </option>
                                                                <option value="48 1/2">
                                                                    48 1/2
                                                                </option>
                                                                <option value="48 3/4">
                                                                    48 3/4
                                                                </option>
                                                                <option value="49">
                                                                    49
                                                                </option>
                                                                <option value="49 1/4">
                                                                    49 1/4
                                                                </option>
                                                                <option value="49 1/2">
                                                                    49 1/2
                                                                </option>
                                                                <option value="49 3/4">
                                                                    49 3/4
                                                                </option>
                                                                <option value="50">
                                                                    50
                                                                </option>
                                                                <option value="50 1/4">
                                                                    50 1/4
                                                                </option>
                                                                <option value="50 1/2">
                                                                    50 1/2
                                                                </option>
                                                                <option value="50 3/4">
                                                                    50 3/4
                                                                </option>
                                                                <option value="51">
                                                                    51
                                                                </option>
                                                                <option value="51 1/4">
                                                                    51 1/4
                                                                </option>
                                                                <option value="51 1/2">
                                                                    51 1/2
                                                                </option>
                                                                <option value="51 3/4">
                                                                    51 3/4
                                                                </option>
                                                                <option value="52">
                                                                    52
                                                                </option>
                                                                <option value="52 1/4">
                                                                    52 1/4
                                                                </option>
                                                                <option value="52 1/2">
                                                                    52 1/2
                                                                </option>
                                                                <option value="52 3/4">
                                                                    52 3/4
                                                                </option>
                                                                <option value="53">
                                                                    53
                                                                </option>
                                                                <option value="53 1/4">
                                                                    53 1/4
                                                                </option>
                                                                <option value="53 1/2">
                                                                    53 1/2
                                                                </option>
                                                                <option value="53 3/4">
                                                                    53 3/4
                                                                </option>
                                                                <option value="54">
                                                                    54
                                                                </option>
                                                                <option value="54 1/4">
                                                                    54 1/4
                                                                </option>
                                                                <option value="54 1/2">
                                                                    54 1/2
                                                                </option>
                                                                <option value="54 3/4">
                                                                    54 3/4
                                                                </option>
                                                                <option value="55">
                                                                    55
                                                                </option>
                                                                <option value="55 1/4">
                                                                    55 1/4
                                                                </option>
                                                                <option value="55 1/2">
                                                                    55 1/2
                                                                </option>
                                                                <option value="55 3/4">
                                                                    55 3/4
                                                                </option>
                                                                <option value="56">
                                                                    56
                                                                </option>
                                                                <option value="56 1/4">
                                                                    56 1/4
                                                                </option>
                                                                <option value="56 1/2">
                                                                    56 1/2
                                                                </option>
                                                                <option value="56 3/4">
                                                                    56 3/4
                                                                </option>
                                                                <option value="57">
                                                                    57
                                                                </option>
                                                                <option value="57 1/4">
                                                                    57 1/4
                                                                </option>
                                                                <option value="57 1/2">
                                                                    57 1/2
                                                                </option>
                                                                <option value="57 3/4">
                                                                    57 3/4
                                                                </option>
                                                                <option value="58">
                                                                    58
                                                                </option>
                                                                <option value="58 1/4">
                                                                    58 1/4
                                                                </option>
                                                                <option value="58 1/2">
                                                                    58 1/2
                                                                </option>
                                                                <option value="58 3/4">
                                                                    58 3/4
                                                                </option>
                                                                <option value="59">
                                                                    59
                                                                </option>
                                                                <option value="59 1/4">
                                                                    59 1/4
                                                                </option>
                                                                <option value="59 1/2">
                                                                    59 1/2
                                                                </option>
                                                                <option value="59 3/4">
                                                                    59 3/4
                                                                </option>
                                                                <option value="60">
                                                                    60
                                                                </option>
                                                                <option value="60 1/4">
                                                                    60 1/4
                                                                </option>
                                                                <option value="60 1/2">
                                                                    60 1/2
                                                                </option>
                                                                <option value="60 3/4">
                                                                    60 3/4
                                                                </option>
                                                                <option value="61">
                                                                    61
                                                                </option>
                                                                <option value="61 1/4">
                                                                    61 1/4
                                                                </option>
                                                                <option value="61 1/2">
                                                                    61 1/2
                                                                </option>
                                                                <option value="61 3/4">
                                                                    61 3/4
                                                                </option>
                                                                <option value="62">
                                                                    62
                                                                </option>
                                                                <option value="62 1/4">
                                                                    62 1/4
                                                                </option>
                                                                <option value="62 1/2">
                                                                    62 1/2
                                                                </option>
                                                                <option value="62 3/4">
                                                                    62 3/4
                                                                </option>
                                                                <option value="63">
                                                                    63
                                                                </option>
                                                                <option value="63 1/4">
                                                                    63 1/4
                                                                </option>
                                                                <option value="63 1/2">
                                                                    63 1/2
                                                                </option>
                                                                <option value="63 3/4">
                                                                    63 3/4
                                                                </option>
                                                                <option value="64">
                                                                    64
                                                                </option>
                                                                <option value="64 1/4">
                                                                    64 1/4
                                                                </option>
                                                                <option value="64 1/2">
                                                                    64 1/2
                                                                </option>
                                                                <option value="64 3/4">
                                                                    64 3/4
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Posture</label>
                                                            <select class="form-control" name="Posture">
                                                                <option selected="" value="">Posture</option>
                                                                <option value="Flat">
                                                                    Flat
                                                                </option>
                                                                <option value="Average">
                                                                    Average
                                                                </option>
                                                                <option value="Rounded">
                                                                    Rounded
                                                                </option>
                                                                <option value="Stout">
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
                                                                <option value="1">
                                                                    1
                                                                </option>
                                                                <option value="2">
                                                                    2
                                                                </option>
                                                                <option value="3">
                                                                    3
                                                                </option>
                                                                <option value="4">
                                                                    4
                                                                </option>
                                                                <option value="5">
                                                                    5
                                                                </option>
                                                                <option value="6">
                                                                    6
                                                                </option>
                                                                <option value="7">
                                                                    7
                                                                </option>
                                                                <option value="8">
                                                                    8
                                                                </option>
                                                                <option value="9">
                                                                    9
                                                                </option>
                                                                <option value="10">
                                                                    10
                                                                </option>
                                                                <option value="11">
                                                                    11
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Neck Height</label>
                                                            <select class="form-control" name="NeckHeight">
                                                                <option>Select Neck Height</option>
                                                                <option value="Short">
                                                                    Short
                                                                </option>
                                                                <option value="Average">
                                                                    Average
                                                                </option>
                                                                <option value="Long">
                                                                    Long
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sleeve Length</label>
                                                            <select class="form-control" title="Sleeve Length"
                                                                    name="sleeveLength">
                                                                <option value="">Select Sleeve Length</option>
                                                                <option value="24">
                                                                    24
                                                                </option>
                                                                <option value="24 1/4">
                                                                    24 1/4
                                                                </option>
                                                                <option value="24 1/2">
                                                                    24 1/2
                                                                </option>
                                                                <option value="24 3/4">
                                                                    24 3/4
                                                                </option>
                                                                <option value="25">
                                                                    25
                                                                </option>
                                                                <option value="25 1/4">
                                                                    25 1/4
                                                                </option>
                                                                <option value="25 1/2">
                                                                    25 1/2
                                                                </option>
                                                                <option value="25 3/4">
                                                                    25 3/4
                                                                </option>
                                                                <option value="26">
                                                                    26
                                                                </option>
                                                                <option value="26 1/4">
                                                                    26 1/4
                                                                </option>
                                                                <option value="26 1/2">
                                                                    26 1/2
                                                                </option>
                                                                <option value="26 3/4">
                                                                    26 3/4
                                                                </option>
                                                                <option value="27">
                                                                    27
                                                                </option>
                                                                <option value="27 1/4">
                                                                    27 1/4
                                                                </option>
                                                                <option value="27 1/2">
                                                                    27 1/2
                                                                </option>
                                                                <option value="27 3/4">
                                                                    27 3/4
                                                                </option>
                                                                <option value="28">
                                                                    28
                                                                </option>
                                                                <option value="28 1/4">
                                                                    28 1/4
                                                                </option>
                                                                <option value="28 1/2">
                                                                    28 1/2
                                                                </option>
                                                                <option value="28 3/4">
                                                                    28 3/4
                                                                </option>
                                                                <option value="29">
                                                                    29
                                                                </option>
                                                                <option value="29 1/4">
                                                                    29 1/4
                                                                </option>
                                                                <option value="29 1/2">
                                                                    29 1/2
                                                                </option>
                                                                <option value="29 3/4">
                                                                    29 3/4
                                                                </option>
                                                                <option value="30">
                                                                    30
                                                                </option>
                                                                <option value="30 1/4">
                                                                    30 1/4
                                                                </option>
                                                                <option value="30 1/2">
                                                                    30 1/2
                                                                </option>
                                                                <option value="30 3/4">
                                                                    30 3/4
                                                                </option>
                                                                <option value="31">
                                                                    31
                                                                </option>
                                                                <option value="31 1/4">
                                                                    31 1/4
                                                                </option>
                                                                <option value="31 1/2">
                                                                    31 1/2
                                                                </option>
                                                                <option value="31 3/4">
                                                                    31 3/4
                                                                </option>
                                                                <option value="32">
                                                                    32
                                                                </option>
                                                                <option value="32 1/4">
                                                                    32 1/4
                                                                </option>
                                                                <option value="32 1/2">
                                                                    32 1/2
                                                                </option>
                                                                <option value="32 3/4">
                                                                    32 3/4
                                                                </option>
                                                                <option value="33">
                                                                    33
                                                                </option>
                                                                <option value="33 1/4">
                                                                    33 1/4
                                                                </option>
                                                                <option value="33 1/2">
                                                                    33 1/2
                                                                </option>
                                                                <option value="33 3/4">
                                                                    33 3/4
                                                                </option>
                                                                <option value="34">
                                                                    34
                                                                </option>
                                                                <option value="34 1/4">
                                                                    34 1/4
                                                                </option>
                                                                <option value="34 1/2">
                                                                    34 1/2
                                                                </option>
                                                                <option value="34 3/4">
                                                                    34 3/4
                                                                </option>
                                                                <option value="35">
                                                                    35
                                                                </option>
                                                                <option value="35 1/4">
                                                                    35 1/4
                                                                </option>
                                                                <option value="35 1/2">
                                                                    35 1/2
                                                                </option>
                                                                <option value="35 3/4">
                                                                    35 3/4
                                                                </option>
                                                                <option value="36">
                                                                    36
                                                                </option>
                                                                <option value="36 1/4">
                                                                    36 1/4
                                                                </option>
                                                                <option value="36 1/2">
                                                                    36 1/2
                                                                </option>
                                                                <option value="36 3/4">
                                                                    36 3/4
                                                                </option>
                                                                <option value="37">
                                                                    37
                                                                </option>
                                                                <option value="37 1/4">
                                                                    37 1/4
                                                                </option>
                                                                <option value="37 1/2">
                                                                    37 1/2
                                                                </option>
                                                                <option value="37 3/4">
                                                                    37 3/4
                                                                </option>
                                                                <option value="38">
                                                                    38
                                                                </option>
                                                                <option value="38 1/4">
                                                                    38 1/4
                                                                </option>
                                                                <option value="38 1/2">
                                                                    38 1/2
                                                                </option>
                                                                <option value="38 3/4">
                                                                    38 3/4
                                                                </option>
                                                                <option value="39">
                                                                    39
                                                                </option>
                                                                <option value="39 1/4">
                                                                    39 1/4
                                                                </option>
                                                                <option value="39 1/2">
                                                                    39 1/2
                                                                </option>
                                                                <option value="39 3/4">
                                                                    39 3/4
                                                                </option>
                                                                <option value="40">
                                                                    40
                                                                </option>
                                                                <option value="40 1/4">
                                                                    40 1/4
                                                                </option>
                                                                <option value="40 1/2">
                                                                    40 1/2
                                                                </option>
                                                                <option value="40 3/4">
                                                                    40 3/4
                                                                </option>
                                                                <option value="41">
                                                                    41
                                                                </option>
                                                                <option value="41 1/4">
                                                                    41 1/4
                                                                </option>
                                                                <option value="41 1/2">
                                                                    41 1/2
                                                                </option>
                                                                <option value="41 3/4">
                                                                    41 3/4
                                                                </option>
                                                                <option value="42">
                                                                    42
                                                                </option>
                                                                <option value="42 1/4">
                                                                    42 1/4
                                                                </option>
                                                                <option value="42 1/2">
                                                                    42 1/2
                                                                </option>
                                                                <option value="42 3/4">
                                                                    42 3/4
                                                                </option>
                                                                <option value="43">
                                                                    43
                                                                </option>
                                                                <option value="43 1/4">
                                                                    43 1/4
                                                                </option>
                                                                <option value="43 1/2">
                                                                    43 1/2
                                                                </option>
                                                                <option value="43 3/4">
                                                                    43 3/4
                                                                </option>
                                                                <option value="44">
                                                                    44
                                                                </option>
                                                                <option value="44 1/4">
                                                                    44 1/4
                                                                </option>
                                                                <option value="44 1/2">
                                                                    44 1/2
                                                                </option>
                                                                <option value="44 3/4">
                                                                    44 3/4
                                                                </option>
                                                                <option value="45">
                                                                    45
                                                                </option>
                                                                <option value="45 1/4">
                                                                    45 1/4
                                                                </option>
                                                                <option value="45 1/2">
                                                                    45 1/2
                                                                </option>
                                                                <option value="45 3/4">
                                                                    45 3/4
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Chest Description</label>
                                                            <select class="form-control" name="ChestDescription">
                                                                <option>Select Chect Description</option>
                                                                <option value="Slender">
                                                                    Slender
                                                                </option>
                                                                <option value="Regular Build">
                                                                    Regular Build
                                                                </option>
                                                                <option value="Very Muscular">
                                                                    Very Muscular
                                                                </option>
                                                                <option value="Husky/Hefty">
                                                                    Husky/Hefty
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Body Proportion</label>
                                                            <select class="form-control" size="1" name="BodyProportion">
                                                                <option selected="" value="">Select Body proportion
                                                                </option>
                                                                <option value="Evenly Proportioned">
                                                                    Evenly Proportioned
                                                                </option>
                                                                <option value="Short Torso/Long Legs">
                                                                    Short Torso/Long Legs
                                                                </option>
                                                                <option value="Long Torso/Short Legs">
                                                                    Long Torso/Short Legs
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Body Shape</label>
                                                            <select class="form-control" size="1" name="BodyShape">
                                                                <option selected="" value="">Select Body Shape</option>
                                                                <option value="Average">
                                                                    Average
                                                                </option>
                                                                <option value="Athletic">
                                                                    Athletic
                                                                </option>
                                                                <option value="Portly">
                                                                    Portly
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Shoulder</label>
                                                            <select class="form-control" size="1" name="Shoulder">
                                                                <option selected="" value="">Select Shoulder Type
                                                                </option>
                                                                <option value="Sloping">
                                                                    Sloping
                                                                </option>
                                                                <option value="Average">
                                                                    Average
                                                                </option>
                                                                <option value="Square">
                                                                    Square
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <button id="nextToStyleDetail" type="button"
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
                                                <form id="formStylingPost" method="post" action=""  name="formStyling">
                                                    <input type="hidden" name="OrderID" id="setOrderID" value=""/>
                                                    <input type="hidden" name="SizeID" id="setSizeID" value=""/>
                                                    <input type="hidden" name="Qty" class="setQty" value=""/>
                                                    <input type="hidden" name="CustomerID" class="setCustomerID" value=""/>
                                                    <input type="hidden" name="ProductCode" class="setProductID" value=""/>
                                                    <input type="hidden" name="ProductPrice" class="setPrice" value=""/>
                                                    <input type="hidden" name="CustomerName" class="setCustomerName" value=""/>
                                                    <input type="hidden" name="CustomerEmail" class="setCustomerEmail" value=""/>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Collar Style</label>
                                                            <select class="form-control" size="1"
                                                                    name="CollarStyle">
                                                                <option value="Traditional Point">Traditional
                                                                    Point
                                                                </option>
                                                                <option value="Curve Point">Curve Point</option>
                                                                <option value="Narrow Point">Narrow Point
                                                                </option>
                                                                <option value="Medium Spread">Medium Spread
                                                                </option>
                                                                <option value="Wide Spread">Wide Spread</option>
                                                                <option value="Wide Spread 2 Button">
                                                                    Wide Spread 2 Button
                                                                </option>
                                                                <option value="Extreme Wide Spread Straightaway">
                                                                    Extreme Wide Spread Straightaway
                                                                </option>
                                                                <option value="Button Down">Button Down</option>
                                                                <option value="Hidden Button Down">Hidden Button
                                                                    Down
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
                                                            <select class="form-control" size="1"
                                                                    name="BackStyle">
                                                                <option value="Two Pleats">Two Pleats</option>
                                                                <option value="Inverted Pleat Back">Inverted
                                                                    Pleat Back
                                                                </option>
                                                                <option value="Box Pleat">Box Pleat</option>
                                                                <option value="Box Pleat Back w. Locker Loop">
                                                                    Box Pleat
                                                                    Back
                                                                    w. Locker Loop
                                                                </option>
                                                                <option value="Smooth Back">Smooth Back</option>
                                                                <option value="Yoke Back">Yoke Back</option>
                                                                <option value="Split Yoke Regular Back">Split
                                                                    Yoke
                                                                    Regular
                                                                    Back
                                                                </option>
                                                                <option value="Split Yoke Smooth Back">Split
                                                                    Yoke Smooth
                                                                    Back
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No. Of Pockets</label>
                                                            <select class="form-control" size="1"
                                                                    name="NoOfPockets"
                                                                    id="NoOfPockets">
                                                                <option value="0" selected="">No Pocket</option>
                                                                <option value="1">Single pocket</option>
                                                                <option value="2">Two pockets</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Monogram</label>
                                                            <select class="form-control" size="1"
                                                                    name="Monogram">
                                                                <option value="No Monogram">No Monogram</option>
                                                                <option value="Block Letters">Block Letters
                                                                </option>
                                                                <option value="Script">Script</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Monogram Color</label>
                                                            <select size="1" name="MonoColor"
                                                                    class="form-control">
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
                                                                <option value="Same As Fabric">Same As Fabric
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Label</label>
                                                            <select class="form-control" name="Label">
                                                                <option value="MCT Label">MCT Label</option>
                                                                <option value="Customer Name Label">Customer
                                                                    Name Label
                                                                </option>
                                                                <option value="No Label">No Label</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div class="form-group">
                                                            <label>Front Style</label>
                                                            <select class="form-control" size="1"
                                                                    name="FrontStyle">
                                                                <option value="Tab Front">Tab Front</option>
                                                                <option value="Tab Front Edge Stitch 1 ¼">Tab
                                                                    Front Edge
                                                                    Stitch 1 ¼
                                                                </option>
                                                                <option value="French Front">French Front
                                                                </option>
                                                                <option value="Sport Front">Sport Front</option>
                                                                <option value="Fly Front">Fly Front</option>
                                                                <option value="Plain Front">Plain Front</option>
                                                                <option value="Plain Front-4 studs">Plain
                                                                    Front-4 studs
                                                                </option>
                                                                <option value="4 studs ¼ pleats">4 studs ¼
                                                                    pleats
                                                                </option>
                                                                <option value="4 studs ½ pleats">4 studs ½
                                                                    pleats
                                                                </option>
                                                                <option value="Bosom Front">Bosom Front</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Cuff Style</label>
                                                            <input class="form-control" name="CuffStyle">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Collar Stays</label>
                                                            <input class="form-control" name="CollarStays">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pocket Style</label>
                                                            <select class="form-control" size="1"
                                                                    name="PocketStyle">
                                                                <option value="Regular Pocket">Regular Pocket
                                                                </option>
                                                                <option value="Round Cornered Pocket">Round
                                                                    Cornered
                                                                    Pocket
                                                                </option>
                                                                <option value="Angle Corner Pocket">Angle Corner
                                                                    Pocket
                                                                </option>
                                                                <option value="Pocket With Flap">Pocket With
                                                                    Flap
                                                                </option>
                                                                <option value="Pleated Pocket With Flap">Pleated
                                                                    Pocket
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
                                                            <select class="form-control" size="1"
                                                                    name="MonoPosition">
                                                                <option value="Cuff">Cuff</option>
                                                                <option value="Chest">Chest</option>
                                                                <option value="Pocket">Pocket</option>
                                                                <option value="Waist">Waist</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Advance Option</label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control2" value="1"
                                                                       name="WhiteCuffs">White Cuff
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control2" value="1"
                                                                       name="WhiteCollar">White Collar
                                                            </label>
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" class="form-control2"
                                                                       name="Fit">Make
                                                                this shirt fit
                                                            </label>
                                                        </div>
                                                        <button id="nextToInvoice" type="button"
                                                                class="btn btn-success pull-right">
                                                            Invoice
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

                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@endsection