<body>
<script language="javascript">
    function checkMe() {
        if (confirm("Are you sure you want to delete the selected Member?")) {
            return true;
        } else {
            return false;
        }
    }
    function deleteImage() {
        if (confirm("Are you sure you want to delete the selected image?")) {
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
                    <form name='add_team_members_form' id='add_team_members_form' enctype="multipart/form-data"
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
                                            <label class="col-md-3 control-label" for="first_name">First Name:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="first_name"
                                                       id="first_name"  value="<?php echo $single_member['first_name']; ?>"
                                                       placeholder="First Name" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="last_name">Last Name:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="last_name"
                                                       id="last_name"  value="<?php echo $single_member['last_name']; ?>"
                                                       placeholder="Last Name" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="designation">Designation:</label>

                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="designation" value="<?php echo $single_member['designation']; ?>"
                                                       id="designation" placeholder="Write Designation" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="member_description">Member
                                                Description:</label>

                                            <div class="col-md-5">
                                                <textarea type="text" class="form-control" id="member_description"
                                                          name="member_description" rows="7"
                                                          placeholder="255 Char Max" required><?php echo $single_member['member_description']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 control-label" for="facebook_link"><i
                                                    class="fa fa-facebook-square fa-2x" style="color: #3b5998"></i>
                                            </div>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="facebook_link" value="<?php echo $single_member['facebook_link']; ?>"
                                                       id="facebook_link" placeholder="Write Facebook link"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-3 control-label" for="twitter_link"><i
                                                    class="fa fa-twitter-square fa-2x" style="color: #55acee"></i></div>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="twitter_link" value="<?php echo $single_member['twitter_link']; ?>"
                                                       id="twitter_link" placeholder="Write Twitter link"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-3 control-label" for="linkedin_link"><i
                                                    class="fa fa-linkedin-square fa-2x" style="color: #0077B5"></i>
                                            </div>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="linkedin_link" value="<?php echo $single_member['linkedin_link']; ?>"
                                                       id="twitter_link" placeholder="Write Linked In link"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 control-label" for="googleplus_link"><i
                                                    class="fa fa-google-plus-square fa-2x" style="color: #dd4b39"></i>
                                            </div>

                                            <div class="col-md-5">
                                                <input type="url" class="form-control" name="googleplus_link" value="<?php echo $single_member['googleplus_link']; ?>"
                                                       id="twitter_link" placeholder="Write google+ link"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label label-optional"
                                                   for="is_active">Is Active:</label>

                                            <div class="col-md-1">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="is_active"
                                                           name="is_active" value="1" <?php echo ($single_member['is_active']== 1 ? 'checked' : '');?> />
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

                            <a class="btn btn-danger" href="<?php echo base_url();?>admin/addteam/" role="button"><span class="glyphicon glyphicon-remove"></span>Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!--<div class="row row-fluid">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Team Members List</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Member Name</th>
                                            <th>Designation</th>
                                            <th>Social Links</th>
                                            <th>Photo</th>
                                            <th>Is Active</th>
                                        </tr>
                                        </thead>
                                        <?php /*$i = 1; */?>
                                        <?php /*if (isset($all_team_members) && $all_team_members->num_rows() > 0): */?>
                                        <?php /*foreach ($all_team_members->result() as $row): */?>

                                            <tbody>
                                            <tr>
                                                <td align="right"><?php /*echo $i++; */?></td>
                                                <td><?php /*echo $row->full_name; */?></td>
                                                <td><?php /*echo $row->designation; */?></td>
                                                <td align="center">
                                                    <a href="<?php /*echo $row->facebook_link ? $row->facebook_link : '#'; */?>"
                                                       target="_blank">
                                                        <i class="fa fa-facebook-square fa-2x"
                                                           style="color: #3b5998"></i>
                                                    </a>
                                                    <a href="<?php /*echo $row->twitter_link ? $row->twitter_link : '#'; */?>"
                                                       target="_blank">
                                                        <i class="fa fa-twitter-square fa-2x"
                                                           style="color: #55acee"></i>
                                                    </a>
                                                    <a href="<?php /*echo $row->linkedin_link ? $row->linkedin_link : '#'; */?>"
                                                       target="_blank">
                                                        <i class="fa fa-linkedin-square fa-2x"
                                                           style="color: #0077B5"></i>
                                                    </a>
                                                    <a href="<?php /*echo $row->googleplus_link ? $row->googleplus_link : '#'; */?>"
                                                       target="_blank">
                                                        <i class="fa fa-google-plus-square fa-2x"
                                                           style="color: #dd4b39"></i>
                                                    </a>
                                                </td>
                                                <td align="center">
                                                    <?php /*if ($row->personal_image) { */?>
                                                        <img class="img-responsive img-circle" height="85px" width="85px"
                                                             src="<?php /*echo base_url(); */?>uploaded/admin/<?php /*echo $row->personal_image; */?>"
                                                             alt="<?php /*echo $row->personal_image; */?>"/> <br/>

                                                        <a class='btn btn-sm btn-warning'
                                                           href="<?php /*echo base_url(); */?>/admin/uploadmemberimg/<?php /*echo base64_encode($row->id); */?>"
                                                           role="button"><span class='glyphicon glyphicon-edit'></span>Change
                                                            Image</a>
                                                        <a class="btn btn-danger"
                                                           href="<?php /*echo base_url(); */?>admin/imagedelete/<?php /*echo base64_encode($row->id); */?>"
                                                           onclick="return deleteImage()" title="Delete"
                                                           role="button"><span class="glyphicon glyphicon-trash"></span></a>

                                                    <?php /*} else { */?>
                                                        <a class='btn btn-submit btn-info'
                                                           href="<?php /*echo base_url(); */?>/admin/uploadmemberimg/<?php /*echo base64_encode($row->id); */?>"
                                                           role="button"><span class='glyphicon glyphicon-plus'></span>Add
                                                            Image</a>
                                                    <?php /*} */?>
                                                </td>
                                                <td align="center"><?php /*echo $row->is_active ? 'Yes' : 'No'; */?></td>
                                            </tr>
                                            </tbody>
                                        <?php /*endforeach; */?>
                                    </table>
                                    <?php /*else: */?>
                                        <div class="col-md-12">
                                            <div class="alert alert-info " role="alert">
                                                No Results were found.
                                            </div>
                                        </div>
                                    <?php /*endif; */?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
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