<body>
<div id="wrapper">
    <?php $this->load->view('admin/admin_dashboard_navbar_view'); ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Edit Service
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> Edit Service
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Service</h3>
                    </div>
                    <form name='edit_service_form' id='edit_service_form' enctype="multipart/form-data"
                          class="form-horizontal form-widgets" role="form" method="post">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-8">
                                    <fieldset>
                                        <?php if (validation_errors()) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-danger" role="alert">
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo validation_errors(); ?>

                                                    </div>
                                                </div>
                                            </div>

                                        <?php }
                                        if ($this->session->flashdata('update_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('update_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="service_name">Service
                                                Name:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="service_name"
                                                       id="service_name" value="<?php echo $service['service_name']; ?>"
                                                       placeholder="Service Name" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="service_details">Service Details
                                                Div:</label>

                                            <div class="col-md-5">
                                                <textarea type="text" class="form-control" id="service_details"
                                                          name="service_details" rows="7"
                                                          placeholder="255 Char Max" required><?php echo $service['total_description_div']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="service_page_url">Service Page URL</label>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="service_page_url"
                                                       id="service_page_url" pattern="https?://.+"
                                                       placeholder="http://" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label label-optional"
                                                   for="is_active">Is Active:</label>

                                            <div class="col-md-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="is_active"
                                                           name="is_active" value="1" <?php echo ($service['is_active']== 1 ? 'checked' : '');?>/>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer panel-success">

                            <button id="update" name="update" type="submit" data-role="button"
                                    class="btn btn-submit btn-success"><span class="glyphicon glyphicon-edit"></span>Update
                            </button>
                            <a class="btn btn-danger" href="<?php echo base_url();?>admin/service/" role="button"><span class="glyphicon glyphicon-remove"></span>Cancel</a>

                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>

            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Service List</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Service Name</th>
                                            <th>Service Details</th>
                                            <th>Is Active</th>
                                            <th>Service URL</th>
                                        </tr>
                                        </thead>
                                        <?php $i = 1; ?>
                                        <?php if (isset($all_services) && $all_services->num_rows() > 0): ?>
                                        <?php foreach ($all_services->result() as $row): ?>

                                            <tbody>
                                            <tr>
                                                <td align="right"><?php echo $i++; ?></td>
                                                <td><?php echo $row->service_name; ?></td>
                                                <td><?php echo $row->total_description_div; ?></td>
                                                <td align="center"><?php echo $row->is_active ? 'Yes' : 'No'; ?></td>
                                                <td align="left"><?php echo $row->service_page_url ? $row->service_page_url : 'No URL'; ?></td>
                                            </tr>
                                            </tbody>
                                        <?php endforeach; ?>
                                    </table>
                                    <?php else: ?>
                                        <div>
                                            <p>No results were found</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

</body>