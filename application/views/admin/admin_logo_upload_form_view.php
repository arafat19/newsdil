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
                    <?php echo form_open_multipart('admin/uploadlogo', "class='form-horizontal form-widgets'");?>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-8">
                                <fieldset>
                                    <?php
                                    if ($this->session->flashdata('upload_success')) {
                                        ?>
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="alert alert-success" role="alert">
                                                    <a href="#" class="close" data-dismiss="alert"
                                                       aria-label="close">&times;</a>
                                                    <?php echo $this->session->flashdata('upload_success'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    else if ($error) {
                                        ?>
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="alert alert-danger" role="alert">
                                                    <a href="#" class="close" data-dismiss="alert"
                                                       aria-label="close">&times;</a>
                                                    <?php echo $error; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="userfile">Company Logo:</label>

                                        <div class="col-md-5">
                                            <input type="file" class="form-control" name="userfile" title="Allowed dimension: 684x313 and size: 1024kb"
                                                   id="userfile"/>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                                <img
                                    src="<?php echo base_url();?>uploaded/admin/<?php echo $all_system_configuration['logo']; ?>"
                                    alt="<?php echo $all_system_configuration['logo']; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer panel-success">

                        <button id="update" name="update" type="submit" data-role="button"
                                class="btn btn-submit btn-success"><span class="glyphicon glyphicon-edit"></span>Upload
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