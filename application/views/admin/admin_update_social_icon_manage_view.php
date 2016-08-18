<body>
<div id="wrapper">
    <?php $this->load->view('admin/admin_dashboard_navbar_view'); ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php echo $common_header; ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> <?php echo $common_header; ?>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <?php echo $common_header; ?></h3>
                    </div>
                    <form name='update_social_icon_form' id='update_social_icon_form' enctype="multipart/form-data"
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

                                        <?php
                                        }
                                        if ($this->session->flashdata('update_message')) {
                                            ?>
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
                                            <label class="col-md-3 control-label" for="social_icon_name">Social Icon
                                                Name:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="social_icon_name"
                                                       id="social_icon_name"
                                                       value="<?php echo $social['social_icon_name']; ?>"
                                                       placeholder="Social Icon Name" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="social_icon_link">Social Icon
                                                URL:</label>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="social_icon_link"
                                                       id="social_icon_link" pattern="https?://.+"
                                                       value="<?php echo $social['social_icon_link']; ?>"
                                                       placeholder="http://" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="social_icon_class_name">Social
                                                Icon Class Name:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="social_icon_class_name"
                                                       id="social_icon_class_name"
                                                       value="<?php echo $social['social_icon_logo_class_name']; ?>"
                                                       placeholder="Example: fa fa-facebook" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label label-optional"
                                                   for="is_active">Is Active:</label>

                                            <div class="col-md-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="is_active"
                                                           name="is_active"
                                                           value="1" <?php echo($social['is_active'] == 1 ? 'checked' : ''); ?>/>
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
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>admin/socialicon/"
                               role="button"><span
                                    class="glyphicon glyphicon-remove"></span>Cancel</a>

                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>

            <!--<div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Social Icon List</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Social Icon Name</th>
                                            <th>Social Icon Link</th>
                                            <th>Social Icon</th>
                                            <th>Is Active</th>
                                        </tr>
                                        </thead>
                                        <?php /*$i = 1; */?>
                                        <?php /*if (isset($all_social_icons) && $all_social_icons->num_rows() > 0): */?>
                                        <?php /*foreach ($all_social_icons->result() as $row): */?>

                                            <tbody>
                                            <tr>
                                                <td align="right"><?php /*echo $i++; */?></td>
                                                <td><?php /*echo $row->social_icon_name; */?></td>
                                                <td align="left"><?php /*echo $row->social_icon_link ? $row->social_icon_link : 'No URL'; */?></td>
                                                <td align="center"><i
                                                        class="<?php /*echo $row->social_icon_logo_class_name; */?>"></i>
                                                </td>
                                                <td align="center"><?php /*echo $row->is_active ? 'Yes' : 'No'; */?></td>

                                            </tr>
                                            </tbody>
                                        <?php /*endforeach; */?>
                                    </table>
                                    <?php /*else: */?>
                                        <div>
                                            <p>No results were found</p>
                                        </div>
                                    <?php /*endif; */?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
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