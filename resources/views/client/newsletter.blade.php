@extends('client.default')
@section('content')
    <div class="container">
        <div class="cart_container">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head_profile clearfix">
                        <h3 class="font_dec">Subscribe/Unsubscribe</h3>

                        <ul class="clearfix">
                            <li><a href="<?php echo URL::to('profile');?>">ACCOUNT</a></li>
                            <li><a href="<?php echo URL::to('order-history');?>">ORDER AND REVIEW</a></li>
                            <li><a href="<?php echo URL::to('measurements');?>">MY MEASUREMENTS</a></li>
                            <li><a href="<?php echo URL::to('newsletter');?>" class="secl_page">NEWSLETTER</a></li>
                        </ul>
                    </div>

                    <div class="contact_container profile_form clearfix">
                        <div class="contact_form width_inc">
                            <h4>CHANGE YOUR PERSONAL DETAILS</h4>

                            <div class="check_oyr_paypal">
                                <div class="artistProducer clearfix">
                                    <label class=""><input type="radio" name="producer"> Yes</label>
                                </div>

                                <div class="artistProducer clearfix">
                                    <label class=""><input type="radio" name="producer"> No </label>
                                </div>
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