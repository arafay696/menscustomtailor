@extends('client.default')
@section('content')
    <div class="container">
        <div class="cart_container">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head_profile clearfix">
                        <h3>Change Password</h3>

                        <ul class="clearfix">
                            <li><a href="<?php echo URL::to('profile');?>" class="secl_page">ACCOUNT</a></li>
                            <li><a href="<?php echo URL::to('order-history');?>">ORDER AND REVIEW</a></li>
                            <li><a href="<?php echo URL::to('newsletter');?>">NEWSLETTER</a></li>
                        </ul>
                    </div>

                    <form action="<?=URL::to('/changePassword');?>" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="contact_container profile_form clearfix">
                        <div class="contact_form width_inc">
                            <h4>CHANGE YOUR PERSONAL DETAILS</h4>

                            <ul>
                                <li>
                                    <label>Current Password</label>
                                    <input name="Password" type="password" value=""/>
                                </li>
                                <li>
                                    <label>New Password</label>
                                    <input name="NewPassword" type="password" value=""/>
                                </li>
                                <li>
                                    <label>Retype Password</label>
                                    <input name="ConfirmPassword" type="password" value=""/>
                                </li>
                            </ul>
                        </div>

                        <div class="contact_map_section">
                            <div class="profile_pages_list">
                                <ul>
                                    <li><a href="<?php echo URL::to('profile');?>"> Edit Your Account Information</a>
                                    </li>
                                    <li><a class="secl_page" href="<?php echo URL::to('change-password');?>">Change Your Password</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>


                    <div class="cancel_save">
                        <input type="submit" value="Save"/>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection