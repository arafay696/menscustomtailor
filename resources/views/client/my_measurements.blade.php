@extends('client.default')
@section('content')
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL::asset('public/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>"
          rel="stylesheet">
    <div class="container">
        <div class="cart_container" style="background: none;">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head_profile clearfix">
                        <h3>My Meausurements</h3>

                        <ul class="clearfix">
                            <li><a href="<?php echo URL::to('profile');?>">ACCOUNT</a></li>
                            <li><a href="<?php echo URL::to('order-history');?>">ORDER AND REVIEW</a>
                            </li>
                            <li><a href="<?php echo URL::to('measurements');?>" class="secl_page">MY MEASUREMENTS</a>
                            </li>
                            <li><a href="<?php echo URL::to('newsletter');?>">NEWSLETTER</a></li>
                        </ul>
                    </div>
                    <br><br><br>

                    <div class="cart_listing_outer order_view orderDetailMain">
                        <form action="<?=URL::to('edit-size');?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="customerID" value="<?=$customerID;?>"/>
                        <table class="table table-striped table-bordered table-hover customerMeasure">
                            <thead>
                            <tr>
                                <th>Height Feet:</th>
                                <td>
                                    <select name="HeightFeet">
                                        <option selected="">Height Feet</option>
                                        <option <?php echo (isset($size->HeightFeet) && $size->HeightFeet == "3") ? "selected='selected'" : "" ?> value="3">
                                            3
                                        </option>
                                        <option <?php echo (isset($size->HeightFeet) && $size->HeightFeet == "4") ? "selected='selected'" : "" ?> value="4">
                                            4
                                        </option>
                                        <option <?php echo (isset($size->HeightFeet) && $size->HeightFeet == "5") ? "selected='selected'" : "" ?> value="5">
                                            5
                                        </option>
                                        <option <?php echo (isset($size->HeightFeet) && $size->HeightFeet == "6") ? "selected='selected'" : "" ?> value="6">
                                            6
                                        </option>
                                        <option <?php echo (isset($size->HeightFeet) && $size->HeightFeet == "7") ? "selected='selected'" : "" ?> value="7">
                                            7
                                        </option>
                                        <option <?php echo (isset($size->HeightFeet) && $size->HeightFeet == "8") ? "selected='selected'" : "" ?> value="8">
                                            8
                                        </option>
                                        <option <?php echo (isset($size->HeightFeet) && $size->HeightFeet == "9") ? "selected='selected'" : "" ?> value="9">
                                            9
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Height Inches:</th>
                                <td>
                                    <select name="HeightInches" size="1">
                                        <option value="0" selected="">Height Inches</option>
                                        <option <?php echo (isset($size->HeightInches) && $size->HeightInches == "1") ? "selected='selected'" : "" ?> value="1">
                                            1
                                        </option>
                                        <option <?php echo (isset($size->HeightInches) && $size->HeightInches == "2") ? "selected='selected'" : "" ?> value="2">
                                            2
                                        </option>
                                        <option <?php echo (isset($size->HeightInches) && $size->HeightInches == "3") ? "selected='selected'" : "" ?> value="3">
                                            3
                                        </option>
                                        <option <?php echo (isset($size->HeightInches) && $size->HeightInches == "4") ? "selected='selected'" : "" ?> value="4">
                                            4
                                        </option>
                                        <option <?php echo (isset($size->HeightInches) && $size->HeightInches == "5") ? "selected='selected'" : "" ?> value="5">
                                            5
                                        </option>
                                        <option <?php echo (isset($size->HeightInches) && $size->HeightInches == "6") ? "selected='selected'" : "" ?> value="6">
                                            6
                                        </option>
                                        <option <?php echo (isset($size->HeightInches) && $size->HeightInches == "7") ? "selected='selected'" : "" ?> value="7">
                                            7
                                        </option>
                                        <option <?php echo (isset($size->HeightInches) && $size->HeightInches == "8") ? "selected='selected'" : "" ?> value="8">
                                            8
                                        </option>
                                        <option <?php echo (isset($size->HeightInches) && $size->HeightInches == "9") ? "selected='selected'" : "" ?> value="9">
                                            9
                                        </option>
                                        <option <?php echo (isset($size->HeightInches) && $size->HeightInches == "10") ? "selected='selected'" : "" ?> value="10">
                                            10
                                        </option>
                                        <option <?php echo (isset($size->HeightInches) && $size->HeightInches == "11") ? "selected='selected'" : "" ?> value="11">
                                            11
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Weight</th>
                                <td>
                                    <select title="Weight" size="1" name="Weight">
                                        <option value="">Select Weight</option>
                                        <?php
                                        for($i = 90;$i <= 450;$i++) {
                                        ?>
                                        <option <?php echo (isset($size->Weight) && $size->Weight == $i) ? "selected='selected'" : "" ?> value="<?=$i;?>">
                                            <?=$i;?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Neck Height:</th>
                                <td>
                                    <select name="NeckHeight">
                                        <option>Select Neck Height</option>
                                        <option value="Short" <?php echo (isset($size->NeckHeight) && $size->NeckHeight == "Short") ? "selected='selected'" : "" ?>>
                                            Short
                                        </option>
                                        <option value="Average" <?php echo (isset($size->NeckHeight) && $size->NeckHeight == "Average") ? "selected='selected'" : "" ?>>
                                            Average
                                        </option>
                                        <option value="Long" <?php echo (isset($size->NeckHeight) && $size->NeckHeight == "Long") ? "selected='selected'" : "" ?>>
                                            Long
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Sleeve Length:</th>
                                <td>
                                    <select title="Sleeve Length" name="SleeveLength">
                                        <option value="">Select Sleeve Length</option>
                                        <option value="24" <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "24") ? "selected='selected'" : "" ?>>
                                            24
                                        </option>
                                        <option value="24 1/4" <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "24 1/4") ? "selected='selected'" : "" ?>>
                                            24 1/4
                                        </option>
                                        <option value="24 1/2" <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "24 1/2") ? "selected='selected'" : "" ?>>
                                            24 1/2
                                        </option>
                                        <option value="24 3/4" <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "24 3/4") ? "selected='selected'" : "" ?>>
                                            24 3/4
                                        </option>
                                        <option value="25" <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "25") ? "selected='selected'" : "" ?>>
                                            25
                                        </option>
                                        <option value="25 1/4" <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "25 1/4") ? "selected='selected'" : "" ?>>
                                            25 1/4
                                        </option>
                                        <option value="25 1/2" <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "25 1/2") ? "selected='selected'" : "" ?>>
                                            25 1/2
                                        </option>
                                        <option value="25 3/4" <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "25 3/4") ? "selected='selected'" : "" ?>>
                                            25 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "26") ? "selected='selected'" : "" ?> value="26">
                                            26
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "26 1/4") ? "selected='selected'" : "" ?> value="26 1/4">
                                            26 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "26 1/2") ? "selected='selected'" : "" ?> value="26 1/2">
                                            26 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "26 3/4") ? "selected='selected'" : "" ?> value="26 3/4">
                                            26 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "27") ? "selected='selected'" : "" ?> value="27">
                                            27
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "27 1/4") ? "selected='selected'" : "" ?> value="27 1/4">
                                            27 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "27 1/2") ? "selected='selected'" : "" ?> value="27 1/2">
                                            27 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "27 3/4") ? "selected='selected'" : "" ?> value="27 3/4">
                                            27 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "28") ? "selected='selected'" : "" ?> value="28">
                                            28
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "28 1/4") ? "selected='selected'" : "" ?> value="28 1/4">
                                            28 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "28 1/2") ? "selected='selected'" : "" ?> value="28 1/2">
                                            28 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "28 3/4") ? "selected='selected'" : "" ?> value="28 3/4">
                                            28 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "29") ? "selected='selected'" : "" ?> value="29">
                                            29
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "29 1/4") ? "selected='selected'" : "" ?> value="29 1/4">
                                            29 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "29 1/2") ? "selected='selected'" : "" ?> value="29 1/2">
                                            29 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "29 3/4") ? "selected='selected'" : "" ?> value="29 3/4">
                                            29 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "30") ? "selected='selected'" : "" ?> value="30">
                                            30
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                            30 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                            30 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                            30 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "31") ? "selected='selected'" : "" ?> value="31">
                                            31
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                            31 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                            31 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                            31 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "32") ? "selected='selected'" : "" ?> value="32">
                                            32
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                            32 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                            32 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                            32 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "33") ? "selected='selected'" : "" ?> value="33">
                                            33
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                            33 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                            33 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                            33 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "34") ? "selected='selected'" : "" ?> value="34">
                                            34
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                            34 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                            34 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                            34 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "35") ? "selected='selected'" : "" ?> value="35">
                                            35
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                            35 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                            35 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "36") ? "selected='selected'" : "" ?> value="35 3/4">
                                            35 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "36") ? "selected='selected'" : "" ?> value="36">
                                            36
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                            36 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                            36 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                            36 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "37") ? "selected='selected'" : "" ?> value="37">
                                            37
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                            37 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                            37 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                            37 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "38") ? "selected='selected'" : "" ?> value="38">
                                            38
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                            38 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                            38 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                            38 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "39") ? "selected='selected'" : "" ?> value="39">
                                            39
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                            39 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                            39 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                            39 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "40") ? "selected='selected'" : "" ?> value="40">
                                            40
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                            40 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                            40 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                            40 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "41") ? "selected='selected'" : "" ?> value="41">
                                            41
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                            41 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                            41 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                            41 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "42") ? "selected='selected'" : "" ?> value="42">
                                            42
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                            42 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                            42 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                            42 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "43") ? "selected='selected'" : "" ?> value="43">
                                            43
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                            43 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                            43 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                            43 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "44") ? "selected='selected'" : "" ?> value="44">
                                            44
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                            44 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                            44 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                            44 3/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "45") ? "selected='selected'" : "" ?> value="45">
                                            45
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                            45 1/4
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                            45 1/2
                                        </option>
                                        <option <?php echo (isset($size->LeftSleeve) && $size->LeftSleeve == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                            45 3/4
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Neck Size:</th>
                                <td>
                                    <select name="NeckHeight">
                                        <option>Select Neck Height</option>
                                        <option value="Short" <?php echo (isset($size->NeckHeight) && $size->NeckHeight == "Short") ? "selected='selected'" : "" ?>>
                                            Short
                                        </option>
                                        <option value="Average" <?php echo (isset($size->NeckHeight) && $size->NeckHeight == "Average") ? "selected='selected'" : "" ?>>
                                            Average
                                        </option>
                                        <option value="Long" <?php echo (isset($size->NeckHeight) && $size->NeckHeight == "Long") ? "selected='selected'" : "" ?>>
                                            Long
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Chest Description:</th>
                                <td>
                                    <select name="ChestDescription">
                                        <option>Select Chest Description</option>
                                        <option <?php echo (isset($size->ChestDescription) && $size->ChestDescription == "Slender") ? "selected='selected'" : "" ?> value="Slender">
                                            Slender
                                        </option>
                                        <option <?php echo (isset($size->ChestDescription) && $size->ChestDescription == "Regular Build") ? "selected='selected'" : "" ?> value="Regular Build">
                                            Regular Build
                                        </option>
                                        <option <?php echo (isset($size->ChestDescription) && $size->ChestDescription == "Very Muscular") ? "selected='selected'" : "" ?> value="Very Muscular">
                                            Very Muscular
                                        </option>
                                        <option <?php echo (isset($size->ChestDescription) && $size->ChestDescription == "Husky / Hefty") ? "selected='selected'" : "" ?> value="Husky / Hefty">
                                            Husky / Hefty
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Chest Size:</th>
                                <td>
                                    <select name="Chest">
                                        <option>Select Chest Size</option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "30") ? "selected='selected'" : "" ?> value="30">
                                            30
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                            30 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                            30 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                            30 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "31") ? "selected='selected'" : "" ?> value="31">
                                            31
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                            31 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                            31 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                            31 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "32") ? "selected='selected'" : "" ?> value="32">
                                            32
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                            32 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                            32 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                            32 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "33") ? "selected='selected'" : "" ?> value="33">
                                            33
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                            33 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                            33 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                            33 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "34") ? "selected='selected'" : "" ?> value="34">
                                            34
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                            34 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                            34 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                            34 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "35") ? "selected='selected'" : "" ?> value="35">
                                            35
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                            35 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                            35 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "35 3/4") ? "selected='selected'" : "" ?> value="35 3/4">
                                            35 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "36") ? "selected='selected'" : "" ?> value="36">
                                            36
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                            36 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                            36 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                            36 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "37") ? "selected='selected'" : "" ?> value="37">
                                            37
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                            37 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                            37 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                            37 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "38") ? "selected='selected'" : "" ?> value="38">
                                            38
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                            38 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                            38 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                            38 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "39") ? "selected='selected'" : "" ?> value="39">
                                            39
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                            39 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                            39 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                            39 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "40") ? "selected='selected'" : "" ?> value="40">
                                            40
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                            40 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                            40 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                            40 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "41") ? "selected='selected'" : "" ?> value="41">
                                            41
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                            41 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                            41 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                            41 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "42") ? "selected='selected'" : "" ?> value="42">
                                            42
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                            42 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                            42 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                            42 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "43") ? "selected='selected'" : "" ?> value="43">
                                            43
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                            43 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                            43 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                            43 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "44") ? "selected='selected'" : "" ?> value="44">
                                            44
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                            44 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                            44 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                            44 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "45") ? "selected='selected'" : "" ?> value="45">
                                            45
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                            45 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                            45 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                            45 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "46") ? "selected='selected'" : "" ?> value="46">
                                            46
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "46 1/4") ? "selected='selected'" : "" ?> value="46 1/4">
                                            46 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "46 1/2") ? "selected='selected'" : "" ?> value="46 1/2">
                                            46 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "46 3/4") ? "selected='selected'" : "" ?> value="46 3/4">
                                            46 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "47") ? "selected='selected'" : "" ?> value="47">
                                            47
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "47 1/4") ? "selected='selected'" : "" ?> value="47 1/4">
                                            47 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "47 1/2") ? "selected='selected'" : "" ?> value="47 1/2">
                                            47 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "47 3/4") ? "selected='selected'" : "" ?> value="47 3/4">
                                            47 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "48") ? "selected='selected'" : "" ?> value="48">
                                            48
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "48 1/4") ? "selected='selected'" : "" ?> value="48 1/4">
                                            48 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "48 1/2") ? "selected='selected'" : "" ?> value="48 1/2">
                                            48 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "48 3/4") ? "selected='selected'" : "" ?> value="48 3/4">
                                            48 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "49") ? "selected='selected'" : "" ?> value="49">
                                            49
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "49 1/4") ? "selected='selected'" : "" ?> value="49 1/4">
                                            49 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "49 1/2") ? "selected='selected'" : "" ?> value="49 1/2">
                                            49 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "49 3/4") ? "selected='selected'" : "" ?> value="49 3/4">
                                            49 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "50") ? "selected='selected'" : "" ?> value="50">
                                            50
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "50 1/4") ? "selected='selected'" : "" ?> value="50 1/4">
                                            50 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "50 1/2") ? "selected='selected'" : "" ?> value="50 1/2">
                                            50 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "50 3/4") ? "selected='selected'" : "" ?> value="50 3/4">
                                            50 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "51") ? "selected='selected'" : "" ?> value="51">
                                            51
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "51 1/4") ? "selected='selected'" : "" ?> value="51 1/4">
                                            51 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "51 1/2") ? "selected='selected'" : "" ?> value="51 1/2">
                                            51 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "51 3/4") ? "selected='selected'" : "" ?> value="51 3/4">
                                            51 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "52") ? "selected='selected'" : "" ?> value="52">
                                            52
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "52 1/4") ? "selected='selected'" : "" ?> value="52 1/4">
                                            52 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "52 1/2") ? "selected='selected'" : "" ?> value="52 1/2">
                                            52 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "52 3/4") ? "selected='selected'" : "" ?> value="52 3/4">
                                            52 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "53") ? "selected='selected'" : "" ?> value="53">
                                            53
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "53 1/4") ? "selected='selected'" : "" ?> value="53 1/4">
                                            53 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "53 1/2") ? "selected='selected'" : "" ?> value="53 1/2">
                                            53 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "53 3/4") ? "selected='selected'" : "" ?> value="53 3/4">
                                            53 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "54") ? "selected='selected'" : "" ?> value="54">
                                            54
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "54 1/4") ? "selected='selected'" : "" ?> value="54 1/4">
                                            54 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "54 1/2") ? "selected='selected'" : "" ?> value="54 1/2">
                                            54 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "54 3/4") ? "selected='selected'" : "" ?> value="54 3/4">
                                            54 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "55") ? "selected='selected'" : "" ?> value="55">
                                            55
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "55 1/4") ? "selected='selected'" : "" ?> value="55 1/4">
                                            55 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "55 1/2") ? "selected='selected'" : "" ?> value="55 1/2">
                                            55 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "55 3/4") ? "selected='selected'" : "" ?> value="55 3/4">
                                            55 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "56") ? "selected='selected'" : "" ?> value="56">
                                            56
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "56 1/4") ? "selected='selected'" : "" ?> value="56 1/4">
                                            56 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "56 1/2") ? "selected='selected'" : "" ?> value="56 1/2">
                                            56 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "56 3/4") ? "selected='selected'" : "" ?> value="56 3/4">
                                            56 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "57") ? "selected='selected'" : "" ?> value="57">
                                            57
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "57 1/4") ? "selected='selected'" : "" ?> value="57 1/4">
                                            57 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "57 1/2") ? "selected='selected'" : "" ?> value="57 1/2">
                                            57 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "57 3/4") ? "selected='selected'" : "" ?> value="57 3/4">
                                            57 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "58") ? "selected='selected'" : "" ?> value="58">
                                            58
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "58 1/4") ? "selected='selected'" : "" ?> value="58 1/4">
                                            58 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "58 1/2") ? "selected='selected'" : "" ?> value="58 1/2">
                                            58 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "58 3/4") ? "selected='selected'" : "" ?> value="58 3/4">
                                            58 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "59") ? "selected='selected'" : "" ?> value="59">
                                            59
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "59 1/4") ? "selected='selected'" : "" ?> value="59 1/4">
                                            59 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "59 1/2") ? "selected='selected'" : "" ?> value="59 1/2">
                                            59 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "59 3/4") ? "selected='selected'" : "" ?> value="59 3/4">
                                            59 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "60") ? "selected='selected'" : "" ?> value="60">
                                            60
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "60 1/4") ? "selected='selected'" : "" ?> value="60 1/4">
                                            60 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "60 1/2") ? "selected='selected'" : "" ?> value="60 1/2">
                                            60 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "60 3/4") ? "selected='selected'" : "" ?> value="60 3/4">
                                            60 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "61") ? "selected='selected'" : "" ?> value="61">
                                            61
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "61 1/4") ? "selected='selected'" : "" ?> value="61 1/4">
                                            61 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "61 1/2") ? "selected='selected'" : "" ?> value="61 1/2">
                                            61 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "61 3/4") ? "selected='selected'" : "" ?> value="61 3/4">
                                            61 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "62") ? "selected='selected'" : "" ?> value="62">
                                            62
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "62 1/4") ? "selected='selected'" : "" ?> value="62 1/4">
                                            62 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "62 1/2") ? "selected='selected'" : "" ?> value="62 1/2">
                                            62 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "62 3/4") ? "selected='selected'" : "" ?> value="62 3/4">
                                            62 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "63") ? "selected='selected'" : "" ?> value="63">
                                            63
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "63 1/4") ? "selected='selected'" : "" ?> value="63 1/4">
                                            63 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "63 1/2") ? "selected='selected'" : "" ?> value="63 1/2">
                                            63 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "63 3/4") ? "selected='selected'" : "" ?> value="63 3/4">
                                            63 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "64") ? "selected='selected'" : "" ?> value="64">
                                            64
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "64 1/4") ? "selected='selected'" : "" ?> value="64 1/4">
                                            64 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "64 1/2") ? "selected='selected'" : "" ?> value="64 1/2">
                                            64 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "64 3/4") ? "selected='selected'" : "" ?> value="64 3/4">
                                            64 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "65") ? "selected='selected'" : "" ?> value="65">
                                            65
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "65 1/4") ? "selected='selected'" : "" ?> value="65 1/4">
                                            65 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "65 1/2") ? "selected='selected'" : "" ?> value="65 1/2">
                                            65 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "65 3/4") ? "selected='selected'" : "" ?> value="65 3/4">
                                            65 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "66") ? "selected='selected'" : "" ?> value="66">
                                            66
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "66 1/4") ? "selected='selected'" : "" ?> value="66 1/4">
                                            66 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "66 1/2") ? "selected='selected'" : "" ?> value="66 1/2">
                                            66 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "66 3/4") ? "selected='selected'" : "" ?> value="66 3/4">
                                            66 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "67") ? "selected='selected'" : "" ?> value="67">
                                            67
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "67 1/4") ? "selected='selected'" : "" ?> value="67 1/4">
                                            67 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "67 1/2") ? "selected='selected'" : "" ?> value="67 1/2">
                                            67 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "67 3/4") ? "selected='selected'" : "" ?> value="67 3/4">
                                            67 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "68") ? "selected='selected'" : "" ?> value="68">
                                            68
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "68 1/4") ? "selected='selected'" : "" ?> value="68 1/4">
                                            68 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "68 1/2") ? "selected='selected'" : "" ?> value="68 1/2">
                                            68 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "68 3/4") ? "selected='selected'" : "" ?> value="68 3/4">
                                            68 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "69") ? "selected='selected'" : "" ?> value="69">
                                            69
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "69 1/4") ? "selected='selected'" : "" ?> value="69 1/4">
                                            69 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "69 1/2") ? "selected='selected'" : "" ?> value="69 1/2">
                                            69 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "69 3/4") ? "selected='selected'" : "" ?> value="69 3/4">
                                            69 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "70") ? "selected='selected'" : "" ?> value="70">
                                            70
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "70 1/4") ? "selected='selected'" : "" ?> value="70 1/4">
                                            70 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "70 1/2") ? "selected='selected'" : "" ?> value="70 1/2">
                                            70 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "70 3/4") ? "selected='selected'" : "" ?> value="70 3/4">
                                            70 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "71") ? "selected='selected'" : "" ?> value="71">
                                            71
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "71 1/4") ? "selected='selected'" : "" ?> value="71 1/4">
                                            71 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "71 1/2") ? "selected='selected'" : "" ?> value="71 1/2">
                                            71 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "71 3/4") ? "selected='selected'" : "" ?> value="71 3/4">
                                            71 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "72") ? "selected='selected'" : "" ?> value="72">
                                            72
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "72 1/4") ? "selected='selected'" : "" ?> value="72 1/4">
                                            72 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "72 1/2") ? "selected='selected'" : "" ?> value="72 1/2">
                                            72 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "72 3/4") ? "selected='selected'" : "" ?> value="72 3/4">
                                            72 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "73") ? "selected='selected'" : "" ?> value="73">
                                            73
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "73 1/4") ? "selected='selected'" : "" ?> value="73 1/4">
                                            73 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "73 1/2") ? "selected='selected'" : "" ?> value="73 1/2">
                                            73 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "73 3/4") ? "selected='selected'" : "" ?> value="73 3/4">
                                            73 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "74") ? "selected='selected'" : "" ?> value="74">
                                            74
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "74 1/4") ? "selected='selected'" : "" ?> value="74 1/4">
                                            74 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "74 1/2") ? "selected='selected'" : "" ?> value="74 1/2">
                                            74 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "74 3/4") ? "selected='selected'" : "" ?> value="74 3/4">
                                            74 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "75") ? "selected='selected'" : "" ?> value="75">
                                            75
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "75 1/4") ? "selected='selected'" : "" ?> value="75 1/4">
                                            75 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "75 1/2") ? "selected='selected'" : "" ?> value="75 1/2">
                                            75 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "75 3/4") ? "selected='selected'" : "" ?> value="75 3/4">
                                            75 3/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "76") ? "selected='selected'" : "" ?> value="76">
                                            76
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "76 1/4") ? "selected='selected'" : "" ?> value="76 1/4">
                                            76 1/4
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "76 1/2") ? "selected='selected'" : "" ?> value="76 1/2">
                                            76 1/2
                                        </option>
                                        <option <?php echo (isset($size->Chest) && $size->Chest == "76 3/4") ? "selected='selected'" : "" ?> value="76 3/4">
                                            76 3/4
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Body Proportion:</th>
                                <td>
                                    <select size="1" name="BodyProportion">
                                        <option selected="" value="">Select Body proportion</option>
                                        <option <?php echo (isset($size->BodyProportion) && $size->BodyProportion == "Evenly Proportioned") ? "selected='selected'" : "" ?> value="Evenly Proportioned">
                                            Evenly Proportioned
                                        </option>
                                        <option <?php echo (isset($size->BodyProportion) && $size->BodyProportion == "Short Torso / Long Legs") ? "selected='selected'" : "" ?> value="Short Torso / Long Legs">
                                            Short Torso / Long Legs
                                        </option>
                                        <option <?php echo (isset($size->BodyProportion) && $size->BodyProportion == "Long Torso / Short Legs") ? "selected='selected'" : "" ?> value="Long Torso / Short Legs">
                                            Long Torso / Short Legs
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Waist:</th>
                                <td>
                                    <select title="Waist" size="1" name="Waist">
                                        <option value="">Select Waist</option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "24") ? "selected='selected'" : "" ?> value="24">
                                            24
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "24 1/4") ? "selected='selected'" : "" ?> value="24 1/4">
                                            24 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "24 1/2") ? "selected='selected'" : "" ?> value="24 1/2">
                                            24 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "24 3/4") ? "selected='selected'" : "" ?> value="24 3/4">
                                            24 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "25") ? "selected='selected'" : "" ?> value="25">
                                            25
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "25 1/4") ? "selected='selected'" : "" ?> value="25 1/4">
                                            25 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "25 1/2") ? "selected='selected'" : "" ?> value="25 1/2">
                                            25 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "25 3/4") ? "selected='selected'" : "" ?> value="25 3/4">
                                            25 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "26") ? "selected='selected'" : "" ?> value="26">
                                            26
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "26 1/3") ? "selected='selected'" : "" ?> value="26 1/4">
                                            26 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "26 1/2") ? "selected='selected'" : "" ?> value="26 1/2">
                                            26 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "26 3/4") ? "selected='selected'" : "" ?> value="26 3/4">
                                            26 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "27") ? "selected='selected'" : "" ?> value="27">
                                            27
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "27 1/4") ? "selected='selected'" : "" ?> value="27 1/4">
                                            27 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "27 1/2") ? "selected='selected'" : "" ?> value="27 1/2">
                                            27 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "27 3/4") ? "selected='selected'" : "" ?> value="27 3/4">
                                            27 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "28") ? "selected='selected'" : "" ?> value="28">
                                            28
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "28 1/4") ? "selected='selected'" : "" ?> value="28 1/4">
                                            28 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "28 1/2") ? "selected='selected'" : "" ?> value="28 1/2">
                                            28 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "28 3/4") ? "selected='selected'" : "" ?> value="28 3/4">
                                            28 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "29") ? "selected='selected'" : "" ?> value="29">
                                            29
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "29 1/4") ? "selected='selected'" : "" ?> value="29 1/4">
                                            29 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "29 1/2") ? "selected='selected'" : "" ?> value="29 1/2">
                                            29 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "29 3/4") ? "selected='selected'" : "" ?> value="29 3/4">
                                            29 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "30") ? "selected='selected'" : "" ?> value="30">
                                            30
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                            30 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                            30 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                            30 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "31") ? "selected='selected'" : "" ?> value="31">
                                            31
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                            31 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                            31 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                            31 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "32") ? "selected='selected'" : "" ?> value="32">
                                            32
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                            32 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                            32 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                            32 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "33") ? "selected='selected'" : "" ?> value="33">
                                            33
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                            33 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                            33 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                            33 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "34") ? "selected='selected'" : "" ?> value="34">
                                            34
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                            34 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                            34 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                            34 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "35") ? "selected='selected'" : "" ?> value="35">
                                            35
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                            35 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                            35 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "35 3/4") ? "selected='selected'" : "" ?> value="35 3/4">
                                            35 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "36") ? "selected='selected'" : "" ?> value="36">
                                            36
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                            36 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                            36 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                            36 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "37") ? "selected='selected'" : "" ?> value="37">
                                            37
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                            37 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                            37 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                            37 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "38") ? "selected='selected'" : "" ?> value="38">
                                            38
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                            38 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                            38 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                            38 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "39") ? "selected='selected'" : "" ?> value="39">
                                            39
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                            39 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                            39 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                            39 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "40") ? "selected='selected'" : "" ?> value="40">
                                            40
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                            40 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                            40 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                            40 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "41") ? "selected='selected'" : "" ?> value="41">
                                            41
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                            41 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                            41 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                            41 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "42") ? "selected='selected'" : "" ?> value="42">
                                            42
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                            42 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                            42 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                            42 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "43") ? "selected='selected'" : "" ?> value="43">
                                            43
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                            43 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                            43 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                            43 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "44") ? "selected='selected'" : "" ?> value="44">
                                            44
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                            44 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                            44 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                            44 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "45") ? "selected='selected'" : "" ?> value="45">
                                            45
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                            45 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                            45 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                            45 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "46") ? "selected='selected'" : "" ?> value="46">
                                            46
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "46 1/4") ? "selected='selected'" : "" ?> value="46 1/4">
                                            46 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "46 1/2") ? "selected='selected'" : "" ?> value="46 1/2">
                                            46 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "46 3/4") ? "selected='selected'" : "" ?> value="46 3/4">
                                            46 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "47") ? "selected='selected'" : "" ?> value="47">
                                            47
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "47 1/4") ? "selected='selected'" : "" ?> value="47 1/4">
                                            47 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "47 1/2") ? "selected='selected'" : "" ?> value="47 1/2">
                                            47 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "47 3/4") ? "selected='selected'" : "" ?> value="47 3/4">
                                            47 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "48") ? "selected='selected'" : "" ?> value="48">
                                            48
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "48 1/4") ? "selected='selected'" : "" ?> value="48 1/4">
                                            48 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "48 1/2") ? "selected='selected'" : "" ?> value="48 1/2">
                                            48 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "48 3/4") ? "selected='selected'" : "" ?> value="48 3/4">
                                            48 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "49") ? "selected='selected'" : "" ?> value="49">
                                            49
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "49 1/4") ? "selected='selected'" : "" ?> value="49 1/4">
                                            49 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "49 1/2") ? "selected='selected'" : "" ?> value="49 1/2">
                                            49 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "49 3/4") ? "selected='selected'" : "" ?> value="49 3/4">
                                            49 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "50") ? "selected='selected'" : "" ?> value="50">
                                            50
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "50 1/4") ? "selected='selected'" : "" ?> value="50 1/4">
                                            50 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "50 1/2") ? "selected='selected'" : "" ?> value="50 1/2">
                                            50 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "50 3/4") ? "selected='selected'" : "" ?> value="50 3/4">
                                            50 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "51") ? "selected='selected'" : "" ?> value="51">
                                            51
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "51 1/4") ? "selected='selected'" : "" ?> value="51 1/4">
                                            51 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "51 1/2") ? "selected='selected'" : "" ?> value="51 1/2">
                                            51 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "51 3/4") ? "selected='selected'" : "" ?> value="51 3/4">
                                            51 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "52") ? "selected='selected'" : "" ?> value="52">
                                            52
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "52 1/4") ? "selected='selected'" : "" ?> value="52 1/4">
                                            52 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "52 1/2") ? "selected='selected'" : "" ?> value="52 1/2">
                                            52 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "52 3/4") ? "selected='selected'" : "" ?> value="52 3/4">
                                            52 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "53") ? "selected='selected'" : "" ?> value="53">
                                            53
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "53 1/4") ? "selected='selected'" : "" ?> value="53 1/4">
                                            53 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "53 1/2") ? "selected='selected'" : "" ?> value="53 1/2">
                                            53 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "53 3/4") ? "selected='selected'" : "" ?> value="53 3/4">
                                            53 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "54") ? "selected='selected'" : "" ?> value="54">
                                            54
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "54 1/4") ? "selected='selected'" : "" ?> value="54 1/4">
                                            54 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "54 1/2") ? "selected='selected'" : "" ?> value="54 1/2">
                                            54 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "54 3/4") ? "selected='selected'" : "" ?> value="54 3/4">
                                            54 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "55") ? "selected='selected'" : "" ?> value="55">
                                            55
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "55 1/4") ? "selected='selected'" : "" ?> value="55 1/4">
                                            55 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "55 1/2") ? "selected='selected'" : "" ?> value="55 1/2">
                                            55 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "55 3/4") ? "selected='selected'" : "" ?> value="55 3/4">
                                            55 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "56") ? "selected='selected'" : "" ?> value="56">
                                            56
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "56 1/4") ? "selected='selected'" : "" ?> value="56 1/4">
                                            56 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "56 1/2") ? "selected='selected'" : "" ?> value="56 1/2">
                                            56 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "56 3/4") ? "selected='selected'" : "" ?> value="56 3/4">
                                            56 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "57") ? "selected='selected'" : "" ?> value="57">
                                            57
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "57 1/4") ? "selected='selected'" : "" ?> value="57 1/4">
                                            57 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "57 1/2") ? "selected='selected'" : "" ?> value="57 1/2">
                                            57 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "57 3/4") ? "selected='selected'" : "" ?> value="57 3/4">
                                            57 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "58") ? "selected='selected'" : "" ?> value="58">
                                            58
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "58 1/4") ? "selected='selected'" : "" ?> value="58 1/4">
                                            58 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "58 1/2") ? "selected='selected'" : "" ?> value="58 1/2">
                                            58 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "58 3/4") ? "selected='selected'" : "" ?> value="58 3/4">
                                            58 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "59") ? "selected='selected'" : "" ?> value="59">
                                            59
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "59 1/4") ? "selected='selected'" : "" ?> value="59 1/4">
                                            59 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "59 1/2") ? "selected='selected'" : "" ?> value="59 1/2">
                                            59 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "59 3/4") ? "selected='selected'" : "" ?> value="59 3/4">
                                            59 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "60") ? "selected='selected'" : "" ?> value="60">
                                            60
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "60 1/4") ? "selected='selected'" : "" ?> value="60 1/4">
                                            60 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "60 1/2") ? "selected='selected'" : "" ?> value="60 1/2">
                                            60 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "60 3/4") ? "selected='selected'" : "" ?> value="60 3/4">
                                            60 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "61") ? "selected='selected'" : "" ?> value="61">
                                            61
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "61 1/4") ? "selected='selected'" : "" ?> value="61 1/4">
                                            61 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "61 1/2") ? "selected='selected'" : "" ?> value="61 1/2">
                                            61 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "61 3/4") ? "selected='selected'" : "" ?> value="61 3/4">
                                            61 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "62") ? "selected='selected'" : "" ?> value="62">
                                            62
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "62 1/4") ? "selected='selected'" : "" ?> value="62 1/4">
                                            62 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "62 1/2") ? "selected='selected'" : "" ?> value="62 1/2">
                                            62 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "62 3/4") ? "selected='selected'" : "" ?> value="62 3/4">
                                            62 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "63") ? "selected='selected'" : "" ?> value="63">
                                            63
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "63 1/4") ? "selected='selected'" : "" ?> value="63 1/4">
                                            63 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "63 1/2") ? "selected='selected'" : "" ?> value="63 1/2">
                                            63 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "63 3/4") ? "selected='selected'" : "" ?> value="63 3/4">
                                            63 3/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "64") ? "selected='selected'" : "" ?> value="64">
                                            64
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "64 1/4") ? "selected='selected'" : "" ?> value="64 1/4">
                                            64 1/4
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "64 1/2") ? "selected='selected'" : "" ?> value="64 1/2">
                                            64 1/2
                                        </option>
                                        <option <?php echo (isset($size->Waist) && $size->Waist == "64 3/4") ? "selected='selected'" : "" ?> value="64 3/4">
                                            64 3/4
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Body Shape:</th>
                                <td>
                                    <select name="BodyShape">
                                        <option selected="" value="">Select Body Shape</option>
                                        <option <?php echo (isset($size->BodyShape) && $size->BodyShape == "Average") ? "selected='selected'" : "" ?> value="Average">
                                            Average
                                        </option>
                                        <option <?php echo (isset($size->BodyShape) && $size->BodyShape == "Athletic") ? "selected='selected'" : "" ?> value="Athletic">
                                            Athletic
                                        </option>
                                        <option <?php echo (isset($size->BodyShape) && $size->BodyShape == "Portly") ? "selected='selected'" : "" ?> value="Portly">
                                            Portly
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Posture:</th>
                                <td>
                                    <select name="Posture">
                                        <option selected="" value="">Select Posture</option>
                                        <option <?php echo (isset($size->Posture) && $size->Posture == "Flat") ? "selected='selected'" : "" ?> value="Flat">
                                            Flat
                                        </option>
                                        <option <?php echo (isset($size->Posture) && $size->Posture == "Average") ? "selected='selected'" : "" ?> value="Average">
                                            Average
                                        </option>
                                        <option <?php echo (isset($size->Posture) && $size->Posture == "Rounded") ? "selected='selected'" : "" ?> value="Rounded">
                                            Rounded
                                        </option>
                                        <option <?php echo (isset($size->Posture) && $size->Posture == "Stout") ? "selected='selected'" : "" ?> value="Stout">
                                            Stout
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Shoulder:</th>
                                <td>
                                    <select size="1" name="Shoulder">
                                        <option selected="" value="">Select Shoulder Type</option>
                                        <option <?php echo (isset($size->Shoulder) && $size->Shoulder == "Sloping") ? "selected='selected'" : "" ?> value="Sloping">
                                            Sloping
                                        </option>
                                        <option <?php echo (isset($size->Shoulder) && $size->Shoulder == "Average") ? "selected='selected'" : "" ?> value="Average">
                                            Average
                                        </option>
                                        <option <?php echo (isset($size->Shoulder) && $size->Shoulder == "Square") ? "selected='selected'" : "" ?> value="Square">
                                            Square
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            </thead>
                        </table>
                        <div class="cancel_save cMeasureButton">
                            <input type="submit" value="Change"/>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection