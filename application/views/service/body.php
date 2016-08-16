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
                        <div class="logo wow animated  bounceIn clearfix"><a href="<?php echo base_url(); ?>"
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
<div id="promo-one" class="parallax-section">
    <div class="parallax-content">
        <div class="color-overlay"></div>
        <div class="container text-center wow animated bounceIn">
            <div class="col-xs-12 clearfix">
                <h2>what <span>we do</span></h2>
                <div class="overview_page"><a href="<?php echo base_url();?>about-us">KNOW MORE ABOUT US</a></div>
                <div class="catagories">
                    <ul>
                        <li><a href="">What we do</a></li>
                        <li>/</li>
                        <li><a href="" class="active">Back Office Processing</a></li>
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
            <div class="contain-body about-section what-we-do clearfix">
                <div class="contain-left wow animated fadeInLeft">
                    <div class="col-xs-12 col-sm-7 col-md-8">
                        <h2><?php echo $title_area_heading_h2; ?></h2>
                        <div class="divied"></div>
                        <div class="contain">
                            <?php echo $active_service_page['service_page_description']; ?>
                            <!--<h3>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it .</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <ul>
                                <li><a href="#"><i class="fa fa-check"></i>Softwear Development</a></li>
                                <li><a href="#"><i class="fa fa-check"></i>Web Develpoment Multi Framework</a></li>
                                <li><a href="#"><i class="fa fa-check"></i>Branding & Graphics</a></li>
                                <li><a href="#"><i class="fa fa-check"></i>Domain Hosting</a></li>
                                <li><a href="#"><i class="fa fa-check"></i>Back office processing</a></li>
                            </ul>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                             dummy text ever since the 1500s, when
                             and more recently with desktop publishing software like Aldus PageMaker
                              including versions of Lorem Ipsum when an unknown printer took a galley of type
                              and scrambled it to make a type specimen book. It has survived not only five
                              centuries, but also the leap into electronic typesetting, remaining essentially Lorem Ipsum
                              is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                               the industry's standard dummy text ever since the 1500s Lorem Ipsum is simply dummy
                               text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>-->
                        </div>
                    </div>
                </div>
                <div class="contain-right">
                    <div class="col-xs-12 col-sm-5 col-md-4">
                        <div class="contain">
                            <div class="service-list">

                                <h4>Other Services</h4>
                                <?php
                                if (isset($all_services) && $all_services->num_rows() > 0):
                                    $gray_bg = 0;
                                    foreach ($all_services->result() as $row):
                                        if ($title_area_heading_h2 != $row->service_name) {
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
                                        }

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
