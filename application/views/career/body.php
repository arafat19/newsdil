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
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="contain">
                            <h5>We are Hiring</h5>

                            <div class="bottom-Line"></div>
                            <p>Shwapnoduar IT Ltd. invites you into a good career path. Now we are
                                hiring for the follwing positions.</p>
                            <ul>
                                <?php if (isset($all_active_jobs) && $all_active_jobs->num_rows() > 0):
                                    foreach ($all_active_jobs->result() as $row): ?>
                                        <li>
                                            <a href="<?php echo $row->job_page_url; ?>"><i class="fa fa-list"></i>
                                                <?php echo $row->job_title; ?>
                                            </a>
                                        </li>
                                    <?php endforeach;
                                endif; ?>
                                <!--<li><a href="javascript:MyPopFunction();"><i class="fa fa-line-chart"></i>We deliver top
                                        ranking</a></li>
                                <li><a href="javascript:MyPopFunction();"><i class="fa fa-bullhorn"></i>High customer
                                        retention rate</a></li>
                                <li><a href="javascript:MyPopFunction();"><i class="fa fa-paper-plane"></i>We always
                                        return e-mails and calls within one business day</a></li>
                                <li><a href="javascript:MyPopFunction();"><i class="fa fa-usd"></i>Afordable pricing
                                        offers</a></li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="choose-us-thumb"><img src="<?php echo base_url(); ?>images/why_choose_thumb.jpg"
                                                          alt="About"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
