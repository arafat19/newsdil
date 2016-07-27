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
                                    src="<?php echo base_url(); ?>images/logo.png" alt=""/></a></div>
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
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="contain">
                            <h5 class="text-uppercase">Job Title</h5>

                            <div class="bottom-Line"></div>
                            <p><?php echo $single_active_job['job_title']; ?></p>

                            <h5 class="text-uppercase">Job Description</h5>

                            <div class="bottom-Line"></div>
                            <p><?php echo $single_active_job['job_detail_description']; ?></p>

                            <h5 class="text-uppercase">Job Type</h5>

                            <div class="bottom-Line"></div>
                            <p><?php echo $single_active_job['job_type']; ?></p>

                            <h5 class="text-uppercase">Salary</h5>

                            <div class="bottom-Line"></div>
                            <p><?php echo $single_active_job['job_salary']; ?></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="contain">
                            <h5 class="text-uppercase">Job Requirements</h5>

                            <div class="bottom-Line"></div>
                            <p><?php echo $single_active_job['job_requirements']; ?></p>

                            <h5 class="text-uppercase">Experience Requirement</h5>

                            <div class="bottom-Line"></div>
                            <p><?php echo $single_active_job['job_experience']; ?></p>

                            <h5 class="text-uppercase">Working Hour</h5>

                            <div class="bottom-Line"></div>
                            <p><?php echo $single_active_job['working_hour']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="titel-area clearfix">
                    <div class="col-lg-12">
                        <h3 class="text-uppercase text-center">Other Facilities</h3>

                        <div class="divider-job-page"></div>
                        <h4 class="text text-center"><?php echo $single_active_job['other_conditions']; ?></h4>
                    </div>
                    <div class="col-lg-12">
                        <h3 class="text-uppercase text-center">Application Deadline</h3>

                        <div class="divider-job-page"></div>
                        <h4 class="text text-center"><?php echo $single_active_job['job_application_deadline']; ?></h4>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="text-center">

                    <a class="btn btn-lg btn-warning" href="<?php echo base_url(); ?>jobs/apply/<?php echo $url_segment;?>"
                       role="button">Apply Now</a>
                </div>
            </div>

        </div>
    </div>
</section>


