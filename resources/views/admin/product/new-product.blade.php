@extends('admin.default')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Product</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Product
                    </div>
                    <form name="myForm" role="form" method="post" enctype="multipart/form-data"
                          action="<?php echo URL::to('admin/product/add-product'); ?>">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="hidden" name="ProductTypeID" value="<?=$productType;?>"/>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="spacer-2x"></span>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Basic</label>
                                        <input class="form-control" value="{{Request::old('Basic')}}" name="Basic">

                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Qty</label>
                                        <input class="form-control" value="{{Request::old('Qty')}}" name="Qty" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Qty Sold</label>
                                        <input class="form-control" value="{{Request::old('QtySold')}}" name="QtySold" placeholder="Enter text">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"  name="EnableExpiry" value="">Enable Expiry
                                        </label>
                                    </div>

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input class="form-control" value="{{Request::old('Price')}}" name="Price">

                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Weight</label>
                                        <input class="form-control" value="{{Request::old('Weight')}}" name="Weight" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input class="form-control" value="{{Request::old('Code')}}" name="Code" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Expiry Date</label>
                                        <input class="form-control" value="{{Request::old('EnableExpiryDate')}}" name="EnableExpiryDate" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <?php foreach ($status as $st) { ?>
                                            <option value="<?=$st->ID;?>">
                                                <?=$st->Name;?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Product Detail
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#description" data-toggle="tab">General</a>
                                                </li>
                                                <li><a href="#categories" data-toggle="tab">Search Filters</a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="description">
                                                    <h4>Product Description</h4>

                                                    <div class="col-lg-12">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input class="form-control" value="{{Request::old('Name')}}" name="Name">

                                                                <p class="help-block">Example block-level help text
                                                                    here.</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <input class="form-control" value="{{Request::old('Description')}}" name="Description"
                                                                       placeholder="Enter text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Meta Title</label>
                                                                <input class="form-control" value="{{Request::old('MetaTitle')}}" name="MetaTitle"
                                                                       placeholder="Enter text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Meta Keywords</label>
                                                                <input class="form-control" value="{{Request::old('MetaKeywords')}}" name="MetaKeywords"
                                                                       placeholder="Enter text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Meta Description</label>
                                                                <input class="form-control" value="{{Request::old('MetaDescription')}}" name="MetaDescription"
                                                                       placeholder="Enter text">
                                                            </div>
                                                            <h4>Product Pictures</h4>
                                                            <div class="form-group">
                                                                <label>File input</label>

                                                                <input type="file" name="picFile[]" accept="image/*"
                                                                       multiple="true">
                                                                <br>
                                                                <br>
                                                                <h3>Zoom Image</h3>
                                                                <input type="file" name="zoomImg" accept="image/*">
                                                                <br>
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <h4>Select Categories</h4>

                                                            <div class="form-group">

                                                                <?php foreach ($categories as $category) { ?>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" name="Categories[]"
                                                                               value="<?=$category->ID;?>"><?=$category->Name;?>
                                                                    </label>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="categories">
                                                    <h4>Search Filters</h4>

                                                    <div class="col-lg-12">
                                                        <?php
                                                        $i = 0;
                                                        foreach ($productCategories as $key => $cp) { ?>
                                                        <?php
                                                            if($i % 2 == 0){
                                                                echo '</div><div class="col-lg-12">';
                                                            }
                                                        $setting = '';
                                                        if($key == 'FabricType'){
                                                            $setting = 'style="height:381px;"';
                                                        }
                                                        ?>
                                                        <div class="col-lg-6 fieldset" <?=$setting;?>>
                                                            <div class="form-group">
                                                                <label><?=$key;?></label>
                                                                <?php
                                                                $var = '<select class="form-control" multiple="" name="' . $key . '[]">';
                                                                $varEnd = '</select>';
                                                                ?>
                                                                <?php foreach ($productCategories[$key] as $k => $value) { ?>
                                                                <div class="checkbox">
                                                                    <?php if($value->Type == "Color") { ?>
                                                                    <?php if ($k == 0) {
                                                                        echo $var;
                                                                    } ?>
                                                                    <option value="<?=$value->ID?>">
                                                                        <?=$value->Name?>
                                                                    </option>
                                                                    <?php if (!array_key_exists($k + 1, $productCategories[$key])) {
                                                                        echo $varEnd;
                                                                    } ?>
                                                                    <?php } else if($value->Type == "Colors2") {  ?>
                                                                    <?php if ($k == 0) {
                                                                        echo $var;
                                                                    } ?>

                                                                    <option value="<?=$value->ID?>">
                                                                        <?=$value->Name?>
                                                                    </option>
                                                                    <?php if (!array_key_exists($k + 1, $productCategories[$key])) {
                                                                        echo $varEnd;
                                                                    } ?>
                                                                    <?php }else if($value->Type == "CheckBox") { ?>
                                                                    <label>
                                                                        <input type="<?=$value->Type;?>" name="<?=$key;?>[]"
                                                                               value="<?=$value->ID;?>"> <?=$value->Name;?>
                                                                    </label>
                                                                    <?php } else { ?>
                                                                        <label>
                                                                            <input type="<?=$value->Type;?>"
                                                                                   name="<?=$key;?>"
                                                                                   value="<?=$value->ID;?>"> <?=$value->Name;?>
                                                                        </label>
                                                                    <?php } ?>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <?php $i++; } ?>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <!-- /.panel-body -->
                                    </div>
                                    <div class="col-lg-12">
                                        <a href="<?php echo URL::to('admin/product/products');?>" class="btn btn-primary pull-right"
                                           style="margin-left: 4px;">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-success pull-right">
                                            Submit
                                        </button>
                                    </div>
                                    <!-- /.panel -->
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