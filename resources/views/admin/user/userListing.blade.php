@extends('admin.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Listing</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        User List
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user) { ?>
                                <tr>
                                    <td class="center">
                                        <?=$user->Type;?>
                                    </td>
                                    <td class="center">
                                        <?=$user->Name;?>
                                    </td>
                                    <td class="center">
                                        <?=$user->Email;?>
                                    </td>
                                    <td>
                                        <?=$getAllCompanies[$user->Company][0]['Name'];?>
                                    </td>
                                    <td>
                                        <?=$user->Country;?>
                                    </td>
                                    <td class="center">
                                        <?=$StatusByID[$user->Status][0]['Name'];?>
                                    </td>
                                    <td>
                                        <a href="<?php echo URL::to('admin/user/edit/' . $user->ID . ''); ?>"
                                           class="fa fa-pencil"
                                           style="color: #5cb85c;"></a>
                                        <a href="<?php echo URL::to('admin/user/delete/' . $user->ID . ''); ?>"
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