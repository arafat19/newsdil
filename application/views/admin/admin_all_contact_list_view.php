<body>
<script language="javascript">
    function checkMe() {
        if (confirm("Are you sure you want to delete the selected contact?")) {
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
                        All Contacts
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> All Contacts
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Contacts List</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <?php
                                if ($this->session->flashdata('contact_delete_message')) { ?>
                                    <script language="javascript">
                                        alert("<?php echo $this->session->flashdata('contact_delete_message'); ?>");
                                    </script>
                                  <!--  <div class="form-group">
                                        <div class="col-md-8">
                                            <div class="alert alert-success" role="alert">
                                                <a href="#" class="close" data-dismiss="alert"
                                                   aria-label="close">&times;</a>
                                                <?php /*echo $this->session->flashdata('update_message'); */?>
                                            </div>
                                        </div>
                                    </div>-->
                                <?php } ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Cell Phone</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <?php $i = 1; ?>
                                        <?php if (isset($all_contacts) && $all_contacts->num_rows() > 0): ?>
                                        <?php foreach ($all_contacts->result() as $row): ?>

                                            <tbody>
                                            <tr>
                                                <td align="right"><?php echo $i++; ?></td>
                                                <td><?php echo $row->full_name; ?></td>
                                                <td><?php echo $row->email; ?></td>
                                                <td align="left"><?php echo $row->cell_number; ?></td>
                                                <td align="left"><?php echo $row->subject; ?></td>
                                                <td align="left"><?php echo $row->message; ?></td>
                                                <td align="center">
                                                    <a class="btn btn-danger"
                                                       href="<?php echo base_url(); ?>admin/cdelete/<?php echo base64_encode($row->id); ?>" onclick="return checkMe()" title="Delete"
                                                       role="button"><span class="glyphicon glyphicon-trash"></span></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        <?php endforeach; ?>
                                    </table>
                                    <?php else: ?>

                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="alert alert-warning" role="alert">
                                                    <a href="#" class="close" data-dismiss="alert"
                                                       aria-label="close">&times;</a>
                                                    <p>No results were found</p>
                                                </div>
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