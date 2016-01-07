<body>
<script language="javascript">
    function checkMe() {
        if (confirm("Are you sure you want to delete the selected service?")) {
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
                        Update Profile
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="<?php echo base_url(); ?>admin">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> Update Profile
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Update Profile</h3>
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
                                        if ($this->session->flashdata('user_info_update_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('user_info_update_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">Full Name:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $particular_user['full_name']; ?>"
                                                       placeholder="Full Name" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="email">Email:</label>
                                            <div class="col-md-5">
                                                <input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php echo $particular_user['email']; ?>"
                                                       pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                                       required="required"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="password">Password:</label>
                                            <div class="col-md-5">
                                                <input type="password" class="form-control" id="password" name="password"
                                                       pattern="^.*(?=.{8,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                                       placeholder="Letters,Numbers & Special Characters" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="confirm_password">Confirm Your Password:</label>
                                            <div class="col-md-5">
                                                <input type="password" class="form-control" id="confirm_password"
                                                       name="confirm_password"
                                                       pattern="^.*(?=.{8,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                                       placeholder="Letters,Numbers & Special Characters" required oninput="check(this)"/>

                                                <script language='javascript' type='text/javascript'>
                                                    function check(input) {
                                                        if (input.value != document.getElementById('password').value) {
                                                            input.setCustomValidity('Password Must be Matching.');
                                                        } else {
                                                            // input is valid -- reset the error message
                                                            input.setCustomValidity('');
                                                        }
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label label-required" for="cell_number">Cell Number:</label>
                                            <div class="col-md-5">
                                                <input type="tel" class="form-control" id="cell_number" name="cell_number" value="<?php echo $particular_user['cell_number']; ?>"
                                                       pattern="[0][1-9]{4}[-][0-9]{6}"
                                                       placeholder="Mobile Number (Format: 01XXX-XXXXXX)"/>
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
                            <a class="btn btn-danger" href="<?php echo base_url();?>admin" role="button"><span class="glyphicon glyphicon-remove"></span>Cancel</a>

                        </div>

                    </form>
                </div>
                <!-- /.row -->
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