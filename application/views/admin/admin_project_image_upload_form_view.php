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
                        <li>
                            <i class="fa fa-users"></i> <a href="<?php echo base_url(); ?>admin/add/project">Add Project</a>
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
                    <?php echo form_open_multipart('admin/upload/project/photo/'.$project_id, "class='form-horizontal form-widgets'");?>
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
                                    else if($error){
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
                                        <label class="col-md-3 control-label" for="userfile">Project Image:</label>

                                        <div class="col-md-5">
                                            <input type="file" class="form-control" name="userfile" title="Allowed dimension: 600x600 and size: 150kb"
                                                   id="userfile"/>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                              <img class="img-responsive img-thumbnail" height="145px" width="145px" src="<?php echo base_url() ;?>uploaded/projects/<?php echo $single_project['project_image'] ? $single_project['project_image'] : 'blank_person.png'; ?>" alt="<?php echo $single_project['project_image']; ?>" />
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