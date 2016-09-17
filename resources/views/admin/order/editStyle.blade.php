@extends('admin.default')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Style</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Style
                    </div>
                    <form name="myForm" role="form" method="post" enctype="multipart/form-data"
                          action="<?php echo URL::to('admin/shirt/edit'); ?>">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="formStylingPost" method="post" action="<?=URL::to('admin/shirt/edit');?>"
                                          name="formStyling">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <input type="hidden" name="shirtDetailID" value="<?=$shirtID;?>"/>
                                        <input type="hidden" name="orderID" value="<?=$orderID;?>"/>
                                        <input type="hidden" name="customerID" value="<?=$customerID;?>"/>
                                        <input id="InProductCode" type="hidden" name="productID"
                                               value="<?=$shirtDetail->FabricCode;?>"/>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Choose Fabric</label>
                                                <input id="loadFabricCode" class="form-control" name="FabricCode"
                                                       value="<?=$shirtDetail->FabricCode;?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Collar Style</label>
                                                <select class="form-control" size="1" name="CollarStyle">
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Traditional Point") ? "selected='selected'" : "" ?> value="Traditional Point">
                                                        Traditional Point
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Curve Point") ? "selected='selected'" : "" ?> value="Curve Point">
                                                        Curve Point
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Narrow Point") ? "selected='selected'" : "" ?> value="Narrow Point">
                                                        Narrow Point
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Medium Spread") ? "selected='selected'" : "" ?> value="Medium Spread">
                                                        Medium Spread
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Wide Spread") ? "selected='selected'" : "" ?> value="Wide Spread">
                                                        Wide Spread
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Wide Spread 2 Button") ? "selected='selected'" : "" ?> value="Wide Spread 2 Button">
                                                        Wide Spread 2 Button
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Extreme Wide Spread Straightaway") ? "selected='selected'" : "" ?> value="Extreme Wide Spread Straightaway">
                                                        Extreme Wide Spread Straightaway
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Button Down") ? "selected='selected'" : "" ?> value="Button Down">
                                                        Button Down
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Hidden Button Down") ? "selected='selected'" : "" ?> value="Hidden Button Down">
                                                        Hidden Button Down
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Michael Jordan Collar") ? "selected='selected'" : "" ?> value="Michael Jordan Collar">
                                                        Michael Jordan Collar
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Tab Collar") ? "selected='selected'" : "" ?> value="Tab Collar">
                                                        Tab Collar
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Traditional Band Collar") ? "selected='selected'" : "" ?> value="Traditional Band Collar">
                                                        Traditional Band Collar
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarStyle) && $shirtDetail->CollarStyle == "Versace Band Collar") ? "selected='selected'" : "" ?> value="Versace Band Collar">
                                                        Versace Band Collar
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Front Style</label>
                                                <select class="form-control" size="1" name="FrontStyle">
                                                    <option <?php echo (isset($shirtDetail->FrontStyle) && $shirtDetail->FrontStyle == "Tab Front") ? "selected='selected'" : "" ?> value="Tab Front">
                                                        Tab Front
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->FrontStyle) && $shirtDetail->FrontStyle == "Tab Front Edge Stitch 1 ¼") ? "selected='selected'" : "" ?> value="Tab Front Edge Stitch 1 ¼">
                                                        Tab Front Edge Stitch 1 ¼
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->FrontStyle) && $shirtDetail->FrontStyle == "French Front") ? "selected='selected'" : "" ?> value="French Front">
                                                        French Front
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->FrontStyle) && $shirtDetail->FrontStyle == "Sport Front") ? "selected='selected'" : "" ?> value="Sport Front">
                                                        Sport Front
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->FrontStyle) && $shirtDetail->FrontStyle == "Fly Front") ? "selected='selected'" : "" ?> value="Fly Front">
                                                        Fly Front
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->FrontStyle) && $shirtDetail->FrontStyle == "Plain Front") ? "selected='selected'" : "" ?> value="Plain Front">
                                                        Plain Front
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->FrontStyle) && $shirtDetail->FrontStyle == "Plain Front-4 studs") ? "selected='selected'" : "" ?> value="Plain Front-4 studs">
                                                        Plain Front-4 studs
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->FrontStyle) && $shirtDetail->FrontStyle == "4 studs ¼ pleats") ? "selected='selected'" : "" ?> value="4 studs ¼ pleats">
                                                        4 studs ¼ pleats
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->FrontStyle) && $shirtDetail->FrontStyle == "4 studs ½ pleats") ? "selected='selected'" : "" ?> value="4 studs ½ pleats">
                                                        4 studs ½ pleats
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->FrontStyle) && $shirtDetail->FrontStyle == "Bosom Front") ? "selected='selected'" : "" ?> value="Bosom Front">
                                                        Bosom Front
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Pocket Style</label>
                                                <select class="form-control" size="1"
                                                        name="PocketStyle">
                                                    <option <?php echo (isset($shirtDetail->PocketStyle) && $shirtDetail->PocketStyle == "Regular Pocket") ? "selected='selected'" : "" ?> value="Regular Pocket">
                                                        Regular Pocket
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->PocketStyle) && $shirtDetail->PocketStyle == "Round Cornered Pocket") ? "selected='selected'" : "" ?> value="Round Cornered Pocket">
                                                        Round Cornered Pocket
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->PocketStyle) && $shirtDetail->PocketStyle == "Angle Corner Pocket") ? "selected='selected'" : "" ?> value="Angle Corner Pocket">
                                                        Angle Corner Pocket
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->PocketStyle) && $shirtDetail->PocketStyle == "Pocket With Flap") ? "selected='selected'" : "" ?> value="Pocket With Flap">
                                                        Pocket With Flap
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->PocketStyle) && $shirtDetail->PocketStyle == "Pleated Pocket With Flap") ? "selected='selected'" : "" ?> value="Pleated Pocket With Flap">
                                                        Pleated Pocket With Flap
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Monogram</label>
                                                <select class="form-control" size="1" name="Monogram">
                                                    <option <?php echo (isset($shirtDetail->Monogram) && $shirtDetail->Monogram == "No Monogram") ? "selected='selected'" : "" ?> value="No Monogram">
                                                        No Monogram
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->Monogram) && $shirtDetail->Monogram == "Block Letters") ? "selected='selected'" : "" ?> value="Block Letters">
                                                        Block Letters
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->Monogram) && $shirtDetail->Monogram == "Script") ? "selected='selected'" : "" ?> value="Script">
                                                        Script
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Monogram Initials</label>
                                                <input class="form-control" name="MonoInitials"
                                                       value="<?php echo $shirtDetail->MonoInitials; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Label</label>
                                                <select class="form-control" name="Label">
                                                    <?php foreach ($Label as $lbl) { ?>
                                                    <option <?php echo ($shirtDetail->Label == $lbl) ? "selected=selected" : ""; ?> value="<?=$lbl;?>"><?=$lbl;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Collar Stays</label>
                                                <input class="form-control" name="CollarStays"
                                                       value="<?php echo $shirtDetail->CollarStays; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Fabric Price</label>
                                                <input id="customerPrice" class="form-control" name="FabricPrice" value="<?=$shirtDetail->Price;?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Collar Length</label>
                                                <select class="form-control" size="1" name="CollarLength">
                                                    <option <?php echo (isset($shirtDetail->CollarLength) && $shirtDetail->CollarLength == "3 Average") ? "selected='selected'" : "" ?> value="3 Average">
                                                        3 Average
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarLength) && $shirtDetail->CollarLength == "3 1/4") ? "selected='selected'" : "" ?> value="3 1/4">
                                                        3 1/4
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarLength) && $shirtDetail->CollarLength == "3 1/2 Long") ? "selected='selected'" : "" ?> value="3 1/2 Long">
                                                        3 1/2 Long
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarLength) && $shirtDetail->CollarLength == "3 3/4") ? "selected='selected'" : "" ?> value="3 3/4">
                                                        3 3/4
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarLength) && $shirtDetail->CollarLength == "3 3/4") ? "selected='selected'" : "" ?> value="3 3/4">
                                                        2 Short
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarLength) && $shirtDetail->CollarLength == "2 1/4") ? "selected='selected'" : "" ?> value="2 1/4">
                                                        2 1/4
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarLength) && $shirtDetail->CollarLength == "2 1/2") ? "selected='selected'" : "" ?> value="2 1/2">
                                                        2 1/2
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarLength) && $shirtDetail->CollarLength == "2 3/4") ? "selected='selected'" : "" ?> value="2 3/4">
                                                        2 3/4
                                                    </option>
                                                    <option <?php echo (isset($shirtDetail->CollarLength) && $shirtDetail->CollarLength == "4 Extra Long") ? "selected='selected'" : "" ?> value="4 Extra Long">
                                                        4 Extra Long
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Back Style</label>
                                                <select class="form-control" size="1"
                                                        name="BackStyle">
                                                    <?php foreach ($backStyle as $bs) { ?>
                                                    <option <?php echo ($shirtDetail->BackStyle == $bs) ? "selected=selected" : ""; ?> value="<?=$bs;?>"><?=$bs;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>No. Of Pockets</label>
                                                <select class="form-control" size="1" name="NoOfPockets"
                                                        id="NoOfPockets">
                                                    <?php foreach ($NoOfPockets as $key => $np) { ?>
                                                    <option <?php echo ($shirtDetail->NumberOfPockets == $key) ? "selected=selected" : ""; ?> value="<?=$key;?>"><?=$np;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Monogram Color</label>
                                                <select size="1" name="MonoColor"
                                                        class="form-control">
                                                    <?php foreach ($MonoColor as $key => $mc) { ?>
                                                    <option <?php echo ($shirtDetail->MonoColor == $mc) ? "selected=selected" : ""; ?> value="<?=$mc;?>"><?=$mc;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Monogram Position</label>
                                                <select class="form-control" size="1"
                                                        name="MonoPosition">
                                                    <?php foreach ($MonoPosition as $key => $mp) { ?>
                                                    <option <?php echo ($shirtDetail->MonoPosition == $mp) ? "selected=selected" : ""; ?> value="<?=$mp;?>"><?=$mp;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Cuff Style</label>
                                                <select class="form-control" size="1" name="CuffStyle">
                                                    <?php foreach ($CuffStyle as $key => $cs) { ?>
                                                    <option <?php echo ($shirtDetail->CuffStyle == $cs) ? "selected=selected" : ""; ?> value="<?=$cs;?>"><?=$cs;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Advance Option</label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="form-control2" value="1"
                                                           name="WhiteCuffs" <?php echo ($shirtDetail->WhiteCuffs == 1) ? "checked=checked" : ""; ?>>White
                                                    Cuff
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="form-control2" value="1"
                                                           name="WhiteCollar" <?php echo ($shirtDetail->WhiteCollar == 1) ? "checked=checked" : ""; ?>>White
                                                    Collar
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="form-control2" value="1"
                                                           name="Fit" <?php echo ($shirtDetail->Fit == 1) ? "checked=checked" : ""; ?>>Make
                                                    this shirt fit
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-success pull-right">
                                                Update Style
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                    </form>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@endsection