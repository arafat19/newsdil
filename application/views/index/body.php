<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<script language="JavaScript">
    $(function() {
        // Find all YouTube and Vimeo videos
        var $allVideos = $("iframe[src*='www.youtube.com'], iframe[src*='player.vimeo.com']");

        // Figure out and save aspect ratio for each video
        $allVideos.each(function() {
            $(this)
                .data('aspectRatio', this.height / this.width)
                // and remove the hard coded width/height
                .removeAttr('height')
                .removeAttr('width');
        });

        // When the window is resized
        $(window).resize(function() {
            // Resize all videos according to their own aspect ratio
            $allVideos.each(function() {
                var $el = $(this);
                // Get parent width of this video
                var newWidth = $el.parent().width();
                $el
                    .width(newWidth)
                    .height(newWidth * $el.data('aspectRatio'));
            });

            // Kick off one resize to fix all videos on page load
        }).resize();
    });
</script>
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
        <div class="banner-intro">
            <div class="container">
                <div class="row">
                    <div class="intro-body-area wow animated slideInUp clearfix">
                        <div class="col-xs-12">
                            <h1><?php echo $all_system_configuration_ui['top_heading1']; ?></h1>

                            <h2><?php echo $all_system_configuration_ui['top_heading2']; ?></h2>

                            <div class="read-btn"><a href="<?php echo base_url(); ?>about-us">Read More</a></div>
                        </div>
                    </div>
                    <?php if (isset($all_services) && $all_services->num_rows() > 0): ?>
                        <div id="services-list" class="wow animated slideInUp">
                            <!--All the service come from DB using Main_ui_model-->
                            <?php
                            foreach ($all_services->result() as $row):
                                echo $row->total_description_div;
                            endforeach; ?>

                            <!--All the service come from DB using Main_ui_model-->
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="choos" class="top-gape">
    <div class="container">
        <div class="row">
            <div class="titel-area  wow animated slideInDown clearfix">
                <div class="col-lg-12">
                    <h2>What we do</h2>

                    <div class="divied"></div>
                </div>
            </div>
            <div class="contain-body about-section clearfix">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="about-thumb wow animated slideInLeft"><img
                            src="<?php echo base_url(); ?>images/about_thumb.jpg" alt="About">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8">
                    <div class="contain wow animated slideInRight">
                        <h5>SDIL is a premier business process outsourcing company that began in 2006. We have offices
                            in the U.S. and Bangladesh. Because we commit to our clients’ success, we grow consistently
                            each year. We are a unique company that provides quantifiable and sustainable value to our
                            clients. We do things differently.</h5>
                        <ul>
                            <?php if (isset($all_services) && $all_services->num_rows() > 0):
                                foreach ($all_services->result() as $row):
                                    echo "<li><a href='$row->service_page_url'><i class='fa fa-check'></i>" . $row->service_name . "</a></li>";
                                endforeach;
                            endif; ?>
                            <!-- <li><a href="javascript:MyPopFunction();"><i class="fa fa-check"></i>Softwear
                                     Development</a></li>
                             <li><a href="javascript:MyPopFunction();"><i class="fa fa-check"></i>Web Develpoment Multi
                                     Framework</a></li>
                             <li><a href="javascript:MyPopFunction();"><i class="fa fa-check"></i>Branding & Graphics</a>
                             </li>
                             <li><a href="javascript:MyPopFunction();"><i class="fa fa-check"></i>Digital Advertising
                                     Operations</a></li>
                             <li><a href="javascript:MyPopFunction();"><i class="fa fa-check"></i>Domain Hosting</a></li>
                             <li><a href="javascript:MyPopFunction();"><i class="fa fa-check"></i>Back office processing</a>
                             </li>-->
                        </ul>
                        <div class="read-btn"><a href="<?= base_url() ?>about-us">Read more</a></div>
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
            <div class="titel-area wow animated slideInDown clearfix">
                <div class="col-lg-12">
                    <h2>why choose us</h2>

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
                        <div class="contain wow animated slideInLeft">
                            <h5>We offer a Full Range of Digital Marketing Services !</h5>

                            <div class="bottom-Line"></div>
                            <p>Digital advertising operations demand that considerable amounts of time be spent in back
                                office functions. While those operations are vital to producing and optimizing
                                successful campaigns, they also absorb valuable time that could be spent on more
                                proactive, strategic, or revenue-generating tasks.</p>
                            <ul>
                                <li><a href=""><i class="fa fa-line-chart"></i>We deliver top
                                        ranking</a></li>
                                <li><a href=""><i class="fa fa-bullhorn"></i>High customer
                                        retention rate</a></li>
                                <li><a href=""><i class="fa fa-paper-plane"></i>We always
                                        return e-mails and calls within One business day</a></li>
                                <li><a href=""><i class="fa fa-usd"></i>Affordable pricing
                                        offers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="choose-us-thumb wow animated zoomIn"><img
                                src="<?php echo base_url(); ?>images/why_choose_thumb.jpg"
                                alt="About"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Recen Work Section -->
