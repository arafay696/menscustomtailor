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

                    <div class="contact_container profile_form clearfix">
                        <div class="contact_form width_inc">
                            <h4>CHANGE YOUR PERSONAL DETAILS</h4>

                            <ul>
                                <li>
                                    <label>Email</label>
                                    <input type="email" value=""/>
                                </li>
                                <li>
                                    <label>Password</label>
                                    <input type="password" value=""/>
                                </li>
                                <li>
                                    <label>Retype Password</label>
                                    <input type="password" value=""/>
                                </li>
                            </ul>
                        </div>

                        <div class="contact_map_section">
                            <div class="profile_pages_list">
                                <ul>
                                    <li><a href="<?php echo URL::to('profile');?>"> Edit Your Account Information</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>


                    <div class="cancel_save">
                        <input type="submit" value="Save"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection