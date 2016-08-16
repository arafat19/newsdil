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
                        <div class="logo wow animated bounceIn clearfix"><a href="<?php echo base_url(); ?>"
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

<!-- Inner Header section -->
<div id="promo-four" class="parallax-section">
    <div class="parallax-content">
        <div class="color-overlay"></div>
        <div class="container text-center wow animated bounceIn">
            <div class="col-xs-12 clearfix">
                <h2>Build Carrer<span> with us</span></h2>
                <div class="overview_page"><a href="<?php echo base_url(); ?>about-us">KNOW MORE ABOUT US</a></div>
                <div class="catagories">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>about-us">About us</a></li>
                        <li>/</li>
                        <li><a href="<?php echo base_url(); ?>career" class="active">Carrer</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Body contain section -->
<section id="inner-page" class="top-gape-inner">
    <div class="container">
        <div class="row">
            <div class="contain-body about-section what-we-do carrer-section post section clearfix">
                <div class="contain-left">
                    <div class="col-xs-12 col-sm-7 col-md-8">
                        <h2><?php echo $single_active_job['job_title']; ?></h2>
                        <div class="divied"></div>
                        <div class="contain">
                            <p><?php echo $single_active_job['job_short_description']; ?></p>
                            <div class="carrer-post-iteam wow animated slideInLeft">
                                <div class="career-post-list">
                                    <?php if ($single_active_job['job_detail_description'] != '') { ?>
                                        <h4 class="side-color">Job Description</h4>
                                        <?php echo $single_active_job['job_detail_description']; ?>
                                    <?php } ?>

                                    <!--  <p>Let’s start out with the innovation giants over at Apple. For their recruitment
                                          ad here, they take an obvious stab at a rival company. It’s controversial enough
                                          to entice applicants, yet witty enough to be considered tasteful.</p>-->

                                    <?php if ($single_active_job['job_requirements'] != '') { ?>
                                        <h4 class="side-color">Job Requirements</h4>
                                        <?php echo $single_active_job['job_requirements']; ?>
                                    <?php } ?>

                                    <!--<p>Let’s start out with the innovation giants over at Apple. For their recruitment
                                        ad here, they take an obvious stab at a rival company. It’s controversial enough
                                        to entice applicants, yet witty enough to be considered tasteful.Let’s start out
                                        with the innovation giants over at Apple.</p>-->

                                    <h4 class="side-color">Experience Requirement</h4>
                                    <p><?php echo $single_active_job['job_experience']; ?></p>
                                    <!--<ul class="Post-list-iteam">
                                        <li>Tired of mediocre managers? Come join us and work with the best</li>
                                        <li>We have the best people managers on the planet</li>
                                    </ul>-->
                                    <h4 class="side-color">Job Type</h4>
                                    <p><?php echo $single_active_job['job_type']; ?></p>

                                    <h4 class="side-color">Working Hours</h4>
                                    <p><?php echo $single_active_job['working_hour']; ?></p>

                                    <h4 class="side-color">Salary</h4>
                                    <p><?php echo $single_active_job['job_salary']; ?></p>

                                    <h4 class="side-color">Other Facilities</h4>
                                    <p><?php echo $single_active_job['other_conditions']; ?></p>

                                    <div class="post-deadline">
                                        <h2>Application Deadline
                                            <span><?php echo $single_active_job['job_application_deadline']; ?></span>
                                        </h2>
                                        <div class="read-btn"><a href="<?= base_url()?>jobs/apply/<?=$url_segment?>">Apply Now</a></div>
                                        <br class="clear">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contain-right">
                    <div class="col-xs-12 col-sm-5 col-md-4">
                        <div class="contain">
                            <h2>Other Jobs</h2>
                            <div class="divied"></div>
                            <div class="news-inner-side news-section wow animated slideInRight animated" style="visibility: visible; animation-name: slideInRight;">
                                <div class="carrer-section-area">
                                    <ul>
                                        <?php
                                        $animations = array("slideInUp", "bounceIn", "slideInRight");

                                        if (isset($all_active_jobs) && $all_active_jobs->num_rows() > 0):
                                            foreach ($all_active_jobs->result() as $row):
                                                if($job_page_url != $row->job_page_url ){
                                                $random_number = rand(0, 2);
                                                $jad = new DateTime();
                                                $formatted_date = $jad->createFromFormat("d/m/Y", $row->job_application_deadline);
                                                ?>
                                                <li style="visibility: visible" class="wow animated <?php echo $animations[$random_number]; ?> animated">
                                                    <div class="career-post-list">
                                                        <h4><?php echo $row->job_title; ?></h4>
                                                        <p><?php echo $row->job_short_description; ?></p>
                                                        <ul class="Post-list-iteam">
                                                            <li>Experience: <?php echo $row->job_experience; ?></li>
                                                            <li>Job Application
                                                                Deadline: <?php echo $formatted_date->format('M d, Y');; ?></li>
                                                        </ul>
                                                        <div class="more-btn"><a href="<?php echo $row->job_page_url; ?>">View
                                                                details</a></div>
                                                    </div>
                                                </li>
                                            <?php } endforeach;
                                        endif; ?>
                                       <!-- <li style="visibility: visible; animation-name: slideInUp;" class="wow animated slideInUp animated animated">
                                            <div class="career-post-list">
                                                <h4> Web Desigber</h4>
                                                <p>Let’s start out with the innovation giants over at Apple. For their recruitment ad here, they take an obvious stab at a rival company. It’s controversial enough to entice applicants, yet witty enough to be considered tasteful.</p>
                                                <ul class="Post-list-iteam">
                                                    <li>We actually “listen” to our employees!</li>
                                                    <li>Our managers recruit and retain the very best…it’s what we do</li>
                                                    <li>We put the “you” back in “team”</li>
                                                </ul>
                                                <div class="more-btn"> <a href="carrer_details.html">View details</a> </div>
                                            </div>
                                        </li>
                                        <li style="visibility: hidden; animation-name: none;" class="wow animated bounceIn animated">
                                            <div class="career-post-list">
                                                <h4>PHP Developer</h4>
                                                <p>Let’s start out with the innovation giants over at Apple. For their recruitment ad here, they take an obvious stab at a rival company. It’s controversial enough to entice applicants, yet witty enough to be considered tasteful.</p>
                                                <ul class="Post-list-iteam">
                                                    <li>We actually “listen” to our employees!</li>
                                                    <li>Our managers recruit and retain the very best…it’s what we do</li>
                                                    <li>We put the “you” back in “team”</li>
                                                </ul>
                                                <div class="more-btn"> <a href="carrer_details.html">View details</a> </div>
                                            </div>
                                        </li>
                                        <li style="visibility: hidden; animation-name: none;" class="wow animated bounceIn animated">
                                            <div class="career-post-list">
                                                <h4>Project Manager</h4>
                                                <p>Let’s start out with the innovation giants over at Apple. For their recruitment ad here, they take an obvious stab at a rival company. It’s controversial enough to entice applicants, yet witty enough to be considered tasteful.</p>
                                                <ul class="Post-list-iteam">
                                                    <li>We actually “listen” to our employees!</li>
                                                    <li>Our managers recruit and retain the very best…it’s what we do</li>
                                                    <li>We put the “you” back in “team”</li>
                                                </ul>
                                                <div class="more-btn"> <a href="carrer_details.html">View details</a> </div>
                                            </div>
                                        </li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


