<body>
<script language="JavaScript">
    function link_create() {
        var f1 = document.getElementById("project_title");
        var f2 = document.getElementById("project_internal_link");

        f2.value = string_to_slug(f1.value);
    }


    function string_to_slug(str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to = "aaaaeeeeiiiioooouuuunc------";
        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

        var url = window.base_url = <?php echo json_encode(base_url()); ?>;
        return url + 'project/'+ str;
    }
</script>

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
                                                <input type="text" class="form-control" name="project_title"  onblur="link_create()"
                                                       value="<?php echo $single_project['project_title']; ?>"
                                                       id="project_title" placeholder="Project Title" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="project_internal_link">Project
                                                Internal Link:</label>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="project_internal_link"
                                                       id="project_internal_link" value="<?php echo $single_project['project_internal_link']; ?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="client_name">Client Name:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="client_name" value="<?php echo $single_project['client_name']; ?>"
                                                       id="client_name" placeholder="Client Name" required/>
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
                                            <label class="col-md-3 control-label" for="project_key_features">Project
                                                Key Features:</label>

                                            <div class="col-md-5">
                                                 <textarea type="text" class="form-control" id="project_key_features"
                                                           name="project_key_features" rows="3"
                                                           placeholder="<li><a>Asset grouping and auto coding system</a></li>" required><?php echo $single_project['project_key_features']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="project_benefits">Project
                                                Benefits:</label>

                                            <div class="col-md-5">
                                                 <textarea class="form-control" id="project_benefits"
                                                           name="project_benefits" rows="3"
                                                           placeholder="<li><a>Easy report generation</a></li>" required><?php echo $single_project['project_benefits']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="project_technology_used">Project Technology Used:</label>

                                            <div class="col-md-5">
                                                 <textarea class="form-control" id="project_technology_used"
                                                           name="project_technology_used" rows="3"
                                                           placeholder="<li><a>HTML</a></li>" required><?php echo $single_project['project_technology_used']; ?></textarea>
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
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {

        $('#project_start_date').datepicker({
            format: "dd/mm/yyyy"
        });
        $('#project_end_date').datepicker({
            format: "dd/mm/yyyy"
        });

    });
</script>

</body>