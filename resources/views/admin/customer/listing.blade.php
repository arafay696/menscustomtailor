@extends('admin.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Customer Listing</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Customer List
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    <th class="hide">Action</th>
                                    <th>Phone</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user) { ?>
                                <tr>
                                    <td class="center">
                                        <?=$user->Name;?>
                                    </td>
                                    <td class="center">
                                        <a href="#" ><?=$user->Email;?></a>
                                    </td>
                                    <td>
                                        <?=$user->Company;?>
                                    </td>
                                    <td>
                                        <?=$user->Country;?>
                                    </td>
                                    <td class="center">
                                        <?=$StatusByID[$user->Status][0]['Name'];?>
                                    </td>
                                    <td class="hide">
                                        <a href="<?php echo URL::to('admin/user/edit/' . $user->ID . ''); ?>"
                                           class="fa fa-pencil"
                                           style="color: #5cb85c;"></a>
                                        <a href="<?php echo URL::to('admin/user/delete/' . $user->ID . ''); ?>"
                                           class="fa fa-times"
                                           style="color: #d9534f;"></a>
                                    </td>
                                    <td>
                                        <?=$user->Phone;?>
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