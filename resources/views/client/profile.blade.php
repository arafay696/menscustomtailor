@extends('client.default')
@section('content')
    <?php
    extract($userDetail);
    ?>
    <div class="container">
        <div class="cart_container">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head_profile clearfix">
                        <span>
                            <?php if($UserImg != ""){ ?>
                            <img src="<?php echo URL::to('resources/assets/userimages/' . $UserImg . '');?>" alt="#"/>
                            <?php }else { ?>
                            <img src="<?= URL::to('public/assets/client/images/login_img.png'); ?>" alt="#"/>
                            <?php } ?>
                        </span>
                        <h3>User Name</h3>

                        <ul class="clearfix">
                            <li><a href="<?php echo URL::to('profile');?>" class="secl_page">ACCOUNT</a></li>
                            <li><a href="<?php echo URL::to('order-history');?>">ORDER AND REVIEW</a></li>
                            <li><a href="<?php echo URL::to('measurements');?>">MY MEASUREMENTS</a></li>
                            <li><a href="<?php echo URL::to('newsletter');?>">NEWSLETTER</a></li>
                        </ul>
                    </div>

                    <form action="<?=URL::to('/doEditUser');?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="contact_container profile_form clearfix">
                            <div class="contact_form">
                                <h4>CHANGE YOUR PERSONAL DETAILS</h4>

                                <ul>
                                    <li>
                                        <label>Full Name </label>
                                        <input name="Name" type="text" value="{{$Name}}"/>
                                    </li>
                                    <li>
                                        <label>Email</label>
                                        <input name="Email" type="email" value="{{$Email}}" readonly/>
                                    </li>
                                    <li>
                                        <label>Gender</label>
                                        <div class="customselect">
                                            <span>{{$Gender}}</span>
                                            <select name="Gender">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <label>Phone Number</label>
                                        <input name="Phone" type="text" value="{{$Phone}}"/>
                                    </li>
                                    <li>
                                        <label>Company</label>
                                        <input name="Company" type="text" value="{{$Company}}"/>
                                    </li>
                                    <li>
                                        <label>Address</label>
                                        <input name="Address" type="text" value="{{$Address}}"/>
                                    </li>
                                    <li>
                                        <label>City</label>
                                        <input name="City" type="text" value="{{$City}}"/>
                                    </li>
                                    <li>
                                        <label>Country</label>
                                        <input name="Country" type="text" value="{{$Country}}"/>
                                    </li>
                                    <li>
                                        <label>Change Profile Photo</label>
                                        <br>
                                        <input name="UserImg" type="file" accept="image/*"/>
                                    </li>
                                </ul>
                            </div>

                            <div class="contact_map_section">
                                <div class="profile_pages_list">
                                    <ul>
                                        <li><a href="#" class="secl_page"> Edit Your Account Information</a></li>
                                        <li><a href="<?php echo URL::to('change-password');?>">Change Your Password</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>


                        <div class="cancel_save">
                            <a href="#">Cancel</a>
                            <input type="submit" value="Save"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection