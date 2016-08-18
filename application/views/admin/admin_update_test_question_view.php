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
                                        ?>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="job_title">Questions For:</label>

                                            <div class="col-md-5">
                                                <select class="form-control" name="job_title"
                                                        id="job_title" title="Select a Job Title" required autofocus>
                                                    <option>Please Select a Job Title</option>
                                                    <?php if (isset($job_title_list) && $job_title_list->num_rows() > 0):
                                                        foreach ($job_title_list->result() as $row): ?>
                                                            <option
                                                                value="<?php echo $row->job_id ?>"  <?php if ($single_test_question['job_title'] == $row->job_title) echo "selected"; ?>><?php echo $row->job_title; ?></option>
                                                            <?php
                                                        endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="question_description">Question:</label>

                                            <div class="col-md-5">
                                                 <textarea  class="form-control" id="question_description"
                                                           name="question_description" rows="3"
                                                           placeholder="Question Description" required><?php echo $single_test_question['question_description'];?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="answer1">Answer 1:</label>

                                            <div class="col-md-5">
                                                 <textarea  class="form-control" id="answer1"
                                                           name="answer1" rows="3"
                                                           placeholder="Answer 1" required><?php echo $single_test_question['answer1'];?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="answer2">Answer 2:</label>

                                            <div class="col-md-5">
                                                 <textarea  class="form-control" id="answer2"
                                                           name="answer2" rows="3"
                                                           placeholder="Answer 2" required><?php echo $single_test_question['answer2'];?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="answer3">Answer 3:</label>

                                            <div class="col-md-5">
                                                 <textarea  class="form-control" id="answer3"
                                                           name="answer3" rows="3"
                                                           placeholder="Answer 3" required><?php echo $single_test_question['answer3'];?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="answer4">Answer 4:</label>

                                            <div class="col-md-5">
                                                 <textarea  class="form-control" id="answer4"
                                                           name="answer4" rows="3"
                                                           placeholder="Answer 4" required><?php echo $single_test_question['answer4'];?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="true_answer">True Answer:</label>

                                            <div class="col-md-5">
                                                 <textarea  class="form-control" id="true_answer"
                                                           name="true_answer" rows="3"
                                                           placeholder="True Answer" required><?php echo $single_test_question['true_answer'];?></textarea>
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
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>admin/add/test/question/"
                               role="button"><span class="glyphicon glyphicon-remove"></span>Cancel</a>
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
</body>