<section id="work" class="top-gape">
    <div class="container">
        <div class="row">
            <div class="titel-area wow animated slideInDown clearfix">
                <div class="col-lg-12">
                    <h2>Recent work</h2>

                    <div class="divied"></div>
                </div>
            </div>
            <div class="contain-body recent-work-section clearfix">
                <div class="portfolio-section title sub-title clearfix">
                    <div id="portfolio">
                        <div class="row text-center wow animated slideInDown">
                            <div class="col-md-12" id="isotope-filter">
                                <a data-filter="*" href="#" class="btn btn-sm btn-outline btn-primary active">All</a>
                                <?php if (isset($active_project_category) && $active_project_category->num_rows() > 0):
                                    foreach ($active_project_category->result() as $row): ?>
                                        <a data-filter=".<?php echo $row->project_category_code; ?>" href="#"
                                           class="btn btn-primary btn-sm btn-outline"><?php echo $row->project_category_name; ?></a>
                                        <?php
                                    endforeach;
                                endif; ?>
                                <!-- <a data-filter=".megento" href="#" class="btn btn-sm btn-outline btn-primary">Megento</a>
                                 <a data-filter=".drupal" href="#" class="btn btn-sm btn-outline btn-primary">Drupal</a>
                                 <a data-filter=".html" href="#" class="btn btn-sm btn-outline btn-primary">HTML & CSS</a>-->
                            </div>
                        </div>
                        <div id="isotope" class="wow animated fadeInUp clearfix">
                            <?php if (isset($active_projects) && $active_projects->num_rows() > 0):
                                foreach ($active_projects->result() as $row): ?>
                                    <div class="col-xs-12 col-sm-6 col-md-3 <?php echo $row->project_category_code; ?>">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-buttons">
                                                <div class="portfolio-containarea">
                                                    <h3><?php echo $row->project_title; ?></h3>

                                                    <p><?php echo substr($row->project_description, 0, 25); ?>...</p>
                                                </div>
                                                <!-- <a href="javascript:MyPopFunction();" target="_blank">View Project</a> <a data-pp="prettyPhoto[portfolio]" href="images/work_01.jpg" title=""><span class="fa fa-eye"></span></a> -->
                                                <a href="<?php echo $row->project_internal_link; ?>">View Project</a> <a
                                                    data-pp="prettyPhoto[portfolio]"
                                                    href="<?php echo base_url(); ?>uploaded/projects/<?php echo $row->project_image; ?>"
                                                    title="<?php echo $row->project_title; ?>"><span
                                                        class="fa fa-eye"></span></a></div>
                                        </div>
                                        <div class="img-thumb"><img
                                                src="<?php echo base_url(); ?>uploaded/projects/<?php echo $row->project_image; ?>"
                                                alt="<?php echo $row->project_title; ?>"></div>
                                    </div>
                                    <?php
                                endforeach;
                            endif; ?>


                            <!--<div class="col-xs-12 col-sm-6 col-md-3 megento">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-buttons">
                                        <div class="portfolio-containarea">
                                            <h3>Rabiul Biplob</h3>

                                            <p>Aenean commodo ligula eget dolor. Aenean massa.</p>
                                        </div>
                                        <a href="javascript:MyPopFunction();">View Project</a> <a
                                            data-pp="prettyPhoto[portfolio]"
                                            href="<?php /*echo base_url(); */ ?>images/work_02.jpg" title=""><span
                                                class="fa fa-eye"></span></a></div>
                                </div>
                                <div class="img-thumb"><img src="<?php /*echo base_url(); */ ?>images/work_02.jpg"
                                                            alt="work"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 drupal">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-buttons">
                                        <div class="portfolio-containarea">
                                            <h3>Rabiul Biplob</h3>

                                            <p>Aenean commodo ligula eget dolor. Aenean massa.</p>
                                        </div>
                                        <a href="javascript:MyPopFunction();">View Project</a> <a
                                            data-pp="prettyPhoto[portfolio]"
                                            href="<?php /*echo base_url(); */ ?>images/work_03.jpg" title=""><span
                                                class="fa fa-eye"></span></a></div>
                                </div>
                                <div class="img-thumb"><img src="<?php /*echo base_url(); */ ?>images/work_03.jpg"
                                                            alt="work"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 html">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-buttons">
                                        <div class="portfolio-containarea">
                                            <h3>Rabiul Biplob</h3>

                                            <p>Aenean commodo ligula eget dolor. Aenean massa.</p>
                                        </div>
                                        <a href="javascript:MyPopFunction();">View Project</a> <a
                                            data-pp="prettyPhoto[portfolio]"
                                            href="<?php /*echo base_url(); */ ?>images/work_04.jpg" title=""><span
                                                class="fa fa-eye"></span></a></div>
                                </div>
                                <div class="img-thumb"><img src="<?php /*echo base_url(); */ ?>images/work_04.jpg"
                                                            alt="work"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 wordpress">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-buttons">
                                        <div class="portfolio-containarea">
                                            <h3>Rabiul Biplob</h3>

                                            <p>Aenean commodo ligula eget dolor. Aenean massa.</p>
                                        </div>
                                        <a href="javascript:MyPopFunction();">View Project</a> <a
                                            data-pp="prettyPhoto[portfolio]"
                                            href="<?php /*echo base_url(); */ ?>images/work_05.jpg" title=""><span
                                                class="fa fa-eye"></span></a></div>
                                </div>
                                <div class="img-thumb"><img src="<?php /*echo base_url(); */ ?>images/work_05.jpg"
                                                            alt="work"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 megento">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-buttons">
                                        <div class="portfolio-containarea">
                                            <h3>Rabiul Biplob</h3>

                                            <p>Aenean commodo ligula eget dolor. Aenean massa.</p>
                                        </div>
                                        <a href="javascript:MyPopFunction();">View Project</a> <a
                                            data-pp="prettyPhoto[portfolio]"
                                            href="<?php /*echo base_url(); */ ?>images/work_01.jpg" title=""><span
                                                class="fa fa-eye"></span></a></div>
                                </div>
                                <div class="img-thumb"><img src="images/work_01.jpg" alt="work"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 drupal">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-buttons">
                                        <div class="portfolio-containarea">
                                            <h3>Rabiul Biplob</h3>

                                            <p>Aenean commodo ligula eget dolor. Aenean massa.</p>
                                        </div>
                                        <a href="javascript:MyPopFunction();">View Project</a> <a
                                            data-pp="prettyPhoto[portfolio]"
                                            href="<?php /*echo base_url(); */ ?>images/work_02.jpg" title=""><span
                                                class="fa fa-eye"></span></a></div>
                                </div>
                                <div class="img-thumb"><img src="<?php /*echo base_url(); */ ?>images/work_02.jpg"
                                                            alt="work"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 html">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-buttons">
                                        <div class="portfolio-containarea">
                                            <h3>Rabiul Biplob</h3>

                                            <p>Aenean commodo ligula eget dolor. Aenean massa.</p>
                                        </div>
                                        <a href="javascript:MyPopFunction();">View Project</a> <a
                                            data-pp="prettyPhoto[portfolio]"
                                            href="<?php /*echo base_url(); */ ?>images/work_08.jpg" title=""><span
                                                class="fa fa-eye"></span></a></div>
                                </div>
                                <div class="img-thumb"><img src="<?php /*echo base_url(); */ ?>images/work_08.jpg"
                                                            alt="work"></div>
                            </div>-->
                            <!-- END ISOTOPE SCRIPT -->
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-xs-12">
                <div class="more-btn"><a href="javascript:MyPopFunction();">More News</a></div>
            </div>-->
        </div>
    </div>
