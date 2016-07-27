<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<header>
    <div class="header-section clearfix">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="wsmenucontainer clearfix">
                <div class="wsmenucontent overlapblackbg"></div>
                <div class="wsmenuexpandermain slideRight"><a id="navToggle"
                                                              class="animated-arrow slideLeft"><span></span></a> <a
                        href="<?php echo base_url(); ?>" class="smallogo"><img
                            src="<?php echo base_url(); ?>images/logo.png" width="120"
                            alt=""/></a>

                    <!--<form action="#" class="searchBox" id="searchiteam" method="get">
                        <input type="search" onblur="if (this.value == '') {this.value = 'Search';}"
                               onfocus="if (this.value == 'Search') {this.value = '';}" id="s" name="s" value=""
                               placeholder="Search">
                    </form>-->
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="logo clearfix"><a href="<?php echo base_url(); ?>"
                                                      title="Responsive Slide Menus"><img
                                    src="<?php echo base_url(); ?>uploaded/admin/<?php echo $all_system_configuration_ui['logo']; ?>"
                                    alt="<?php echo base_url(); ?>uploaded/admin/<?php echo $all_system_configuration_ui['logo']; ?>"/></a>
                        </div>
                    </div>
                    <!-- Navigation -->
                    <?php $this->load->view('menu'); ?>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- Intro Section -->
<section id="intro">
    <div class="banner-section">
        <div class="img-overlay"></div>
        <div class="banner-intro-about">
            <div class="container">
                <div class="row">
                    <div class="intro-body-area-about clearfix">
                        <div class="col-xs-12">
                            <h1><?php echo $all_system_configuration_ui['top_heading1']; ?></h1>

                            <h2><?php echo $all_system_configuration_ui['top_heading2']; ?></h2>

                            <div class="read-btn"><a href="<?php echo base_url(); ?>about-us">Read More</a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- Why Choose us Section -->
<section id="about" class="top-gape">
    <div class="container">
        <div class="row">
            <div class="titel-area clearfix">
                <div class="col-lg-12">
                    <h2><?php echo $title_area_heading_h2; ?></h2>

                    <div class="divied"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="full-width-iteam">
        <div class="container">
            <div class="row">
                <div class="contain-body about-section choose-us-section clearfix">
                    <div class="contain">
                        <div class="row">
                            <form name='contact_us' id='contact_us' enctype="multipart/form-data"
                                  class="form-horizontal"
                                  method="post">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"> Personal Details</h3>
                                    </div>
                                    <div class="panel-body">

                                        <?php if (validation_errors()) { ?>
                                            <div class="form-group">
                                                <div class="col-sm-10 col-sm-offset-2">
                                                    <div class="alert alert-danger" role="alert">
                                                        <i class="fa fa-exclamation-triangle">
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo validation_errors(); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('resume_upload_success')) { ?>

                                            <div class="form-group">
                                                <div class="col-sm-10 col-sm-offset-2">
                                                    <div class="alert alert-success" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('resume_upload_success'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        if ($this->session->flashdata('con_failure_msg')) { ?>

                                            <div class="form-group">
                                                <div class="col-sm-10 col-sm-offset-2">
                                                    <div class="alert alert-danger" role="alert">
                                                        <i class="fa fa-exclamation-triangle">
                                                        <a href="#" class="close" data-dismiss="alert"
                                                           aria-label="close">&times;</a>
                                                        <?php echo $this->session->flashdata('con_failure_msg'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="form-group">
                                            <label for="full_name" class="col-sm-2 control-label">Full Name <i
                                                    class="fa fa-asterisk"></i> </label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="full_name" name="full_name"
                                                       placeholder="Full Name" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="dob" class="col-sm-2 control-label">Date Of Birth <i
                                                    class="fa fa-asterisk"></i></label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="dob" name="dob"
                                                       placeholder="dd/mm/yyyy" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="last_education_degree" class="col-sm-2 control-label">Last
                                                Degree <i
                                                    class="fa fa-asterisk"></i> </label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="last_education_degree"
                                                       name="last_education_degree"
                                                       placeholder="Last Education Degree" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email Address <i
                                                    class="fa fa-asterisk"></i></label>

                                            <div class="col-sm-4">
                                                <input class="form-control" name="email" type="email"
                                                       id="email" placeholder="Write your email address"
                                                       pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                                       required/>
                                            </div>
                                            <label class="col-sm-2 control-label" for="mobile_no">Cell Number <i
                                                    class="fa fa-asterisk"></i></label>

                                            <div class="col-sm-4">
                                                <input type="tel" class="form-control" id="mobile_no" name="mobile_no"
                                                       pattern="[0][1-9]{4}[-][0-9]{6}"
                                                       placeholder="Format: 01XXX-XXXXXX" required=""/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="present_address" class="col-sm-2 control-label">Present Address
                                                <i
                                                    class="fa fa-asterisk"></i></label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="4" maxlength="255" name="present_address"
                                                id="present_address"
                                                 placeholder="255 Char Max" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Experience</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="last_work_experience" class="col-sm-2 control-label">What is your past work experience? (If Any)</label>

                                            <div class="col-sm-10">
                                                 <textarea class="form-control" rows="4" maxlength="255" name="last_work_experience"
                                                           id="last_work_experience"
                                                           placeholder="Briefly share about companies you worked for and projects you worked on"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="expected_salary" class="col-sm-2 control-label">Expected Salary</label>

                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="expected_salary" name="expected_salary"
                                                       placeholder="Write your expected salary"/>
                                            </div>
                                            <label class="col-md-2 control-label" for="userfile">Upload Resume<i class="fa fa-asterisk"></i></label>

                                            <div class="col-md-4">
                                                <input type="file" class="form-control" name="userfile" title="Allowed size: 1 MB"
                                                       id="userfile" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                        <button id="create" name="create" type="submit" data-role="button"
                                                class="btn btn-xl btn-warning">Submit
                                        </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {
        $('#dob').datepicker({
            format: "dd/mm/yyyy"
        });

    });
</script>
