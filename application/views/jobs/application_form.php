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
                        <div class="logo  wow animated  bounceIn clearfix"><a href="<?php echo base_url(); ?>"
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

<!-- Inner Header section -->
<div id="promo-four" class="parallax-section">
    <div class="parallax-content">
        <div class="color-overlay"></div>
        <div class="container text-center wow animated bounceIn">
            <div class="col-xs-12 clearfix">
                <h2>Build Carrer<span> with us</span></h2>
                <div class="overview_page"><a href="<?= base_url() ?>about">KNOW MORE ABOUT US</a></div>
                <div class="catagories">
                    <ul>
                        <li><a href="<?= base_url() ?>about">About us</a></li>
                        <li>/</li>
                        <li><a href="<?= base_url() ?>career" class="active">Career</a></li>
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
                        <h2><?= $title_area_heading_h2 ?></h2>
                        <div class="divied"></div>
                        <div class="contain">
                            <h3>We have the Best Engineers and Managers</h3>
                            <p>Let’s start out with the innovation giants over at SDIL.</p>
                            <div class="post-job-form-section">
                                <form name='contact_us' id='contact_us' enctype="multipart/form-data"
                                      method="post">
                                    <?php if (validation_errors()) { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            <?php echo validation_errors(); ?>
                                            <div class="waring-colse" data-dismiss="alert"><i
                                                    class="fa fa-times-circle"></i>
                                            </div>
                                        </div>
                                    <?php }
                                    if ($this->session->flashdata('email_not_unique')) { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            <?php echo $this->session->flashdata('email_not_unique'); ?>
                                            <div class="waring-colse" data-dismiss="alert"><i
                                                    class="fa fa-times-circle"></i>
                                            </div>
                                        </div>
                                    <?php }
                                    if ($this->session->flashdata('mobile_no_not_unique')) { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <i class="fa fa-exclamation-triangle"></i>
                                            <?php echo $this->session->flashdata('mobile_no_not_unique'); ?>
                                            <div class="waring-colse" data-dismiss="alert"><i
                                                    class="fa fa-times-circle"></i>
                                            </div>
                                        </div>
                                    <?php }
                                    if ($this->session->flashdata('resume_upload_success')) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <i class="fa fa-check"></i>
                                            <?php echo $this->session->flashdata('resume_upload_success'); ?>
                                            <div class="success-colse" data-dismiss="alert"><i
                                                    class="fa fa-times-circle"></i>
                                            </div>
                                        </div>
                                    <?php }
                                    if ($this->session->flashdata('con_failure_msg')) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <i class="fa fa-times"></i>
                                            <?php echo $this->session->flashdata('con_failure_msg'); ?>
                                            <div class="danger-colse" data-dismiss="alert"><i
                                                    class="fa fa-times-circle"></i>
                                            </div>
                                        </div>
                                    <?php }
                                    if ($this->session->flashdata('file_errors')) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <i class="fa fa-times"></i>
                                            <?php echo $this->session->flashdata('file_errors'); ?>
                                            <div class="danger-colse" data-dismiss="alert"><i
                                                    class="fa fa-times-circle"></i>
                                            </div>
                                        </div>
                                    <?php }?>

                                    <h4>How did you hear about us? <span>*</span></h4>
                                    <ul>
                                        <li>
                                            <input type="radio" name="action" id="iteam1" value="Facebook"/>
                                            <label for="iteam1">Facebook</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="action" id="iteam2" value="LinkedIn"/>
                                            <label for="iteam2">LinkedIn</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="action" id="iteam3" value="Google Web Search"/>
                                            <label for="iteam3">Google Web Search</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="action" id="iteam4" value="Bdjobs"/>
                                            <label for="iteam4">Bdjobs</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="action" id="iteam5" value="Others"/>
                                            <label for="iteam5">Others</label>
                                        </li>
                                        <br class="clear">
                                        <div id="div1" style="display:none;">
                                            <h5>Please mention the source</h5>
                                            <input type="text" value="Please Enter Text" id="" name="Please Enter Text"
                                                   class="textfield"
                                                   onfocus="if(this.value  == 'Please Enter Text') { this.value = ''; } "
                                                   onblur="if(this.value == '') { this.value = 'Please Enter Text'; } "/>
                                        </div>
                                    </ul>
                                    <div class="personal-details clearfix">
                                        <h4 class="left">Personal Details <span>*</span></h4>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <input type="text" class="textfield" id="full_name"
                                                   name="full_name"
                                                   placeholder="Full Name" required autofocus/>
                                            <input type="text" class="textfield" id="education_institute_name"
                                                   name="education_institute_name"
                                                   placeholder="College/University" required/>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <input type="text" class="textfield" id="datepicker" name="dob"
                                                   minlength="4" placeholder="Date of Birth" required/>

                                            <input type="text" class="textfield" id="passing_year"
                                                   name="passing_year"
                                                   placeholder="Passing Year" required/>
                                        </div>
                                        <div class="col-xs-12">
                                            <input type="text" class="textfield" id="last_education_degree"
                                                   name="last_education_degree" minlength="4"
                                                   placeholder="Last Education Degree" required/>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <input type="tel" class="textfield" id="mobile_no"
                                                   name="mobile_no"
                                                   pattern="[0][1-9]{4}[-][0-9]{6}" minlength="11"
                                                   placeholder="Format: 01XXX-XXXXXX" required=""/>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <input class="textfield" name="email" type="email"
                                                   id="email" placeholder="Email"
                                                   pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                                   required/>
                                        </div>
                                        <div class="col-xs-12">
                                              <textarea class="textfield" rows="4" maxlength="255"
                                                        name="present_address"
                                                        id="present_address"
                                                        placeholder="Present Address" required></textarea>
                                        </div>
                                    </div>
                                    <div class="personal-details clearfix">
                                        <h4 class="left">Experience</h4>
                                        <div class="col-xs-12">
                                            <h5>LinkedIn (If Any)</h5>
                                            <input type="text" class="textfield" id="linkedin_profile"
                                                   name="linkedin_profile" minlength="4"
                                                   placeholder="LinkedIn Profile"/>
                                        </div>
                                        <div class="col-xs-12">
                                            <h5>How many years of work experience do you have? (If any)</h5>
                                            <input type="text" class="textfield" id="years_of_experience"
                                                   name="years_of_experience" minlength="4"
                                                   placeholder="Years of experience"/>
                                        </div>
                                        <div class="col-xs-12">
                                            <h5>What is your past work experience? (If Any)</h5>
                                            <h6>Briefly share about companies you worked for and projects you worked
                                                on</h6>
                                            <textarea class="textfield" maxlength="255"
                                                      name="last_work_experience" rows="5"
                                                      id="last_work_experience"
                                                      placeholder="Last Work Experience"></textarea>
                                        </div>
                                        <div class="col-xs-12">
                                            <h5>Current / Previous Employer (If Any)</h5>
                                            <input type="text" class="textfield" id="current_employer_name"
                                                   name="current_employer_name" minlength="4"
                                                   placeholder="Current/Last Employer Name"/>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <input type="text" class="textfield" id="current_salary"
                                                   name="current_salary" minlength="3"
                                                   placeholder="Current Salary"/>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <input type="text" class="textfield" id="expected_salary"
                                                   name="expected_salary"
                                                   minlength="3" placeholder="Expected Salary*" required/>
                                        </div>
                                        <div class="col-xs-12">
                                            <h5>Upload Your Resume <span>*</span></h5>
                                            <h6>Maximum 3mb ( Allowed File Types : *.pdf, *.doc, *.docx)</h6>
                                            <input type="file" class="textfield" name="userfile"
                                                   title="Allowed size: 1 MB"
                                                   required/>


                                        </div>
                                        <div class="col-xs-12">
                                            <h5>Please select the below option for submit<span>*</span></h5>
                                            <div class="confirm-check">
                                                <input type="checkbox" value="Facebook" id="iteam6" name="action">
                                                <label for="iteam6">I verify that the information provided is true to
                                                    the best of my knowledge.</label>
                                                <div id="submit-iteam" style="display:none;">
                                                    <input type="submit" id="formSubmit" value="SUBMIT NOW"
                                                           class="submit-button">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contain-right">
                    <div class="col-xs-12 col-sm-5 col-md-4">
                        <div class="contain">
                            <h2>Other Jobs</h2>
                            <div class="divied"></div>
                            <div class="news-inner-side news-section wow animated slideInRight">
                                <div class="carrer-section-area">
                                    <ul>
                                        <?php
                                        $animations = array("slideInUp", "bounceIn", "slideInRight");

                                        if (isset($all_active_jobs) && $all_active_jobs->num_rows() > 0):
                                            foreach ($all_active_jobs->result() as $row):
                                                if($job_title != $row->job_title ){
                                                    $random_number = rand(0, 2);
                                                    $jad = new DateTime();
                                                    $formatted_date = $jad->createFromFormat("d/m/Y", $row->job_application_deadline);
                                                    ?>
                                                    <li style="visibility: visible" class="wow animated <?php echo $animations[$random_number]; ?> animated">
                                                        <div class="career-post-list">
                                                            <h4><?php echo $row->job_title; ?></h4>
                                                            <p><?php echo substr($row->job_short_description, 0, 170); ?></p>
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
                                       <!-- <li class="wow animated slideInUp animated"
                                            style="visibility: visible; animation-name: slideInUp;">
                                            <div class="career-post-list">
                                                <h4> Web Desigber</h4>
                                                <p>Let’s start out with the innovation giants over at Apple. For their
                                                    recruitment ad here, they take an obvious stab at a rival company.
                                                    It’s controversial enough to entice applicants, yet witty enough to
                                                    be considered tasteful.</p>
                                                <ul class="Post-list-iteam">
                                                    <li>We actually “listen” to our employees!</li>
                                                    <li>Our managers recruit and retain the very best…it’s what we do
                                                    </li>
                                                    <li>We put the “you” back in “team”</li>
                                                </ul>
                                                <div class="more-btn"><a href="carrer_details.html">View details</a>
                                                </div>
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
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {
        $('#datepicker').datepicker({
            format: "dd-mm-yyyy"
        });

    });
</script>
