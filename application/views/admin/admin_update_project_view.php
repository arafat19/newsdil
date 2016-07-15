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
                    <form name='update_project_cat_form' id='update_project_cat_form' enctype="multipart/form-data"
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
                                            <label class="col-md-3 control-label" for="project_category">Project
                                                Category:</label>

                                            <div class="col-md-5">
                                                <select class="form-control" name="project_category"
                                                        id="project_category" title="Select Project Category Name"
                                                        required autofocus>
                                                    <option>Please Select a Project Category Name</option>
                                                    <?php if (isset($active_project_category) && $active_project_category->num_rows() > 0):
                                                        foreach ($active_project_category->result() as $row): ?>
                                                            <option
                                                                value="<?php echo $row->project_category_id; ?>" <?php if ($single_project['project_category_name'] == $row->project_category_name) echo "selected"; ?>><?php echo $row->project_category_name; ?>
                                                            </option>
                                                        <?php
                                                        endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="project_title">Project
                                                Title:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="project_title" value="<?php echo $single_project['project_title']; ?>"
                                                       id="project_title" placeholder="Project Title" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="project_description">Project
                                                Description:</label>

                                            <div class="col-md-5">
                                                 <textarea type="text" class="form-control" id="project_description"
                                                           name="project_description" rows="3"
                                                           placeholder="Project Description" required><?php echo $single_project['project_description']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="project_internal_link">Project
                                                Internal Link:</label>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="project_internal_link"
                                                       id="project_internal_link" value="<?php echo $single_project['project_internal_link']; ?>"
                                                       placeholder="Write Project internal link"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="project_external_link">Project
                                                External Link:</label>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="project_external_link"
                                                       id="project_external_link" value="<?php echo $single_project['project_external_link']; ?>"
                                                       placeholder="Write Project external link"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="project_start_date">Project Start
                                                Date:</label>

                                            <div class="col-md-5">
                                                <input type="text" name="project_start_date" class="form-control"
                                                       placeholder="Click to pick Project Start Date"  value="<?php echo $single_project['project_start_date']; ?>"
                                                       id="project_start_date" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="project_end_date">Project End
                                                Date:</label>

                                            <div class="col-md-5">
                                                <input type="text" name="project_end_date" class="form-control"
                                                       placeholder="Click to pick Project End Date"  value="<?php echo $single_project['project_end_date']; ?>"
                                                       id="project_end_date" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label label-optional"
                                                   for="is_active">Is Active:</label>

                                            <div class="col-md-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="is_active"
                                                           name="is_active"
                                                           value="1" <?php echo($single_project['is_active'] == 1 ? 'checked' : ''); ?> />
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

                            <a class="btn btn-danger" href="<?php echo base_url(); ?>admin/add/project/"
                               role="button"><span class="glyphicon glyphicon-remove"></span>Cancel</a>
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