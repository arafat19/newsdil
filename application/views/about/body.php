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
<div id="promo-two" class="parallax-section">
    <div class="parallax-content">
        <div class="color-overlay"></div>
        <div class="container text-center wow animated bounceIn">
            <div class="col-xs-12 clearfix">
                <h2>About <span>us</span></h2>
                <div class="overview_page"><a href="<?php echo base_url(); ?>career">JOIN US OUR CARRER</a></div>
                <div class="catagories">
                    <ul>
                        <li><a href="">About us</a></li>
                        <li>/</li>
                        <li><a href="" class="active">Company Overview</a></li>
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
            <div class="contain-body about-section what-we-do overview-section clearfix">
                <div class="contain-left wow animated fadeInLeft">
                    <div class="col-xs-12 col-sm-7 col-md-8">
                        <h2><?php echo $title_area_heading_h2; ?></h2>
                        <div class="divied"></div>
                        <div class="contain">
                            <?php echo $company_overviews['company_overview']; ?>
                        </div>
                    </div>
                </div>
                <div class="contain-right wow animated">
                    <div class="col-xs-12 col-sm-5 col-md-4">
                        <div class="contain">
                            <div class="our-vission-section wow animated slideInRight">
                                <h2>Our Vision</h2>
                                <ul>
                                    <li>Build relationships</li>
                                    <li>Be a vital sourcing asset</li>
                                    <li>Help guide client growth and stability in the global marketplace.</li>
                                    <li>Maintain strong workplace standards and opportunities for our employees.</li>
                                    <li>Be a vital sourcing asset</li>
                                </ul>
                            </div>
                            <div class="service-list">

                                <h4>Our Services</h4>
                                <?php
                                if (isset($all_services) && $all_services->num_rows() > 0):
                                    $gray_bg = 0;
                                    foreach ($all_services->result() as $row):
                                        ?>
                                        <div
                                            class="service-iteam <?php if ($gray_bg % 2 == 0) echo "gray-bg"; ?> wow animated slideInRight">
                                            <a href="<?php echo $row->service_page_url; ?>">
                                                <div class="circle">
                                                    <i class="<?php echo $row->icon_class_name; ?>"></i>
                                                </div>
                                                <h5><?php echo $row->service_name; ?></h5>
                                            </a>
                                        </div>
                                        <?php
                                        $gray_bg++;
                                    endforeach;
                                endif; ?>
                                <!--<div class="service-iteam wow animated slideInRight">
                                    <a href="back_office_processing.html">
                                        <div class="circle">
                                            <i class="icon-award"></i>
                                        </div>
                                        <h5>Digital Advertising Operations</h5>
                                    </a>
                                </div>
                                <div class="service-iteam gray-bg wow animated slideInRight">
                                    <a href="web_development.html">
                                        <div class="circle">
                                            <i class="icon-desktop"></i>
                                        </div>
                                        <h5>Web & Software Development</h5>
                                    </a>
                                </div>
                                <div class="service-iteam wow animated slideInRight">
                                    <a href="domain_hosting.html">
                                        <div class="circle">
                                            <i class="fa fa-rocket" aria-hidden="true"></i>

                                        </div>
                                        <h5>Domain Hosting</h5>
                                    </a>
                                </div>

                                <div class="service-iteam gray-bg wow animated slideInRight">
                                    <div class="circle">
                                        <i class="icon-reply"></i>
                                    </div>
                                    <h5>Back office Processing</h5>
                                </div>-->
                            </div>
                            <div class="ad-div wow animated zoomIn">
                                <h2>300x250</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

