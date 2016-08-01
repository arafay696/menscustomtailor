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
                <form name="myForm" role="form">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 editProdImages">
                                <img ng-repeat="img in editProductItems | unique: 'imgID'"
                                     ng-src="resources/assets/images/{{img.ImgName}}">
                            </div>
                            <div class="col-lg-12">
                                <span class="spacer-2x"></span>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Basic</label>
                                    <input class="form-control" ng-model="editProduct.Basic">

                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="form-group">
                                    <label>Qty</label>
                                    <input class="form-control" ng-model="editProduct.Qty" placeholder="Enter text">
                                </div>
                                <div class="form-group">
                                    <label>Qty Sold</label>
                                    <input class="form-control" ng-model="editProduct.QtySold" placeholder="Enter text">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" ng-model="editProduct.EnableExpiry" value="">Enable Expiry
                                    </label>
                                </div>

                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" ng-model="editProduct.Price">

                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="form-group">
                                    <label>Weight</label>
                                    <input class="form-control" ng-model="editProduct.Weight" placeholder="Enter text">
                                </div>
                                <div class="form-group">
                                    <label>Code</label>
                                    <input class="form-control" ng-model="editProduct.Code" placeholder="Enter text">
                                </div>
                                <div class="form-group">
                                    <label>Expiry Date</label>
                                    <input class="form-control" ng-model="editProduct.EnableExpiryDate" placeholder="Enter text">
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
                                                            <input class="form-control" ng-model="editProduct.Name">

                                                            <p class="help-block">Example block-level help text
                                                                here.</p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <input class="form-control" ng-model="editProduct.Description" placeholder="Enter text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Meta Title</label>
                                                            <input class="form-control" ng-model="editProduct.MetaTitle" placeholder="Enter text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Meta Keywords</label>
                                                            <input class="form-control" ng-model="editProduct.MetaKeywords" placeholder="Enter text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Meta Description</label>
                                                            <input class="form-control" ng-model="editProduct.MetaDescription" placeholder="Enter text">
                                                        </div>
                                                        <h4>Product Pictures</h4>
                                                        <div class="form-group">
                                                            <label>File input</label>

                                                            <input type="file" ngf-select ng-model="picFile" ng-change="addPic(0,picFile)"  name="file"
                                                                   accept="image/*" ngf-max-size="2MB"
                                                                   ngf-model-invalid="errorFile">
                                                            <i ng-show="myForm.file.$error.maxSize">File too large
                                                                {{errorFile.size / 1000000|number:1}}MB: max 2M</i>
                                                            <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb"> <button ng-click="picFile = null" ng-show="picFile">Remove</button>
                                                            <span class="progress" ng-show="picFile.progress >= 0">
                                                                <div style="width:{{picFile.progress}}%"
                                                                     ng-bind="picFile.progress + '%'"></div>
                                                              </span>
                                                            <br>
                                                            <br>
                                                            <input type="file" ngf-select ng-model="picFile1" ng-change="addPic(0,picFile1)" name="file1"
                                                                   accept="image/*" ngf-max-size="2MB"
                                                                   ngf-model-invalid="errorFile">
                                                            <i ng-show="myForm.file.$error.maxSize">File too large
                                                                {{errorFile.size / 1000000|number:1}}MB: max 2M</i>
                                                            <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile1" class="thumb"> <button ng-click="picFile1 = null" ng-show="picFile1">Remove</button>
                                                            <span class="progress" ng-show="picFile1.progress >= 0">
                                                                <div style="width:{{picFile1.progress}}%"
                                                                     ng-bind="picFile1.progress + '%'"></div>
                                                              </span>
                                                            <br>
                                                            <br>
                                                            <input type="file" ngf-select ng-model="picFile2" ng-change="addPic(0,picFile2)" name="file1"
                                                                   accept="image/*" ngf-max-size="2MB"
                                                                   ngf-model-invalid="errorFile">
                                                            <i ng-show="myForm.file.$error.maxSize">File too large
                                                                {{errorFile.size / 1000000|number:1}}MB: max 2M</i>
                                                            <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile2" class="thumb"> <button ng-click="picFile2 = null" ng-show="picFile2">Remove</button>
                                                            <span class="progress" ng-show="picFile2.progress >= 0">
                                                                <div style="width:{{picFile2.progress}}%"
                                                                     ng-bind="picFile2.progress + '%'"></div>
                                                              </span>
                                                            <br>
                                                            <br>
                                                            <input type="file" ngf-select ng-model="picFile3" ng-change="addPic(0,picFile3)" name="file1"
                                                                   accept="image/*" ngf-max-size="2MB"
                                                                   ngf-model-invalid="errorFile">
                                                            <i ng-show="myForm.file.$error.maxSize">File too large
                                                                {{errorFile.size / 1000000|number:1}}MB: max 2M</i>
                                                            <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile3" class="thumb"> <button ng-click="picFile3 = null" ng-show="picFile3">Remove</button>
                                                            <span class="progress" ng-show="picFile3.progress >= 0">
                                                                <div style="width:{{picFile3.progress}}%"
                                                                     ng-bind="picFile3.progress + '%'"></div>
                                                              </span>
                                                            <br>
                                                            <br>
                                                            <h3>Zoom Image</h3>
                                                            <input type="file" ngf-select ng-model="picFile4" ng-change="addPic(1,picFile4)" name="file1"
                                                                   accept="image/*" ngf-max-size="2MB"
                                                                   ngf-model-invalid="errorFile">
                                                            <i ng-show="myForm.file.$error.maxSize">File too large
                                                                {{errorFile.size / 1000000|number:1}}MB: max 2M</i>
                                                            <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile4" class="thumb"> <button ng-click="picFile4 = null" ng-show="picFile4">Remove</button>
                                                            <span class="progress" ng-show="picFile4.progress >= 0">
                                                                <div style="width:{{picFile4.progress}}%"
                                                                     ng-bind="picFile4.progress + '%'"></div>
                                                              </span>
                                                            <br>
                                                            <br>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h4>Select Categories</h4>

                                                        <div class="form-group">


                                                            <div ng-repeat="category in settings.categories"
                                                                 class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" ng-model="agelist"
                                                                           ng-checked="checkCategory('PdRefID','Categories',category.ID)"
                                                                           ng-change="addInArray(editProduct.Categories,agelist,category.ID)"
                                                                           value="{{category.ID}}">{{category.Name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="categories">
                                                <h4>Search Filters</h4>

                                                <div class="col-lg-12">
                                                    <div class="col-lg-6 fieldset">
                                                        <div class="form-group">
                                                            <label>Search Colors</label>
                                                            <select class="form-control" multiple="" ng-model="colorSelected"
                                                                    ng-change="addColorForEdit('Color',colorSelected)">
                                                                <option ng-repeat="SearchColors in settings.SearchColors"
                                                                        ng-selected="checkCategory('PdRefID','CP',SearchColors.ID)"  value="{{SearchColors.ID}}">
                                                                    {{SearchColors.Name}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 fieldset">
                                                        <div class="form-group">
                                                            <label>Contrast Colors</label>
                                                            <select class="form-control" multiple="" ng-model="ContrastColorSelected"
                                                                    ng-change="addColorForEdit('ContrastColors',ContrastColorSelected)">
                                                                <option ng-repeat="ContrastColors in settings.ContrastColors"
                                                                        ng-selected="checkCategory('PdRefID','CP',ContrastColors.ID)" value="{{ContrastColors.ID}}">
                                                                    {{ContrastColors.Name}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="col-lg-6 fieldset">
                                                        <div class="form-group">
                                                            <label>Pattern</label>

                                                            <div ng-repeat="pattern in settings.Pattern"
                                                                 class="checkbox">
                                                                <label>
                                                                    <input type="{{pattern.Type}}" ng-model="patternSelcted"
                                                                           ng-checked="checkCategory('PdRefID','CP',pattern.ID)"
                                                                           ng-change="addInArray(editProduct.Pattern,patternSelcted,pattern.ID)"
                                                                           value="{{pattern.ID}}">{{pattern.Name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 fieldset">
                                                        <div class="form-group">
                                                            <label>Threadcount</label>

                                                            <div ng-repeat="Threadcount in settings.Threadcount"
                                                                 class="checkbox">
                                                                <label>
                                                                    <input type="{{Threadcount.Type}}" name="MP34"
                                                                           ng-checked="checkCategory('PdRefID','CP',Threadcount.ID)"
                                                                           ng-model="editProduct.Threadcount"
                                                                           value="{{Threadcount.ID}}">&nbsp;{{Threadcount.Name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="col-lg-6 fieldset">
                                                        <div class="form-group">
                                                            <label>Thickness</label>

                                                            <div ng-repeat="Thickness in settings.Thickness"
                                                                 class="checkbox">
                                                                <label>
                                                                    <input type="{{Thickness.Type}}" name="MP35"
                                                                           ng-checked="checkCategory('PdRefID','CP',Thickness.ID)" ng-model="editProduct.Thickness"
                                                                           value="{{Thickness.ID}}">&nbsp;{{Thickness.Name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 fieldset">
                                                        <div class="form-group">
                                                            <label>Fabric Type</label>

                                                            <div ng-repeat="FabricType in settings.FabricType"
                                                                 class="checkbox">
                                                                <label>
                                                                    <input type="{{FabricType.Type}}" ng-model="fbtype"
                                                                           ng-checked="checkCategory('PdRefID','CP',FabricType.ID)"
                                                                           ng-change="addInArray(editProduct.FabricType,fbtype,FabricType.ID)"
                                                                           value="{{FabricType.ID}}">&nbsp;{{FabricType.Name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="col-lg-6 fieldset">
                                                        <div class="form-group">
                                                            <label>Opacity</label>

                                                            <div ng-repeat="Opacity in settings.Opacity"
                                                                 class="checkbox">
                                                                <label>
                                                                    <input type="{{Opacity.Type}}" ng-model="editProduct.Opacity" name="MP36"
                                                                           ng-checked="checkCategory('PdRefID','CP',Opacity.ID)"
                                                                           value="{{Opacity.ID}}">&nbsp;{{Opacity.Name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 fieldset">
                                                        <div class="form-group">
                                                            <label>Season</label>

                                                            <div ng-repeat="Season in settings.Season" class="checkbox">
                                                                <label>
                                                                    <input ng-model="seasonSelcted"
                                                                           ng-checked="checkCategory('PdRefID','CP',Season.ID)"
                                                                           ng-change="addInArray(editProduct.Season,seasonSelcted,Season.ID)"
                                                                           type="{{Season.Type}}" value="{{Season.ID}}">&nbsp;{{Season.Name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="col-lg-6 fieldset">
                                                        <div class="form-group">
                                                            <label>Shirt Style</label>

                                                            <div ng-repeat="ShirtStyle in settings.ShirtStyle"
                                                                 class="checkbox">
                                                                <label>
                                                                    <input type="{{ShirtStyle.Type}}" ng-model="shirtStyleSelcted"
                                                                           ng-checked="checkCategory('PdRefID','CP',ShirtStyle.ID)"
                                                                           ng-change="addInArray(editProduct.ShirtStyle,shirtStyleSelcted,ShirtStyle.ID)"
                                                                           value="{{ShirtStyle.ID}}">&nbsp;{{ShirtStyle.Name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 fieldset">
                                                        <div class="form-group">
                                                            <label>Shine</label>

                                                            <div ng-repeat="Shine in settings.Shine" class="checkbox">
                                                                <label>
                                                                    <input name="MP37" ng-checked="checkCategory('PdRefID','CP',Shine.ID)" ng-model="editProduct.Shine" type="{{Shine.Type}}" value="{{Shine.ID}}">&nbsp;{{Shine.Name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="col-lg-6 fieldset">
                                                        <div class="form-group">
                                                            <label>Wrinkle Resistance</label>

                                                            <div ng-repeat="WrinkleResistance in settings.WrinkleResistance"
                                                                 class="checkbox">
                                                                <label>
                                                                    <input name="MP38" ng-model="editProduct.WrinkleResistance" type="{{WrinkleResistance.Type}}"
                                                                           ng-checked="checkCategory('PdRefID','CP',WrinkleResistance.ID)" value="{{WrinkleResistance.ID}}">&nbsp;{{WrinkleResistance.Name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 fieldset">
                                                        <div class="form-group">
                                                            <label>Custom Type</label>

                                                            <div ng-repeat="CustomType in settings.CustomType"
                                                                 class="checkbox">
                                                                <label>
                                                                    <input type="{{CustomType.Type}}" ng-model="CustomTypeSlected"
                                                                           ng-change="addInArray(editProduct.CustomType,CustomTypeSlected,CustomType.ID)"
                                                                           ng-checked="checkCategory('PdRefID','CP',CustomType.ID)" value="{{CustomType.ID}}">&nbsp;{{CustomType.Name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- /.panel-body -->
                                </div>
                                <div class="col-lg-12">
                                    <button type="reset" class="btn btn-primary pull-right" style="margin-left: 4px;">
                                        Reset Button
                                    </button>
                                    <button ng-disabled="updateData" type="submit" ng-click="editProductRequest()"
                                            class="btn btn-success pull-right">
                                        Submit
                                    </button>
                                    <div ng-show="updateData" style="position: relative; margin-right: 9px; float: right;">
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