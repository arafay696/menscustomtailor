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
                    <form name="myForm" role="form" method="post"
                          action="<?php echo URL::to('admin/product/add-product'); ?>">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="spacer-2x"></span>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Basic</label>
                                        <input class="form-control" name="Basic">

                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Qty</label>
                                        <input class="form-control" name="Qty" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Qty Sold</label>
                                        <input class="form-control" name="QtySold" placeholder="Enter text">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="EnableExpiry" value="">Enable Expiry
                                        </label>
                                    </div>

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input class="form-control" name="Price">

                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Weight</label>
                                        <input class="form-control" name="Weight" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input class="form-control" name="Code" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Expiry Date</label>
                                        <input class="form-control" name="EnableExpiryDate" placeholder="Enter text">
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
                                                                <input class="form-control" name="Name">

                                                                <p class="help-block">Example block-level help text
                                                                    here.</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <input class="form-control" name="Description"
                                                                       placeholder="Enter text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Meta Title</label>
                                                                <input class="form-control" name="MetaTitle"
                                                                       placeholder="Enter text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Meta Keywords</label>
                                                                <input class="form-control" name="MetaKeywords"
                                                                       placeholder="Enter text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Meta Description</label>
                                                                <input class="form-control" name="MetaDescription"
                                                                       placeholder="Enter text">
                                                            </div>
                                                            <h4>Product Pictures</h4>
                                                            <div class="form-group">
                                                                <label>File input</label>

                                                                <input type="file" name="picFile[]" accept="image/*">
                                                                <br>
                                                                <br>
                                                                <input type="file" name="picFile[]" accept="image/*">
                                                                <br>
                                                                <br>
                                                                <input type="file" name="picFile[]" accept="image/*">
                                                                <br>
                                                                <br>
                                                                <input type="file" name="picFile[]" accept="image/*">
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
                                                                        <input type="checkbox" name="category[]"
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
                                                        <?php foreach ($productCategories as $key => $cp) { ?>
                                                        <div class="col-lg-6 fieldset">
                                                            <div class="form-group">
                                                                <label><?=$key;?></label>
                                                                <?php
                                                                   // dd($productCategories[$key]);
                                                                ?>
                                                                <?php foreach ($productCategories[$key] as $k => $value) { ?>
                                                                <?php if($value->Type == "Color" || $value->Type == "Colors2") { ?>
                                                                <select class="form-control" multiple=""
                                                                        name="colorSelected">
                                                                    <option value="<?=$value->ID?>">
                                                                        <?=$value->Name?>
                                                                    </option>
                                                                </select>
                                                                <?php }else {  // end if color or contrast ?>
                                                                <label><input type="<?=$value->Type;?>" ng-model="<?=$key;?>[]"
                                                                       value="<?=$value->ID;?>"><?=$value->Name;?></label>
                                                                <?php } } // end if color or contrast ?>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <!-- /.panel-body -->
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="reset" class="btn btn-primary pull-right"
                                                style="margin-left: 4px;">
                                            Reset Button
                                        </button>
                                        <button ng-disabled="updateData" type="submit"
                                                ng-click="addProductRequest(picFile)"
                                                class="btn btn-success pull-right">
                                            Submit
                                        </button>
                                        <div ng-show="updateData"
                                             style="position: relative; margin-right: 9px; float: right;">
                                            <i class="fa fa-3x fa-spinner fa-spin"></i>
                                        </div>
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