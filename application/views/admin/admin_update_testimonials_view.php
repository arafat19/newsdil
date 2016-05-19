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
                            <i class="fa fa-edit"></i>  <?php echo $common_header; ?>
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
                    <form name='add_team_members_form' id='add_team_members_form' enctype="multipart/form-data"
                          class="form-horizontal form-widgets" role="form" method="POST" action="">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
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

                                        <?php } ?>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="title">Title:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="title"
                                                       id="title"  value="<?php echo $single_testimonial['title']; ?>" autofocus/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="testimonial_description">Member
                                                Description:</label>

                                            <div class="col-md-5">
                                                <textarea type="text" class="form-control" id="testimonial_description"
                                                          name="testimonial_description" rows="7"
                                                          placeholder="255 Char Max" required><?php echo $single_testimonial['testimonial_description']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="testimonial_details_link">Testimonial Details Link:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="testimonial_details_link"
                                                       id="testimonial_details_link"  value="<?php echo $single_testimonial['testimonial_details_link']; ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="commented_by">Commented By:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="commented_by"
                                                       id="commented_by"
                                                       value="<?php echo $single_testimonial['commented_by']; ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label label-optional"
                                                   for="is_active">Is Active:</label>

                                            <div class="col-md-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="is_active"
                                                           name="is_active" value="1" <?php echo ($single_testimonial['is_active']== 1 ? 'checked' : '');?> />
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

                            <a class="btn btn-danger" href="<?php echo base_url();?>admin/addtestimonials" role="button"><span class="glyphicon glyphicon-remove"></span>Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.row -->
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