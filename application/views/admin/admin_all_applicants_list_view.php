<body>
<script language="javascript">
    function checkMe() {
        if (confirm("Are you sure you want to delete the selected Applicant?")) {
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
                            <i class="fa fa-edit"></i> <?php echo $common_header; ?>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $common_header; ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <?php
                                    if ($this->session->flashdata('applicant_delete_message')) { ?>
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="alert alert-success" role="alert">
                                                    <i class="fa fa-check"></i>
                                                    <a href="#" class="close" data-dismiss="alert"
                                                       aria-label="close">&times;</a>
                                                    <?php echo $this->session->flashdata('applicant_delete_message'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Applied For</th>
                                            <th>Resume</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <?php $i = $start_from; $start = 0;?>
                                        <?php if (isset($all_applicants) && $all_applicants->num_rows() > 0): ?>
                                        <?php foreach ($all_applicants->result() as $row): ?>

                                            <tbody>
                                            <tr>
                                                <td align="center"><?php echo $i+$start; ?></td>
                                                <td><?php echo $row->full_name; ?></td>
                                                <td><?php echo $row->email; ?></td>
                                                <td align="left"><?php echo $row->mobile_no; ?></td>
                                                <td align="left"><?php echo $row->job_title; ?></td>
                                                <td align="left">
                                                    <a href="<?php echo base_url();?>uploaded/job_applicants_resume/<?php echo $row->applicant_cv_file; ?>" target="_blank"><?php echo $row->applicant_cv_file; ?></a>
                                                </td>
                                                <td align="center">
                                                    <a class="btn btn-warning"
                                                       href="<?php echo base_url(); ?>admin/job/single/applicant/<?php echo base64_encode($row->id); ?>"  title="View Details"
                                                       role="button"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                    <a class="btn btn-danger"
                                                       href="<?php echo base_url(); ?>admin/job/applicant/delete/<?php echo base64_encode($row->id); ?>" onclick="return checkMe()" title="Delete"
                                                       role="button"><span class="glyphicon glyphicon-trash"></span></a>
                                                </td>
                                            </tr>
                                            </tbody><?php $i++; ?>
                                        <?php endforeach; ?>
                                    </table>
                                    <div class="pagination" style="float:right;"> <?php echo $paginglinks; ?></div>
                                    <div class="pagination" style="float:left;"> <?php echo (!empty($pagermessage) ? $pagermessage : ''); ?></div>
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