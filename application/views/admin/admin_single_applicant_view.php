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

            <div class="row row-fluid">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $common_header; ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-user-information">
                                <tbody>
                                <tr>
                                    <td>Applied Position For:</td>
                                    <td><?php echo $single_applicant['job_title']; ?></td>
                                </tr>
                                <tr>
                                    <td>Full Name:</td>
                                    <td><?php echo $single_applicant['full_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth:</td>
                                    <td>
                                        <?php
                                        $jad = new DateTime();
                                        $formatted_date = $jad->createFromFormat("d/m/Y", $single_applicant['date_of_birth']);
                                        echo $formatted_date->format('M d, Y'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><?php echo $single_applicant['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Mobile Number:</td>
                                    <td><?php echo $single_applicant['mobile_no']; ?></td>
                                </tr>
                                <tr>
                                    <td>Last Education Degree:</td>
                                    <td><?php echo $single_applicant['last_education_degree']; ?></td>
                                </tr>
                                <tr>
                                    <td>Institution Name:</td>
                                    <td><?php echo $single_applicant['education_institute_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Passing Year:</td>
                                    <td><?php echo $single_applicant['passing_year']; ?></td>
                                </tr>
                                <tr>
                                    <td>Present Address:</td>
                                    <td><?php echo $single_applicant['present_address']; ?></td>
                                </tr>
                                <tr>
                                    <td>Years of Job Experience:</td>
                                    <td><?php echo $single_applicant['years_of_experience']; ?></td>
                                </tr>
                                <tr>
                                    <td>Last Work Experience:</td>
                                    <td><?php echo $single_applicant['last_work_experience']; ?></td>
                                </tr>
                                <tr>
                                    <td>Current/Last Employer Name:</td>
                                    <td><?php echo $single_applicant['current_employer_name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Current Salary:</td>
                                    <td><?php echo $single_applicant['current_salary']; ?></td>
                                </tr>
                                <tr>
                                    <td>Expected Salary:</td>
                                    <td><?php echo $single_applicant['expected_salary']; ?></td>
                                </tr>
                                <tr>
                                    <td>LinkedIn Profile:</td>
                                    <td>
                                        <a href="<?= $single_applicant['linkedin_profile'] ?>" target="_blank">
                                            <?php echo $single_applicant['linkedin_profile']; ?>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer panel-success">

                        <a href="<?php echo base_url(); ?>admin/job/applicants"
                           class="btn btn-submit btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Back
                        </a>
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