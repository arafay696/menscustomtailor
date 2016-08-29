@extends('admin.default')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Order</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Order
                    </div>
                    <form name="myForm" role="form" method="post" enctype="multipart/form-data"
                          action="<?php echo URL::to('admin/product/add-product'); ?>">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="nav nav-pills">
                                        <li class="active"><a href="#CustomerDetail" data-toggle="tab">Customer
                                                Details</a>
                                        </li>
                                        <li><a href="#ProductDetail" data-toggle="tab">Product Detail</a>
                                        </li>
                                        <li><a href="#Styling" data-toggle="tab">Styling</a>
                                        </li>
                                        <li><a href="#Size" data-toggle="tab">Size</a>
                                        </li>
                                        <li><a href="#Invoice" data-toggle="tab">Invoice</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="CustomerDetail">
                                            <hr />
                                            <div class="col-lg-12">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Customer</label>
                                                        <input class="form-control" name="Name">
                                                        <p class="help-block">
                                                            Autocomplete Name.
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input class="form-control" name="firstname">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input class="form-control" name="phone">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" name="Email">
                                                        <p class="help-block">
                                                            Customer Email.
                                                        </p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input class="form-control" name="lastname">

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Fax</label>
                                                        <input class="form-control" name="fax">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="ProductDetail">
                                            <h4>Profile Tab</h4>
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