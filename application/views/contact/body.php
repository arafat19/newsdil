<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<header>
    <div class="header-section clearfix">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="wsmenucontainer clearfix">
                <div class="wsmenucontent overlapblackbg"></div>
                <div class="wsmenuexpandermain slideRight"><a id="navToggle"
                                                              class="animated-arrow slideLeft"><span></span></a> <a
                        href="#" class="smallogo"><img src="<?php echo base_url(); ?>images/logo.png" width="120"
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
                        <div class="logo clearfix"><a href="<?php echo base_url(); ?>index.html"
                                                      title="Responsive Slide Menus"><img
                                    src="<?php echo base_url(); ?>images/logo.png" alt=""/></a></div>
                    </div>
                    <!-- Navigation -->
                    <?php $this->load->view('index/menu'); ?>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- Intro Section -->
<section id="intro">
    <div class="banner-section">
        <div class="img-overlay"></div>
        <div class="banner-intro">
            <div class="container">
                <div class="row">
                    <div class="intro-body-area clearfix">
                        <div class="col-xs-12">
                            <h1><?php echo $top_heading_h1; ?></h1>

                            <h2><?php echo $top_heading_h2; ?></h2>

                            <div class="read-btn"><a href="">Read More</a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact us Section -->
<section id="choos" class="top-gape">
    <div class="container">
        <div class="row">
            <div class="titel-area clearfix">
                <div class="col-lg-12">
                    <h2><?php echo $title_area_heading_h2; ?></h2>

                    <div class="divied"></div>
                </div>
            </div>
            <div class="contain-body about-section clearfix">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="about-thumb"><img src="<?php echo base_url(); ?>images/contact-us.png" alt="About">
                    </div>
                </div>
                <div class="col-md-8">

                    <h5>Please fill out the form below and our representative will respond to your inquiry within 1
                        - 2 business days.</h5>

                    <div class="row">
                        <?php if (validation_errors()) { ?>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="alert alert-danger" role="alert">
                                        <a href="#" class="close" data-dismiss="alert"
                                           aria-label="close">&times;</a>
                                        <?php echo validation_errors(); ?>

                                    </div>
                                </div>
                            </div>
                        <?php }
                        if ($this->session->flashdata('con_success_msg')) { ?>

                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="alert alert-success" role="alert">
                                        <a href="#" class="close" data-dismiss="alert"
                                           aria-label="close">&times;</a>
                                        <?php echo $this->session->flashdata('con_success_msg'); ?>

                                    </div>
                                </div>
                            </div>
                        <?php }
                        if ($this->session->flashdata('con_failure_msg')) { ?>

                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="alert alert-danger" role="alert">
                                        <a href="#" class="close" data-dismiss="alert"
                                           aria-label="close">&times;</a>
                                        <?php echo $this->session->flashdata('con_failure_msg'); ?>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <form name='contact_us' id='contact_us' enctype="multipart/form-data" class="form-horizontal"
                              method="post">
                            <div class="form-group">
                                <label for="full_name" class="col-sm-2 control-label">Full Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="full_name" name="full_name"
                                           placeholder="Full Name" required autofocus/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email"
                                           id="email" value="ibrahim.arafat@sebpo.com"
                                           pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                           required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="cell_number">Cell Number:</label>

                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" id="cell_number" name="cell_number"
                                           pattern="[0][1-9]{4}[-][0-9]{6}"
                                           placeholder="Mobile Number (Format: 01XXX-XXXXXX)" required=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject" class="col-sm-2 control-label">Subject</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="subject" name="subject"
                                           placeholder="Subject" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-sm-2 control-label">Message</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="4" name="message" id="message"
                                              placeholder="255 Char Max"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="human" name="human"
                                           placeholder="Your Answer" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button id="create" name="create" type="submit" data-role="button"
                                            class="btn btn-warning">Submit
                                    </button>

                                    <button id="clearFormButton" name="clearFormButton" type="reset"
                                            class="btn btn-danger">Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- /.row -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
