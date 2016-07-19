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
                    <form name='add_service_form' id='add_service_form' enctype="multipart/form-data"
                          class="form-horizontal form-widgets" role="form" method="POST">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-8">
                                    <fieldset>
                                        <?php
                                        if (validation_errors()) { ?>
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
                                        if ($this->session->flashdata('update_company_overview')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('update_company_overview'); ?>
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
                                        <?php } ?>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="company_overview">Company
                                                Overview:</label>

                                            <div class="col-md-5">
                                                <textarea id="company_overview" name="company_overview" class="form-control" required><?php echo $all_company_overview['company_overview']; ?></textarea>
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

<script>
    tinymce.init({
        selector: 'textarea',
        height: 200,
        width: 800,
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