</section>
<!-- Counter Section -->
<section id="counter" class="top-gape">
    <div class="container">
        <div class="row">
            <div class="titel-area wow animated slideInDown clearfix">
                <div class="col-lg-12">
                    <h2>Our Current Status</h2>

                    <div class="divied"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="full-width-iteam">
        <div class="container">
            <div class="row">
                <div class="contain-body counter-section clearfix">
                    <div class="col-xs-6 col-sm-3 col-md-3 text-center">
                        <h4 class="color-white uppercase weight-600">Cups of Coffee</h4>

                        <div class="counter" data-end-count="211" data-speed="2500">0</div>
                        <div class="up-triangle"></div>
                        <div class="divied"></div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3 text-center">
                        <h4 class="color-white uppercase weight-600">Facebook Like</h4>

                        <div class="counter" data-end-count="733" data-speed="2500">0</div>
                        <div class="up-triangle"></div>
                        <div class="divied"></div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3 text-center">
                        <h4 class="color-white uppercase weight-600">Project Delevered</h4>

                        <div class="counter" data-end-count="1200" data-speed="2500">0</div>
                        <div class="up-triangle"></div>
                        <div class="divied"></div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3 text-center">
                        <h4 class="color-white uppercase weight-600">Winning Awards</h4>

                        <div class="counter" data-end-count="175" data-speed="2500">0</div>
                        <div class="up-triangle"></div>
                        <div class="divied"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Team Section -->
