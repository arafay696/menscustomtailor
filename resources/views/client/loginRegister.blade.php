@extends('client.default')
@section('content')
    <!-- Page Wrapper -->
    <div class="container">
        <div class="cart_container back_background">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head clearfix">
                        <h3>LOGIN </h3>
                    </div>

                    <div class="login_register_outer clearfix">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                            </div>
                        @endif
                        <form action="<?=URL::to('/doLogin');?>" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="returnUrl" value="<?=$returnUrl;?>">
                            <div class="login_dtail">
                                <h4>Returning customer? </h4>

                                <p>If you have shopped with us before, please enter your details in the boxes below. If
                                    you are a new customer please proceed to the Billing &amp; Shipping section.</p>

                                <div class="login_form">
                                    <ul>
                                        <li><input name="email" type="text" autocomplete=""
                                                   placeholder="Username or email address *"/></li>
                                        <li><input name="password" type="password" value="" placeholder="Password *"/>
                                        </li>
                                    </ul>
                                </div>


                                <div class="login_pasww clearfix">
                                    <input type="submit" value="Login"/>
                                    <a href="#">Lost your password?</a>
                                </div>
                            </div>
                        </form>

                        <div class="login_dtail fr_section">
                            <h4>New User</h4>

                            <p>If you have shopped with us before, please enter your details in the boxes below. If
                                you are a new customer please proceed to the Billing &amp; Shipping section.</p>
                            <form action="<?=URL::to('/doRegister');?>" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="login_form">
                                    <ul>
                                        <li><input name="Name" type="text" placeholder="Full Name" value="{{Request::old('Name')}}"/></li>
                                        <li><input name="Email" type="email" placeholder="Email address *" value="{{Request::old('Email')}}"/></li>
                                        <li><input name="Password" type="password" value="" placeholder="Password *" /></li>
                                        <li><input name="ConfirmPassword" type="password" value="" placeholder="Retype Password *" /></li>
                                    </ul>
                                </div>


                                <div class="login_pasww clearfix">
                                    <input type="submit" value="Register"/>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>   <!-- Page Wrapper -->
@endsection