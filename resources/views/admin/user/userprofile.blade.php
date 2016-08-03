<?php
extract($userData);
?>
<style>
    .input-group-addon {
        min-width: 123px;
    }
</style>
@extends('admin.default')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-sm-10">
                <h1 class=""><?=$Email;?></h1>

                <br>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-muted" contenteditable="false">
                        Profile
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left">
                            <strong class="">
                                Joined
                            </strong>
                        </span> <?php echo date('d F Y', strtotime($Dat));?>
                    </li>
                    <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong class="">
                                Name
                            </strong>
                        </span>
                        <?=$Name;?>
                    </li>
                </ul>

            </div>
            <!--/col-3-->
            <div class="col-sm-9" style="" contenteditable="false">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                    </div>
                @endif
                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="panel panel-default target">
                    <div class="panel-heading"
                         contenteditable="false">Update Setting
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form method="post" name="updateUser" id="updateUser"
                                  action="<?php echo url('admin/userprofile/update'); ?>">
                                <input type="hidden" name="_token" id="csrf-token" value="<?php echo csrf_token() ?>"/>
                                <input type="hidden" name="userID" id="userID" value="<?=$ID;?>"/>

                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Name</span>
                                        <input name="name" id="name" type="text" class="form-control"
                                               value="<?=$Name;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Email</span>
                                        <input name="email" id="email" type="text" class="form-control"
                                               value="<?=$Email;?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Phone</span>
                                        <input name="cellnumber" id="cellnumber" type="text" class="form-control"
                                               value="<?=$Phone;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Phone</span>
                                        <input name="cellnumber" id="cellnumber" type="text" class="form-control"
                                               value="<?=$Phone;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Company</span>
                                        <input name="cellnumber" id="cellnumber" type="text" class="form-control"
                                               value="<?=$Company;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Address</span>
                                        <input name="cellnumber" id="cellnumber" type="text" class="form-control"
                                               value="<?=$Address;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">City</span>
                                        <input name="cellnumber" id="cellnumber" type="text" class="form-control"
                                               value="<?=$City;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">State</span>
                                        <input name="cellnumber" id="cellnumber" type="text" class="form-control"
                                               value="<?=$State;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Country</span>
                                        <input name="cellnumber" id="cellnumber" type="text" class="form-control"
                                               value="<?=$Country;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Zip Code</span>
                                        <input name="cellnumber" id="cellnumber" type="text" class="form-control"
                                               value="<?=$ZipCode;?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"
                                            style="float: right;margin-right: 5px;">Update
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
                @if(Session::has('passwordupdate'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                        {{ Session::get('passwordupdate') }}
                    </p>
                @endif
                <?php if($ID == $loginUserID) { ?>
                <div class="panel panel-default target">
                    <div class="panel-heading"
                         contenteditable="false">Update Password
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form method="post" name="updateUser" id="updateUser"
                                  action="<?php echo URL::to('admin/userprofile/profilepasswordupdate'); ?>">
                                <input type="hidden" name="_token" id="csrf-token" value="<?php echo csrf_token() ?>"/>
                                <input type="hidden" name="uID" id="uID" value="<?=$ID;?>"/>

                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Current Password</span>
                                        <input name="cpassword" id="cpassword" type="password" class="form-control"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">New Password</span>
                                        <input name="npassword" id="npassword" type="password" class="form-control"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Confirm Password</span>
                                        <input name="repassword" id="repassword" type="password" class="form-control"
                                        >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"
                                            style="float: right;margin-right: 5px;">Update Password
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
                <?php } ?>
            </div>
        </div>

    </div>

@stop