<?php if (isset($active_team_members) && $active_team_members->num_rows() > 0): ?>
    <section class="top-gape">
        <div class="container">
            <div class="row">
                <div class="titel-area wow animated slideInDown clearfix">
                    <div class="col-lg-12">
                        <h2>Meet our Team</h2>

                        <div class="divied"></div>
                    </div>
                </div>
                <div class="contain-body team-section clearfix">
                    <div id="team-list" class="wow animated zoomInUp">
                        <?php
                        foreach ($active_team_members->result() as $row): ?>
                            <div class="iteam">
                                <h4><span><?php echo $row->first_name; ?></span><?php echo " " . $row->last_name; ?>
                                </h4>

                                <div class="team-thumb"><img height="167" width="167"
                                                             src="<?php echo base_url(); ?>uploaded/admin/<?php echo $row->personal_image ? $row->personal_image : 'blank_person.png'; ?>"
                                                             alt="<?php echo $row->personal_image; ?>"></div>
                                <div class="contain">
                                    <h5><?php echo $row->designation; ?></h5>

                                    <div class="divied"></div>
                                    <p><?php echo $row->member_description; ?></p>

                                    <ul class="social-link">
                                        <li><a href="<?php echo $row->facebook_link; ?>"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="<?php echo $row->twitter_link; ?>"><i
                                                    class="fa fa-twitter"></i></a></li>
                                        <li><a href="<?php echo $row->linkedin_link; ?>"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li><a href="<?php echo $row->googleplus_link; ?>"><i
                                                    class="fa fa-google-plus"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                        endforeach; ?>


                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- Lates News Section -->
<section id="news" class="top-gape">
    <div class="container">
        <div class="row">
            <div class="titel-area wow animated slideInDown clearfix">
                <div class="col-lg-12">
                    <h2>Latest News</h2>

                    <div class="divied"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="full-width-iteam">
        <div class="container">
            <div class="row">
                <div class="contain-body news-section wow animated slideInLeft clearfix">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <?php if (isset($all_active_news) && $all_active_news->num_rows() > 0): ?>
                            <?php foreach ($all_active_news->result() as $row): ?>
                                <div class="nees-iteam">
                                    <div class="news-thumb">
                                        <a href="<?php echo $row->news_page_url; ?>">
                                            <img style="width: 100px; height: 98px"
                                                src="<?php echo base_url(); ?>uploaded/news_image/<?php echo $row->news_image; ?>"
                                                alt="<?php echo $row->news_image; ?>"/>
                                        </a>
                                        <div class="read-btn"><a href="<?php echo $row->news_page_url; ?>">Read
                                                More</a></div>
                                    </div>
                                    <div class="contain">
                                        <h3><?php echo $row->news_title; ?></h3>
                                        <p><?php echo substr($row->news_short_description, 0, 64); ?>...</p>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <!--<div class="nees-iteam">
                            <div class="news-thumb"><a href="#"><img
                                        src="<?php /*echo base_url(); */ ?>images/news_thumb_01.jpg" alt="thumb"></a>

                                <div class="read-btn"><a href="#">More News</a></div>
                            </div>
                            <div class="contain">
                                <h3>We are recnt worked goverment site</h3>

                                <p>Coming Soon...</p>
                            </div>
                        </div>
                        <div class="nees-iteam">
                            <div class="news-thumb"><a href="#"><img
                                        src="<?php /*echo base_url(); */ ?>images/news_thumb_02.jpg" alt="thumb"></a>

                                <div class="read-btn"><a href="#">More News</a></div>
                            </div>
                            <div class="contain">
                                <h3>We are recnt worked goverment site</h3>

                                <p>Coming Soon...</p>
                            </div>
                        </div>
                        <div class="nees-iteam">
                            <div class="news-thumb"><a href="#"><img
                                        src="<?php /*echo base_url(); */ ?>images/news_thumb_03.jpg" alt="thumb"></a>

                                <div class="read-btn"><a href="#">More News</a></div>
                            </div>
                            <div class="contain">
                                <h3>We are recnt worked goverment site</h3>

                                <p>Coming Soon...</p>
                            </div>
                        </div>-->
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="video-area wow animated slideInRight">
                          <!--<img src="--><?php //echo base_url(); ?><!--images/video.jpg" alt="thumb">-->
                            <iframe width="420" height="315" src="https://www.youtube.com/embed/eiXS9dyItnY" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="more-btn"><a href="<?php echo base_url(); ?>news">More News</a></div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section -->
