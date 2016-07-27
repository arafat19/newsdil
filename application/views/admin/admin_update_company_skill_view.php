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
                    <form name='add_project_cat_form' id='add_project_cat_form' enctype="multipart/form-data"
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
                                            <label class="col-md-3 control-label" for="skill_category_name">Skill Category:</label>

                                            <div class="col-md-5">
                                                <select class="form-control" name="skill_category_name"
                                                        id="skill_category_name" title="Select a skill Category"
                                                        required autofocus>
                                                    <option selected>Please Select a Skill Category</option>
                                                    <?php if (isset($active_skill_category) && $active_skill_category->num_rows() > 0):
                                                        foreach ($active_skill_category->result() as $row): ?>
                                                            <option
                                                                value="<?php echo $row->skill_category_id; ?>" <?php if ($single_skill['skill_category_name'] == $row->skill_category_name) echo "selected"; ?>><?php echo $row->skill_category_name; ?>
                                                            </option>
                                                            <?php
                                                        endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="skill_name">Skill Name:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="skill_name"
                                                       id="skill_name" value="<?php echo $single_skill['skill_name']; ?>"
                                                       placeholder="Write Skill Name" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="skill_description">Skill
                                                Description:</label>

                                            <div class="col-md-5">
                                                 <textarea type="text" class="form-control" id="skill_description"
                                                           name="skill_description" rows="3"
                                                           placeholder="Skill Description"><?php echo $single_skill['skill_description']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="skill_percentage">Skill Percentage:</label>

                                            <div class="col-md-5">
                                                 <input type="number" class="form-control" id="skill_percentage"
                                                           name="skill_percentage" value="<?php echo $single_skill['skill_percentage']; ?>"
                                                           placeholder="Skill Percentage" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label label-optional"
                                                   for="is_active">Is Active:</label>

                                            <div class="col-md-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="is_active"
                                                           name="is_active" value="1" <?php echo ($single_skill['is_active']== 1 ? 'checked' : '');?> />
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
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>admin/add/company/skills"
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
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>

</body>