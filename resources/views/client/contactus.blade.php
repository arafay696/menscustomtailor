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
                        <div class="contact_form">
                            <h4>YOU HAVE QUESTIONS, WE HAVE ANSWERS</h4>

                            <ul>
                                <li>
                                    <label>Name</label>
                                    <input type="text" value=""/>
                                </li>
                                <li>
                                    <label>Email</label>
                                    <input type="email" value=""/>
                                </li>
                                <li>
                                    <label>Message</label>
                                    <textarea></textarea>
                                </li>
                                <li><input type="submit" value="Send"/></li>
                            </ul>
                        </div>

                        <div class="contact_map_section">
                            <div class="map_div">
                                <img src="<?php echo URL::to('public/assets/client/images/map_img.png');?>" alt="#"/>
                            </div>

                            <div class="contact_info">
                                <h4>Contact Informations</h4>
                                <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</p>

                                <ul>
                                    <li><b>Address :</b>3379, Peachtree Rd Atlanta, GA 30326</li>
                                    <li><b>E-mail :</b> <a href="#">email@domain.com</a></li>
                                    <li><b>Phone :</b> +1 111-888-000</li>
                                    <li><b>Fax : </b> +1 111-888-0001</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