<?php if (isset($active_testimonials) && $active_testimonials->num_rows() > 0): ?>
    <section id="testimonial" class="top-gape">
        <div class="container">
            <div class="row">
                <div class="titel-area wow animated slideInDown clearfix">
                    <div class="col-lg-12">
                        <h2>Testimonial</h2>

                        <div class="divied"></div>
                    </div>
                </div>
                <div class="contain-body testimonial-section wow animated fadeInUp clearfix">
                    <div id="testimonial-list">
                        <?php
                        foreach ($active_testimonials->result() as $row): ?>
                            <div class="iteam">
                                <div class="testimonial-thumb"><i class="fa fa-quote-right"></i></div>
                                <div class="contain">
                                    <p>" <?php echo $row->testimonial_description; ?> "</p>

                                    <div class="testimonial-commented-by">
                                        <div class="front-divided"></div>
                                        <?php echo $row->commented_by; ?>
                                        <!--<div class="back-divided"></div>-->
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach; ?>

                    </div>
                    <!-- <div class="iteam">
                         <div class="testimonial-thumb"><i class="fa fa-quote-right"></i></div>
                         <div class="contain">
                             <p>" There are many variations of passages of Lorem Ipsum available, but the majority have
                                 suffered alteration in some form, by injected humour, or randomised words which don't
                                 look even slightly believable. If you are going to use a passage of Lorem Ipsum "</p>

                             <div class="more-btn"><a href="#">Read more</a></div>
                         </div>
                     </div>
                     <div class="iteam">
                         <div class="testimonial-thumb"><i class="fa fa-quote-right"></i></div>
                         <div class="contain">
                             <p>" There are many variations of passages of Lorem Ipsum available, but the majority have
                                 suffered alteration in some form, by injected humour, or randomised words which don't
                                 look even slightly believable. If you are going to use a passage of Lorem Ipsum "</p>

                             <div class="more-btn"><a href="#">Read more</a></div>
                         </div>
                     </div>
                     <div class="iteam">
                         <div class="testimonial-thumb"><i class="fa fa-quote-right"></i></div>
                         <div class="contain">
                             <p>" There are many variations of passages of Lorem Ipsum available, but the majority have
                                 suffered alteration in some form, by injected humour, or randomised words which don't
                                 look even slightly believable. If you are going to use a passage of Lorem Ipsum "</p>

                             <div class="more-btn"><a href="#"  >Read more</a></div>
                         </div>
                     </div>-->
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- Patner Section -->
<?php if (isset($active_partners) && $active_partners->num_rows() > 0): ?>
<section id="patner" class="top-gape">
    <div class="container">
        <div class="row">
            <div class="titel-area wow animated slideInDown clearfix">
                <div class="col-lg-12">
                    <h2>Partners</h2>

                    <div class="divied"></div>
                </div>
            </div>
            <div class="contain-body patner-section wow animated fadeInUp clearfix">
                <div class="patner-list">
                    <ul>
                        <?php
                        foreach ($active_partners->result() as $row): ?>
                            <li>
                                <!--<a href="<?php /*echo $row->partner_external_link; */ ?>" target="_blank">-->
                                <img
                                    src="<?php echo base_url(); ?>uploaded/partners/<?php echo $row->partner_image; ?>"
                                    alt="<?php echo $row->partner_name; ?>"
                                    title="<?php echo $row->partner_name; ?>">
                                <!--</a>-->
                            </li>
                            <?php
                        endforeach; ?>

                    </ul>
                    <!--

                    <ul>
                        <li><a href="#"><img src="<?php /*echo base_url(); */ ?>images/patners_01.png" alt="partner"></a>
                        </li>
                        <li><a href="#"><img src="<?php /*echo base_url(); */ ?>images/patners_02.png" alt="partner"></a>
                        </li>
                        <li><a href="#"><img src="<?php /*echo base_url(); */ ?>images/patners_03.png" alt="partner"></a>
                        </li>
                        <li><a href="#"><img src="<?php /*echo base_url(); */ ?>images/patners_04.png" alt="partner"></a>
                        </li>
                        <li><a href="#"><img src="<?php /*echo base_url(); */ ?>images/patners_05.png" alt="partner"></a>
                        </li>
                    </ul>-->
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>