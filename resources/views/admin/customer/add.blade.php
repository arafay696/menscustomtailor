@extends('admin.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Customer</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Customer
                    </div>
                    <form name="myForm" role="form" method="post"
                          action="<?php echo URL::to('admin/customer/new'); ?>" autocomplete="off">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="spacer-2x"></span>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input value="" class="form-control" placeholder="Enter Name" type="text" name="Name" tabindex="1" autocomplete="off" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input tabindex="3" class="form-control" type="password" name="Password"
                                               placeholder="Enter Password" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input tabindex="5" class="form-control" type="text" name="Company"
                                                   placeholder="Enter Company">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select tabindex="7" class="form-control" name="Gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" placeholder="Enter Email" class="form-control" name="Email" tabindex="2">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" type="password" required="required"
                                               name="RePassword" placeholder="Confirm Password" tabindex="4">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" name="Phone" placeholder="Enter Phone" tabindex="6">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" tabindex="8">
                                            <?php foreach ($status as $st) { ?>
                                            <option value="<?=$st->ID;?>">
                                                <?=$st->Name;?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-12">
                                    <span class="spacer-2x"></span>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control" name="Address" tabindex="9">
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <input class="form-control" name="City" placeholder="Enter City" tabindex="10">
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input class="form-control" name="Country" placeholder="Enter Country" tabindex="11">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="reset" class="btn btn-primary pull-right" style="margin-left: 4px;">
                                        Reset Button
                                    </button>
                                    <button type="submit" class="btn btn-success pull-right">
                                        Submit
                                    </button>
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