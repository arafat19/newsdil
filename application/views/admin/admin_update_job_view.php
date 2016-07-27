<body>
<script language="javascript">
    function link_create() {
        var f1 = document.getElementById("job_title");
        var f2 = document.getElementById("job_page_url");

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
        return url + 'jobs/' + str;
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

                                        <?php }
                                        ?>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="job_type">Job Type:</label>

                                            <div class="col-md-5">
                                                <select class="form-control" name="job_type"
                                                        id="job_type" title="Select a Job Type" required autofocus>
                                                    <option>Please Select a Job Type</option>
                                                    <option value="Full Time" <?php if ($single_job['job_type'] == 'Full Time') echo "selected"; ?>>Full Time</option>
                                                    <option value="Part Time" <?php if ($single_job['job_type'] == 'Part Time') echo "selected"; ?>>Part Time</option>
                                                    <option value="Contractual" <?php if ($single_job['job_type'] == 'Contractual') echo "selected"; ?>>Contractual</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="job_title">Job
                                                Title:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="job_title"
                                                       onblur="link_create()" value="<?php echo $single_job['job_title']; ?>"
                                                       id="job_title" placeholder="Job Title" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="job_page_url">Job Page
                                                URL:</label>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="job_page_url"
                                                       id="job_page_url" value="<?php echo $single_job['job_page_url']; ?>"
                                                       placeholder="Write Job Page URL" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="job_short_description">Job Short
                                                Description:</label>

                                            <div class="col-md-5">
                                                 <textarea type="text" class="form-control" id="job_short_description"
                                                           name="job_short_description" rows="3"
                                                           placeholder="Job Short Description" required><?php echo $single_job['job_short_description']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="job_experience">Job
                                                Experience:</label>

                                            <div class="col-md-5">
                                                 <textarea type="text" class="form-control" id="job_experience"
                                                           name="job_experience" rows="3"
                                                           placeholder="Job Experience" required><?php echo $single_job['job_experience']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="working_hour">Working
                                                Hour:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="working_hour"
                                                       id="working_hour" value="<?php echo $single_job['working_hour']; ?>"
                                                       placeholder="Write Job Working Hour" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="job_salary">Job Salary:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="job_salary"
                                                       id="job_salary" value="<?php echo $single_job['job_salary']; ?>"
                                                       placeholder="Write Job Salary" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="job_application_deadline">Job
                                                Application Deadline:</label>

                                            <div class="col-md-5">
                                                <input type="text" name="job_application_deadline" class="form-control"
                                                       placeholder="Click to pick Job application deadline" value="<?php echo $single_job['job_application_deadline']; ?>"
                                                       id="job_application_deadline" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="other_conditions">Other Job
                                                Conditions:</label>

                                            <div class="col-md-5">
                                                <input type="text" name="other_conditions" class="form-control"
                                                       placeholder="Write other conditions of the job" value="<?php echo $single_job['other_conditions']; ?>"
                                                       id="other_conditions"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label label-optional"
                                                   for="is_active">Is Active:</label>

                                            <div class="col-md-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="is_active"
                                                           name="is_active" value="1" <?php echo($single_job['is_active'] == 1 ? 'checked' : ''); ?> />
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

                            <a class="btn btn-danger" href="<?php echo base_url(); ?>admin/add/job/"
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
        $('#job_application_deadline').datepicker({
            format: "dd/mm/yyyy"
        });
    });
</script>


</body>