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
                    <form name='add_service_form' id='add_service_form' enctype="multipart/form-data"
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
                                        if ($this->session->flashdata('update_config_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('update_config_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('error_config_message')) { ?>
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="alert alert-danger" role="alert">
                                                    <a href="#" class="close" data-dismiss="alert"
                                                       aria-label="close">&times;</a>
                                                    <?php echo $this->session->flashdata('error_config_message'); ?>
                                                </div>
                                            </div>
                                        </div>
                                       <?php  } ?>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="top_heading1">Landing Page Top
                                                Heading 1:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="top_heading1"
                                                       id="top_heading1"
                                                       value="<?php echo $all_system_configuration['top_heading1']; ?>" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="top_heading2">Landing Page Top
                                                Heading 2:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="top_heading2"
                                                       id="top_heading2"
                                                       value="<?php echo $all_system_configuration['top_heading2']; ?>" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="footer_text">Client Side Footer Text:</label>

                                            <div class="col-md-5">
                                                <textarea type="text" class="form-control" id="footer_text"
                                                          name="footer_text" rows="3"
                                                          placeholder="255 Char Max" required><?php echo $all_system_configuration['footer_text']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="meta_keyword">Meta Keyword:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="meta_keyword"
                                                       id="meta_keyword"  value="<?php echo $all_system_configuration['meta_keyword']; ?>"
                                                       placeholder="Give Meta Keyword" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="meta_desc">Meta
                                                Description:</label>

                                            <div class="col-md-5">
                                                <textarea type="text" class="form-control" id="meta_desc"
                                                          name="meta_desc" rows="7"
                                                          placeholder="255 Char Max" required><?php echo $all_system_configuration['meta_description']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="meta_keyword">Favicon:</label>

                                            <div class="col-md-5">
                                                <input type="file" class="form-control" name="show_favicon"
                                                       id="show_favicon"/>
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

                            <button id="clearFormButton" name="clearFormButton" type="reset"
                                    class="btn btn-submit btn-danger"><span class="glyphicon glyphicon-remove"></span>Cancel
                            </button>
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