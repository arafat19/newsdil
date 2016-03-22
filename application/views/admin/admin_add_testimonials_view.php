<body>
<script language="javascript">
    function checkMe() {
        if (confirm("Are you sure you want to delete the selected Member?")) {
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
                                        if ($this->session->flashdata('team_mem_update_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('team_mem_update_message'); ?>
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
                                        if ($this->session->flashdata('member_delete_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('member_delete_message'); ?>
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
                                        <div id="input-fields"></div>

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
                                            <th>Title</th>
                                            <th>Testimonial Description</th>
                                            <th>Commented By</th>
                                            <th>Is Active</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <?php $i = $start_from; $start = 0; ?>
                                        <?php if (isset($all_testimonials) && $all_testimonials->num_rows() > 0): ?>
                                        <?php foreach ($all_testimonials->result() as $row):?>

                                            <tbody>
                                            <tr>
                                                <td align="center"><?php echo $i+$start; ?></td>
                                                <td><?php echo $row->title; ?></td>
                                                <td><?php echo $row->testimonial_description; ?></td>
                                                <td><?php echo $row->commented_by; ?></td>

                                                <td align="center"><?php echo $row->is_active ? 'Yes' : 'No';  ?></td>
                                                <td align="center"><a class="btn btn-success" title="Edit"
                                                                      href="<?php echo base_url();  ?>admin/updateteamember/<?php echo base64_encode($row->id); ?>"
                                                                      role="button"><span
                                                            class="glyphicon glyphicon-edit"></span></a>

                                                    <a class="btn btn-danger"
                                                       href="<?php echo base_url(); ?>admin/memberdelete/<?php echo base64_encode($row->id); ?>"
                                                       onclick="return checkMe()" title="Delete"
                                                       role="button"><span class="glyphicon glyphicon-trash"></span></a>
                                                </td>
                                            </tr>
                                            </tbody> <?php $i++; ?>
                                        <?php endforeach;  ?>
                                    </table>
                                    <div class="pagination" style="float:right;"> <?php echo $paginglinks; ?></div>
                                    <div class="pagination" style="float:left;"> <?php echo (!empty($pagermessage) ? $pagermessage : ''); ?></div>
                                    <?php else: ?>
                                        <div class="col-md-12">
                                            <div class="alert alert-info " role="alert">
                                                No Results were found.
                                            </div>
                                        </div>
                                    <?php endif;  ?>
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

<!--React Js -->

<script type="text/babel">
    var InputFields = React.createClass({

      render: function() {

        return (
            <div>
                    <div className="form-group">
                        <label className="col-md-3 control-label" htmlFor="title">Title:</label>

                        <div className="col-md-5">
                            <input type="text" className="form-control" name="title"
                                   id="title" placeholder="Title" autofocus/>
                        </div>
                    </div>
                    <div className="form-group">
                        <label className="col-md-3 control-label" htmlFor="testimonial_description">Testimonial Description:</label>

                        <div className="col-md-5">
                            <textarea type="text" className="form-control" id="testimonial_description"
                                      name="testimonial_description" rows="7"
                                      placeholder="255 Char Max" required></textarea>
                        </div>
                    </div>
                    <div className="form-group">
                        <label className="col-md-3 control-label" htmlFor="testimonial_details_link">Testimonial Details Link:</label>

                        <div className="col-md-5">
                            <input type="url" className="form-control" name="testimonial_details_link"
                                   id="testimonial_details_link" placeholder="Write testimonial details link"/>
                        </div>
                    </div>
                    <div className="form-group">
                        <label className="col-md-3 control-label" htmlFor="commented_by">Commented By:</label>

                        <div className="col-md-5">
                            <input type="text" className="form-control" name="commented_by"
                                   id="commented_by" placeholder="Write commentator name"/>
                        </div>
                    </div>
                    <div className="form-group">
                        <label className="col-md-3 control-label label-optional"
                               htmlFor="is_active">Is Active:</label>

                        <div className="col-md-1">
                            <div className="checkbox">
                                <input type="checkbox" id="is_active"
                                       name="is_active" value="1"/>
                            </div>
                        </div>
                    </div>
            </div>
        );
      },
    });


    ReactDOM.render(
      React.createElement(InputFields),
      document.getElementById('input-fields'));





</script>
<script src="<?php echo base_url(); ?>js/react.js"></script>
<script src="<?php echo base_url(); ?>js/react-dom.js"></script>
<script src="<?php echo base_url(); ?>js/browser.js"></script>


</body>