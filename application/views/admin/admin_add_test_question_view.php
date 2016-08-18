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

            </div>
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"> <?php echo $common_header; ?></h3>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <iframe src="http://localhost/onlinexam/admin" style="width: 100%; height: 700px" name="internal"></iframe>

                            </div>
                        </div>
                    </div>
                    <div class="panel-footer panel-success">

                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!--<div class="row row-fluid">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php /*echo $list_title; */?></h3>
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
                                        <?php /*$i = $start_from;
                                        $start = 0; */?>
                                        <?php /*if (isset($all_questions) && $all_questions->num_rows() > 0): */?>
                                        <?php /*foreach ($all_questions->result() as $row):
                                            */?>

                                            <tbody>
                                            <tr>
                                                <td align="center"><?php /*echo $i + $start; */?></td>
                                                <td><?php /*echo $row->job_title; */?></td>
                                                <td><?php /*echo $row->question_description; */?></td>
                                                <td><?php /*echo $row->answer1; */?></td>
                                                <td><?php /*echo $row->answer2; */?></td>
                                                <td><?php /*echo $row->answer3; */?></td>
                                                <td><?php /*echo $row->answer4; */?></td>
                                                <td><?php /*echo $row->true_answer; */?></td>
                                                <td align="center"><a class="btn btn-success" title="Edit"
                                                                      href="<?php /*echo base_url(); */?>admin/update/test/question/<?php /*echo base64_encode($row->question_id); */?>"
                                                                      role="button"><span
                                                            class="glyphicon glyphicon-edit"></span></a>

                                                    <a class="btn btn-danger"
                                                       href="<?php /*echo base_url(); */?>admin/delete/test/question/<?php /*echo base64_encode($row->question_id); */?>"
                                                       onclick="return checkMe()" title="Delete"
                                                       role="button"><span class="glyphicon glyphicon-trash"></span></a>
                                                </td>

                                            </tr>
                                            </tbody> <?php /*$i++; */?>
                                        <?php /*endforeach; */?>
                                    </table>
                                    <div class="pagination" style="float:right;"> <?php /*echo $paginglinks; */?></div>
                                    <div class="pagination"
                                         style="float:left;"> <?php /*echo(!empty($pagermessage) ? $pagermessage : ''); */?></div>
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