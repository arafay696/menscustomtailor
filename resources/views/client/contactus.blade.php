@extends('client.default')
@section('content')
    <div class="container">
        <div class="cart_container">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head border_header clearfix">
                        <h3>Contact Us</h3>
                    </div>


                    <div class="contact_container clearfix">
                        <form name="contactForm" action="<?= URL::to('contact-us');?>" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="contact_form">
                                <h4>YOU HAVE QUESTIONS, WE HAVE ANSWERS</h4>

                                <ul>
                                    <li>
                                        <label>Name</label>
                                        <input name="name" type="text" value=""/>
                                    </li>
                                    <li>
                                        <label>Email</label>
                                        <input name="email" type="email" value=""/>
                                    </li>
                                    <li>
                                        <label>Message</label>
                                        <textarea name="message"></textarea>
                                    </li>
                                    <li><input type="submit" value="Send"/></li>
                                </ul>
                            </div>
                        </form>
                        <div class="contact_map_section">
                            <div class="map_div">
                                <img src="<?php echo URL::to('public/assets/client/images/map_img.png');?>" alt="#"/>
                            </div>

                            <div class="contact_info">
                                <h4>Contact Information</h4>
                                <p>Welcome to Men's Custom Tailor. Our office hours are Mon-Fri 9am - 5pm EST..</p>

                                <ul>
                                    <li><b>Address :</b>2523 Ferndale Ln. Snellville, GA 30078</li>
                                    <li><b>E-mail :</b> <a href="#"> info@menscustomtailor.com</a></li>
                                    <li><b>Phone :</b> Telephone (678) 740-3530</li>

                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
