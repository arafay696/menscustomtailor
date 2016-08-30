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
                                        <li id="StylingEnable">
                                            <a href="#Styling" data-toggle="tab">Styling</a>
                                        </li>
                                        <li id="SizeEnable">
                                            <a href="#Size" data-toggle="tab">Size</a>
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
                                                    <button id="nextToStyleDetail" type="button"
                                                            class="btn btn-success pull-right">
                                                        Next
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="Styling">
                                            <h4>Messages Tab</h4>
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
                                        <div class="tab-pane fade" id="Size">
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