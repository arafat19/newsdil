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
<div id="promo-five" class="parallax-section">
    <div class="parallax-content">
        <div class="color-overlay"></div>
        <div class="container text-center wow animated bounceIn">
            <div class="col-xs-12 clearfix">
                <h2>Latest <span>News</span></h2>
                <div class="overview_page"><a href="<?php echo base_url(); ?>about-us">Know more about us</a></div>
                <div class="catagories">
                    <ul>
                        <li><a href="<a href="<?php echo base_url(); ?>">Home</a></li>
                        <li>/</li>
                        <li><a href="#" class="active">News</a></li>
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
            <div class="contain-body about-section what-we-do overview-section lates-news-section clearfix">
                <div class="contian-left">
                    <div class="col-xs-12 col-sm-7 col-md-8">
                        <h2><?php echo $title_area_heading_h2; ?></h2>
                        <div class="divied"></div>
                        <div class="contain">
                            <div class="news-area">
                                <?php if (isset($all_active_news) && $all_active_news->num_rows() > 0): ?>
                                    <?php foreach ($all_active_news->result() as $row): ?>
                                        <div class="new-iteam wow animated slideInLeft">
                                            <div class="news-thumb">
                                                <img  width="738"
                                                    src="<?php echo base_url(); ?>uploaded/news_image/<?php echo $row->news_image; ?>"
                                                    alt="<?php echo $row->news_image; ?>"/>
                                            </div>
                                            <div class="news-contain">
                                                <h4><?php echo $row->news_title; ?></h4>
                                                <p><?php echo $row->news_short_description; ?></p>
                                                <div class="more-btn"><a href="<?php echo $row->news_page_url; ?>">Read More</a></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <!--<div class="new-iteam bg-news wow animated slideInLeft">
                                    <div class="news-thumb">
                                        <img src="<?php /*echo base_url();*/?>images/news_iteam_02.jpg">
                                    </div>
                                    <div class="news-contain">
                                        <h4>We have the best people managers on the planet in the worrld...</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</p>
                                        <div class="more-btn"> <a href="news_details.html">More News</a> </div>
                                    </div>
                                </div>-->
                                <!--<div class="new-iteam wow animated slideInLeft">
                                    <div class="news-thumb">
                                        <img src="images/news_iteam_03.jpg">
                                    </div>
                                    <div class="news-contain">
                                        <h4>We have the best people managers on the planet in the worrld...</h4>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</p>
                                        <div class="more-btn"> <a href="news_details.html">More News</a> </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contain-right">
                    <div class="col-xs-12 col-sm-5 col-md-4">
                        <div class="contain">
                            <div class="our-vission-section wow animated slideInUp">
                                <h2>Our Vission</h2>
                                <ul>
                                    <li>Build relationships</li>
                                    <li>Be a vital sourcing asset</li>
                                    <li>Help guide client growth and stability in the global marketplace.</li>
                                    <li>Maintain strong workplace standards and opportunities for our employees.</li>
                                    <li>Be a vital sourcing asset</li>
                                </ul>
                            </div>
                            <div class="service-list">

                                <h4>Other Services</h4>
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
                            </div>
                            <div class="ad-div wow animated bounceIn">
                                <h2>300x250</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

