<body>
<script language="javascript">
    function checkMe() {
        if (confirm("Are you sure you want to delete the select Question?")) {
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
                <iframe src="http://localhost/onlinexam" style="width: 90%; height: 800px" name="internal"></iframe>
            </div>
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <?php echo $common_header; ?></h3>
                    </div>
                    <form name='add_project_cat_form' id='add_project_cat_form' enctype="multipart/form-data"
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
                                        if ($this->session->flashdata('test_question_update_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('test_question_update_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('test_question_delete_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('test_question_delete_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('cant_add_message')) { ?>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="alert alert-warning" role="alert">
                                                        <i class="fa fa-exclamation-triangle"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('cant_add_message'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="job_title">Questions For:</label>

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
                                            <label class="col-md-3 control-label"
                                                   for="question_description">Question:</label>

                                            <div class="col-md-5">
                                                 <textarea type="text" class="form-control" id="question_description"
                                                           name="question_description" rows="3"
                                                           placeholder="Question Description" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="answer1">Answer 1:</label>

                                            <div class="col-md-5">
                                                 <textarea type="text" class="form-control" id="answer1"
                                                           name="answer1" rows="3"
                                                           placeholder="Answer 1" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="answer2">Answer 2:</label>

                                            <div class="col-md-5">
                                                 <textarea type="text" class="form-control" id="answer2"
                                                           name="answer2" rows="3"
                                                           placeholder="Answer 2" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="answer3">Answer 3:</label>

                                            <div class="col-md-5">
                                                 <textarea type="text" class="form-control" id="answer3"
                                                           name="answer3" rows="3"
                                                           placeholder="Answer 3" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="answer4">Answer 4:</label>

                                            <div class="col-md-5">
                                                 <textarea type="text" class="form-control" id="answer4"
                                                           name="answer4" rows="3"
                                                           placeholder="Answer 4" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="true_answer">True Answer:</label>

                                            <div class="col-md-5">
                                                 <textarea type="text" class="form-control" id="true_answer"
                                                           name="true_answer" rows="3"
                                                           placeholder="True Answer" required></textarea>
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
                                            <th>Question</th>
                                            <th>Answer 1</th>
                                            <th>Answer 2</th>
                                            <th>Answer 3</th>
                                            <th>Answer 4</th>
                                            <th>True Answer</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <?php $i = $start_from;
                                        $start = 0; ?>
                                        <?php if (isset($all_questions) && $all_questions->num_rows() > 0): ?>
                                        <?php foreach ($all_questions->result() as $row):
                                            ?>

                                            <tbody>
                                            <tr>
                                                <td align="center"><?php echo $i + $start; ?></td>
                                                <td><?php echo $row->job_title; ?></td>
                                                <td><?php echo $row->question_description; ?></td>
                                                <td><?php echo $row->answer1; ?></td>
                                                <td><?php echo $row->answer2; ?></td>
                                                <td><?php echo $row->answer3; ?></td>
                                                <td><?php echo $row->answer4; ?></td>
                                                <td><?php echo $row->true_answer; ?></td>
                                                <td align="center"><a class="btn btn-success" title="Edit"
                                                                      href="<?php echo base_url(); ?>admin/update/test/question/<?php echo base64_encode($row->question_id); ?>"
                                                                      role="button"><span
                                                            class="glyphicon glyphicon-edit"></span></a>

                                                    <a class="btn btn-danger"
                                                       href="<?php echo base_url(); ?>admin/delete/test/question/<?php echo base64_encode($row->question_id); ?>"
                                                       onclick="return checkMe()" title="Delete"
                                                       role="button"><span class="glyphicon glyphicon-trash"></span></a>
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
</body>