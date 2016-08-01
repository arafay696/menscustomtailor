@extends('admin.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product Listing</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Product List
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($products as $product) { ?>
                                <tr>
                                    <td class="center">
                                        <img style="width: 100px;height: 150px"
                                             src="<?php echo URL::to('resources/assets/images/' . $product->ImgName . ''); ?>">
                                    </td>
                                    <td class="center">
                                        <?=$product->Code;?>
                                    </td>
                                    <td class="center">
                                        <?=$product->Name;?>
                                    </td>
                                    <td>
                                        <?=$product->Description;?>
                                    </td>
                                    <td class="center">
                                        <?=$product->Qty;?>
                                    </td>
                                    <td class="center">
                                        <?=$product->Price;?>
                                    </td>
                                    <td class="center">
                                        <?=$product->Dat;?>
                                    </td>
                                    <td>
                                        <a href="<?php echo URL::to('admin/product/edit/' . $product->ID . ''); ?>"
                                           class="fa fa-pencil"
                                           style="color: #5cb85c;"></a>
                                        <a href="<?php echo URL::to('admin/product/delete/' . $product->ID . ''); ?>"
                                           class="fa fa-times"
                                           style="color: #d9534f;"></a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->
@endsection