<body>
<script language="javascript">
    function checkMe() {
        if (confirm("Are you sure you want to delete the selected service?")) {
            return true;
        } else {
            return false;
        }
    }
    function link_create() {
        var f1 = document.getElementById("service_name");
        var f2 = document.getElementById("service_page_url");

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
        return url + str;
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
                        Add Service
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> Add Service
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Service</h3>
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
                                        if ($this->session->flashdata('success_msg')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('success_msg'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('update_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('update_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('service_delete_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('service_delete_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="service_name">Service
                                                Name:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="service_name"
                                                       id="service_name"  onblur="link_create()"
                                                       placeholder="Service Name" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="service_page_url">Service Page URL</label>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="service_page_url"
                                                       id="service_page_url"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="service_details">Service Details
                                                Div:</label>

                                            <div class="col-md-5">
                                                <textarea type="text" class="form-control" id="service_details"
                                                          name="service_details" rows="7"
                                                          placeholder="255 Char Max" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label label-optional"
                                                   for="is_active">Is Active:</label>

                                            <div class="col-md-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="is_active"
                                                           name="is_active" value="1"/>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer panel-success">

                            <button id="create" name="create" type="submit" data-role="button"
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
                        <h3 class="panel-title">Service List</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Service Name</th>
                                            <th>Service Details</th>
                                            <th>Is Active</th>
                                            <th>Service URL</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <?php $i = $start_from; $start = 0;?>
                                        <?php if (isset($all_services) && $all_services->num_rows() > 0): ?>
                                        <?php foreach ($all_services->result() as $row): ?>

                                            <tbody>
                                            <tr>
                                                <td align="center"><?php echo $i+$start; ?></td>
                                                <td><?php echo $row->service_name; ?></td>
                                                <td><?php echo $row->total_description_div; ?></td>
                                                <td align="center"><?php echo $row->is_active ? 'Yes' : 'No'; ?></td>
                                                <td align="left"><?php echo $row->service_page_url ? $row->service_page_url : 'No URL'; ?></td>
                                                <td align="center"><a class="btn btn-success" title="Edit"
                                                       href="<?php echo base_url(); ?>admin/sedit/<?php echo base64_encode($row->id); ?>"
                                                       role="button"><span class="glyphicon glyphicon-edit"></span></a>

                                                    <a class="btn btn-danger"
                                                       href="<?php echo base_url(); ?>admin/sdelete/<?php echo base64_encode($row->id); ?>" onclick="return checkMe()" title="Delete"
                                                       role="button"><span class="glyphicon glyphicon-trash"></span></a>
                                                </td>
                                            </tr>
                                            </tbody> <?php $i++; ?>
                                        <?php endforeach; ?>

                                    </table>
                                    <div class="pagination" style="float:right;"> <?php echo $paginglinks; ?></div>
                                    <div class="pagination" style="float:left;"> <?php echo (!empty($pagermessage) ? $pagermessage : ''); ?></div>

                                    <?php else: ?>
                                        <div>
                                            <p>No results were found</p>
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


</body>