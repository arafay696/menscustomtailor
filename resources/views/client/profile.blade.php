@extends('client.default')
@section('content')
    <div class="container">
        <div class="cart_container">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head_profile clearfix">
                        <span><img src="<?php echo URL::to('public/assets/client/images/profile_img.png');?>" alt="#"/></span>
                        <h3>User Name</h3>

                        <ul class="clearfix">
                            <li><a href="<?php echo URL::to('profile');?>" class="secl_page">ACCOUNT</a></li>
                            <li><a href="<?php echo URL::to('order-history');?>">ORDER AND REVIEW</a></li>
                            <li><a href="<?php echo URL::to('newsletter');?>">NEWSLETTER</a></li>
                        </ul>
                    </div>

                    <div class="contact_container profile_form clearfix">
                        <div class="contact_form">
                            <h4>CHANGE YOUR PERSONAL DETAILS</h4>

                            <ul>
                                <li>
                                    <label>First Name </label>
                                    <input type="text" value=""/>
                                </li>
                                <li>
                                    <label>Last Name </label>
                                    <input type="text" value=""/>
                                </li>
                                <li>
                                    <label>User Name</label>
                                    <input type="text" value=""/>
                                </li>
                                <li>
                                    <label>Email</label>
                                    <input type="email" value=""/>
                                </li>
                                <li>
                                    <label>Gender</label>
                                    <div class="customselect">
                                        <span>Male</span>
                                        <select>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <label>Phone Number</label>
                                    <input type="text" value=""/>
                                </li>
                                <li>
                                    <label>Company</label>
                                    <input type="text" value=""/>
                                </li>
                                <li>
                                    <label>Fax</label>
                                    <input type="email" value=""/>
                                </li>
                                <li>
                                    <label>Change Profile Photo</label>
                                    <br>
                                    <input type="file" value=""/>
                                </li>
                            </ul>
                        </div>

                        <div class="contact_map_section">
                            <div class="profile_pages_list">
                                <ul>
                                    <li><a href="#" class="secl_page"> Edit Your Account Information</a></li>
                                    <li><a href="<?php echo URL::to('change-password');?>">Change Your Password</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>


                    <div class="cancel_save">
                        <a href="#">Cancel</a>
                        <input type="submit" value="Save"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection