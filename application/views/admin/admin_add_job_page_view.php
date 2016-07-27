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
                    <form name='add_pages_form' id='add_partners_form' enctype="multipart/form-data"
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
                                        if ($this->session->flashdata('add_success')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('add_success'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('job_page_update_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('job_page_update_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('service_page_delete_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('service_page_delete_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('cant_add_success')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-warning" role="alert">
                                                        <i class="fa fa-exclamation-triangle"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('cant_add_success'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="job_title">Job Title:</label>

                                            <div class="col-md-5">
                                                <select class="form-control" name="job_title"
                                                        id="job_title" title="Select a Job Title" required autofocus>
                                                    <option selected>Please Select a Job Title</option>
                                                    <?php if (isset($job_title_list) && $job_title_list->num_rows() > 0):
                                                        foreach ($job_title_list->result() as $row): ?>
                                                            <option
                                                                value="<?php echo $row->job_id; ?>"><?php echo $row->job_title; ?></option>
                                                            <?php
                                                        endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="job_detail_description">Job Detail Description:</label>

                                            <div class="col-md-5">
                                                <textarea class="form-control" name="job_detail_description"
                                                          id="job_detail_description"></textarea>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="job_requirements">Job Requirements:</label>

                                            <div class="col-md-5">
                                                <textarea class="form-control" name="job_requirements"
                                                          id="job_requirements"></textarea>

                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer panel-success">

                            <button id="addButton" name="addButton" type="submit" data-role="button"
                                    class="btn btn-submit btn-success"><span class="glyphicon glyphicon-plus"></span>Create
                            </button>

                            <button id="clearFormButton" name="clearFormButton" type="reset"
                                    class="btn btn-submit btn-danger"><span class="glyphicon glyphicon-remove"></span>Cancel
                            </button>

                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <div class="row row-fluid">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $list_title; ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Job Title</th>
                                            <th>Job Detail Description</th>
                                            <th>Job Requirements</th>
                                            <th>Is Active</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <?php $i = $start_from;
                                        $start = 0; ?>
                                        <?php if (isset($all_jobs) && $all_jobs->num_rows() > 0): ?>
                                        <?php foreach ($all_jobs->result() as $row):
                                            ?>

                                            <tbody>
                                            <tr>
                                                <td align="center"><?php echo $i + $start; ?></td>
                                                <td><?php echo $row->job_title; ?></td>
                                                <td><?php echo $row->job_detail_description; ?></td>
                                                <td><?php echo $row->job_requirements; ?></td>
                                                <td align="center"><?php echo $row->is_active ? 'Yes' : 'No'; ?></td>
                                                <td align="center"><a class="btn btn-success" title="Edit"
                                                                      href="<?php echo base_url(); ?>admin/update/job/page/<?php echo base64_encode($row->job_id); ?>"
                                                                      role="button"><span
                                                            class="glyphicon glyphicon-edit"></span></a>
                                                </td>

                                            </tr>
                                            </tbody> <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </table>
                                    <div class="pagination" style="float:right;"> <?php echo $paginglinks; ?></div>
                                    <div class="pagination"
                                         style="float:left;"> <?php echo(!empty($pagermessage) ? $pagermessage : ''); ?></div>
                                    <?php else: ?>
                                        <div class="col-md-12">
                                            <div class="alert alert-info " role="alert">
                                                No Results were found.
                                            </div>
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
<script>
    tinymce.init({
        selector: 'textarea',
        height: 200,
        width: 655,
        theme: 'modern',
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
        ],

        toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

        menubar: false,
        toolbar_items_size: 'small',

        style_formats: [{
            title: 'Bold text',
            inline: 'b'
        }, {
            title: 'Red text',
            inline: 'span',
            styles: {
                color: '#ff0000'
            }
        }, {
            title: 'Red header',
            block: 'h1',
            styles: {
                color: '#ff0000'
            }
        }, {
            title: 'Example 1',
            inline: 'span',
            classes: 'example1'
        }, {
            title: 'Example 2',
            inline: 'span',
            classes: 'example2'
        }, {
            title: 'Table styles'
        }, {
            title: 'Table row 1',
            selector: 'tr',
            classes: 'tablerow1'
        }],

        templates: [{
            title: 'Test template 1',
            content: 'Test 1'
        }, {
            title: 'Test template 2',
            content: 'Test 2'
        }],
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>

</body>