@extends('admin.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="float: left">Edit User</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit User
                    </div>
                    <form name="myForm" role="form" method="post"
                          action="<?php echo URL::to('admin/user/edit-user/'.$userID.''); ?>">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="spacer-2x"></span>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" name="Name" value="<?=$user->Name;?>">

                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="Password"
                                               placeholder="Enter text" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Company</label>
                                        <select class="form-control" value="<?=$user->Company;?>">
                                            <option>Production</option>
                                            <option>Main Store</option>
                                            <option>Giorgenti Township</option>
                                            <option>Alfateh</option>
                                            <option>Ammar Belal</option>
                                            <option>BCS</option>
                                            <option>Mall of Lahore</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="Email"
                                               value="<?=$user->Email;?>">

                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Re-enter Password</label>
                                        <input class="form-control" type="password" name="Reenter" required="required"
                                               placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" name="Phone" value="<?=$user->Phone;?>"
                                               placeholder="Enter text">
                                    </div>

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-12">
                                    <span class="spacer-2x"></span>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" name="Type" value="<?=$user->Type;?>">
                                            <option>Dealer</option>
                                            <option>Merchant</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control" name="Address" value="<?=$user->Address;?>">
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <input class="form-control" name="City" value="<?=$user->City;?>"
                                               placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <input class="form-control" name="State" value="<?=$user->State;?>"
                                               placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input class="form-control" name="Country" value="<?=$user->Country;?>"
                                               placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>ZipCode</label>
                                        <input class="form-control" name="ZipCode" value="<?=$user->ZipCode;?>"
                                               placeholder="Enter text">
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