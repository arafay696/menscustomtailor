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
                        <h3>Order Detail - <?=$OrderID;?></h3>

                        <ul class="clearfix">
                            <li><a href="<?php echo URL::to('profile');?>">ACCOUNT</a></li>
                            <li><a href="<?php echo URL::to('order-history');?>" class="secl_page">ORDER AND REVIEW</a>
                            </li>
                            <li><a href="<?php echo URL::to('measurements');?>">MY MEASUREMENTS</a></li>
                            <li><a href="<?php echo URL::to('newsletter');?>">NEWSLETTER</a></li>
                        </ul>
                    </div>
                    <br><br><br>

                    <div class="cart_listing_outer order_view orderDetailMain">
                        <?php
                        if(count($shirtDetail) > 0) {
                        foreach ($shirtDetail as $sd){
                        ?>
                        <h3><?=$sd->Code;?>, <?=$sd->Name;?>: <?=$sd->Qty;?> Price: $<?=$sd->Price;?></h3>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Collar Style:</th>
                                <td><?=$sd->CollarStyle;?></td>
                            </tr>
                            <tr>
                                <th>Front Style:</th>
                                <td><?=$sd->FrontStyle;?></td>
                            </tr>
                            <tr>
                                <th>MonogramStyle:</th>
                                <td><?=$sd->Monogram;?></td>
                            </tr>
                            <tr>
                                <th>MonogramStyle Initial:</th>
                                <td><?=$sd->MonoInitials;?></td>
                            </tr>
                            <tr>
                                <th>MonogramStyle Color:</th>
                                <td><?=$sd->MonoColor;?></td>
                            </tr>
                            <tr>
                                <th>MonogramStyle Location:</th>
                                <td><?=$sd->MonoPosition;?></td>
                            </tr>
                            </thead>
                        </table>
                        <?php
                        }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection