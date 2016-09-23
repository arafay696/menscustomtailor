@extends('admin.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Discount Listing</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Discount List
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Discount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($discounts as $discount) { ?>
                                <tr>
                                    <td class="center">
                                        <?=$discount->DiscountCode;?>
                                    </td>
                                    <td class="center">
                                        <?=$discount->DiscountPercent;?>
                                    </td>
                                    <td class="center">
                                        <?php echo date('d F Y h:i A', strtotime($discount->StartDate));?>
                                    </td>
                                    <td class="center">
                                        <?php echo date('d F Y h:i A', strtotime($discount->EndDate));?>
                                    </td>
                                    <td>
                                        <?=$discount->Description;?>
                                    </td>
                                    <td>
                                        <?php
                                        echo ($discount->Status) ? 'Active' : 'Inactive';
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if($discount->Status){
                                        ?>
                                        <a href="<?php echo URL::to('admin/discount/close/'.$discount->ID.'') ?>" class="fa fa-pause"
                                           style="color: #5cb85c;"></a>
                                        <?php }else { ?>
                                        <a href="<?php echo URL::to('admin/discount/active/'.$discount->ID.''); ?>" class="fa fa-play"
                                           style="color: #5cb85c;"></a>
                                        <?php } ?>
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