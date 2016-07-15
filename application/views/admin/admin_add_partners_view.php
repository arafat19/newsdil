<body>
<script language="javascript">
    function checkMe() {
        if (confirm("Are you sure you want to delete the selected Partner?")) {
            return true;
        } else {
            return false;
        }
    }
    function deleteImage() {
        if (confirm("Are you sure you want to delete the selected Partner Image?")) {
            return true;
        } else {
            return false;
        }
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
                    <form name='add_partners_form' id='add_partners_form' enctype="multipart/form-data"
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
                                        if ($this->session->flashdata('partner_update_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('partner_update_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('cant_delete_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-warning" role="alert">
                                                        <i class="fa fa-exclamation-triangle"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('cant_delete_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('partner_delete_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('partner_delete_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('image_delete_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('image_delete_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="partner_name">Partner Name:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="partner_name"
                                                       id="partner_name"
                                                       placeholder="Partner Name" required autofocus/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="partner_internal_link">Partner Internal Link:</label>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="partner_internal_link"
                                                       id="partner_internal_link" placeholder="Write Partner internal link"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="partner_external_link">Partner External Link:</label>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="partner_external_link"
                                                       id="partner_external_link" placeholder="Write Partner external link"/>
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

                            <button id="update" name="update" type="submit" data-role="button"
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
                        <h3 class="panel-title">Partners List</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Partners Name</th>
                                            <th>Partners Internal Links</th>
                                            <th>Partners External Links</th>
                                            <th>Photo</th>
                                            <th>Is Active</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <?php $i = $start_from; $start = 0;?>
                                        <?php if (isset($all_partners) && $all_partners->num_rows() > 0): ?>
                                        <?php foreach ($all_partners->result() as $row): ?>

                                            <tbody>
                                            <tr>
                                                <td align="center"><?php echo $i+$start; ?></td>
                                                <td><?php echo $row->partner_name; ?></td>
                                                <td><?php echo $row->partner_internal_link; ?></td>
                                                <td ><?php echo $row->partner_external_link; ?></td>
                                                <td align="center">
                                                    <?php if ($row->partner_image) { ?>
                                                        <img class="img-responsive img-circle" height="85px" width="85px"
                                                             src="<?php echo base_url(); ?>uploaded/partners/<?php echo $row->partner_image; ?>"
                                                             alt="<?php echo $row->partner_image; ?>"/> <br/>

                                                        <a class='btn btn-sm btn-warning'
                                                           href="<?php echo base_url(); ?>admin/upload/partner/image/<?php echo base64_encode($row->id); ?>"
                                                           role="button"><span class='glyphicon glyphicon-edit'></span>Change
                                                            Image</a>
                                                        <a class="btn btn-danger"
                                                           href="<?php echo base_url(); ?>admin/delete/partner/image/<?php echo base64_encode($row->id); ?>"
                                                           onclick="return deleteImage()" title="Delete"
                                                           role="button"><span class="glyphicon glyphicon-trash"></span></a>

                                                    <?php } else { ?>
                                                        <a class='btn btn-submit btn-info'
                                                           href="<?php echo base_url(); ?>admin/upload/partner/image/<?php echo base64_encode($row->id); ?>"
                                                           role="button"><span class='glyphicon glyphicon-plus'></span>Add
                                                            Image</a>
                                                    <?php } ?>
                                                </td>
                                                <td align="center"><?php echo $row->is_active ? 'Yes' : 'No'; ?></td>
                                                <td align="center"><a class="btn btn-success" title="Edit"
                                                                      href="<?php echo base_url(); ?>admin/update/partner/<?php echo base64_encode($row->id); ?>"
                                                                      role="button"><span
                                                            class="glyphicon glyphicon-edit"></span></a>

                                                    <a class="btn btn-danger"
                                                       href="<?php echo base_url(); ?>admin/delete/partner/<?php echo base64_encode($row->id); ?>"
                                                       onclick="return checkMe()" title="Delete"
                                                       role="button"><span class="glyphicon glyphicon-trash"></span></a>
                                                </td>
                                            </tr>
                                            </tbody> <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </table>
                                    <div class="pagination" style="float:right;"> <?php echo $paginglinks; ?></div>
                                    <div class="pagination" style="float:left;"> <?php echo (!empty($pagermessage) ? $pagermessage : ''); ?></div>
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


</body>