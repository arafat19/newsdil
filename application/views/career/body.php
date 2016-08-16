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
                        <div class="logo wow animated  bounceInclearfix"><a href="<?php echo base_url(); ?>"
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
                <div class="overview_page"><a href="<?php echo base_url(); ?>about-us">KNOW MORE ABOUT US</a></div>
                <div class="catagories">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>about-us">About us</a></li>
                        <li>/</li>
                        <li><a href="" class="active">Carrer</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="inner-page" class="top-gape-inner">
    <div class="container">
        <div class="row">
            <div class="contain-body about-section what-we-do carrer-section clearfix">
                <div class="contain-left">
                    <div class="col-xs-12 col-sm-7 col-md-8">
                        <h2><?php echo $title_area_heading_h2; ?></h2>
                        <div class="divied"></div>
                        <div class="contain">
                            <h3>Do your life’s best work here.
                                With the whole world watching.</h3>
                            <p>The people here at SDIL don’t just create products — they create the kind of wonder
                                that’s revolutionized entire industries. It’s the diversity of those people and their
                                ideas that inspires the innovation that runs through everything we do, from amazing
                                technology to industry-leading environmental efforts. Join SDIL, and help us leave the
                                world better than we found it.</p>
                            <p>Where do you see yourself at SDIL?</p>
                            <div class="carrer-section-area">
                                <ul>
                                    <?php
                                    $animations = array("slideInUp", "bounceIn", "slideInLeft");

                                    if (isset($all_active_jobs) && $all_active_jobs->num_rows() > 0):
                                        foreach ($all_active_jobs->result() as $row):
                                            $random_number = rand(0, 2);
                                            $jad = new DateTime();
                                            $formatted_date = $jad->createFromFormat("d/m/Y", $row->job_application_deadline);
                                            ?>
                                            <li class="wow animated <?php echo $animations[$random_number]; ?>">
                                                <div class="career-post-list">
                                                    <h4><i aria-hidden="true"
                                                           class="fa fa-user"></i><?php echo $row->job_title; ?></h4>
                                                    <p><?php echo $row->job_short_description; ?></p>
                                                    <ul class="Post-list-iteam">
                                                        <li>Experience: <?php echo $row->job_experience; ?></li>
                                                        <li>Job Application
                                                            Deadline: <?php echo $formatted_date->format('M d, Y'); ?></li>
                                                    </ul>
                                                    <div class="more-btn"><a href="<?php echo $row->job_page_url; ?>">View
                                                            details</a></div>
                                                </div>
                                            </li>
                                        <?php endforeach;
                                    endif; ?>

                                    <!--<li class="wow animated bounceIn">
                                        <div class="career-post-list">
                                            <h4><i aria-hidden="true" class="fa fa-user"></i>Project Manager</h4>
                                            <p>Let’s start out with the innovation giants over at Apple. For their
                                                recruitment ad here, they take an obvious stab at a rival company. It’s
                                                controversial enough to entice applicants, yet witty enough to be
                                                considered tasteful.</p>
                                            <ul class="Post-list-iteam">
                                                <li>We actually “listen” to our employees!</li>
                                                <li>Our managers recruit and retain the very best…it’s what we do</li>
                                                <li>We put the “you” back in “team”</li>
                                            </ul>
                                            <div class="more-btn"><a href="carrer_details.html">View details</a></div>
                                        </div>
                                    </li>
                                    <li class="wow animated bounceIn">
                                        <div class="career-post-list">
                                            <h4><i aria-hidden="true" class="fa fa-user"></i>Project Manager</h4>
                                            <p>Let’s start out with the innovation giants over at Apple. For their
                                                recruitment ad here, they take an obvious stab at a rival company. It’s
                                                controversial enough to entice applicants, yet witty enough to be
                                                considered tasteful.</p>
                                            <ul class="Post-list-iteam">
                                                <li>We actually “listen” to our employees!</li>
                                                <li>Our managers recruit and retain the very best…it’s what we do</li>
                                                <li>We put the “you” back in “team”</li>
                                            </ul>
                                            <div class="more-btn"><a href="carrer_details.html">View details</a></div>
                                        </div>
                                    </li>-->
                                </ul>
                            </div>
                            <!--<div class="pagenation">
                                <ul>
                                    <li><a href="#">Prev</a></li>
                                    <li><a href="#" class="active">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="contain-right">
                    <div class="col-xs-12 col-sm-5 col-md-4">
                        <div class="contain">
                            <h2>Recent News</h2>
                            <div class="divied"></div>
                            <div class="news-inner-side news-section wow animated slideInRight">
                                <?php if (isset($all_active_news) && $all_active_news->num_rows() > 0):
                                    $news_bg = 0;
                                    foreach ($all_active_news->result() as $row): ?>
                                        <?php
                                        if ($title_area_heading_h2 != $row->news_title) {
                                            ?>
                                            <div class="nees-iteam <?php if ($news_bg % 2 == 0) echo "bg-news"; ?> ">
                                                <div class="news-thumb">
                                                    <a href="<?php echo $row->news_page_url; ?>">
                                                        <img
                                                            src="<?php echo base_url(); ?>uploaded/news_image/<?php echo $row->news_image; ?>"
                                                            alt="<?php echo $row->news_image; ?>"/>
                                                    </a>
                                                </div>
                                                <div class="contain">
                                                    <h3><?php echo $row->news_title; ?></h3>
                                                    <p><?php echo substr($row->news_short_description, 0, 64); ?></p>
                                                    <div class="read-btn"><a href="<?php echo $row->news_page_url; ?>">Read
                                                            More</a></div>
                                                </div>
                                            </div>
                                            <?php   $news_bg++; } ?>
                                    <?php endforeach;
                                endif; ?>
                            </div>
                            <h2>Testimonial</h2>
                            <div class="divied"></div>
                            <?php if (isset($active_testimonials) && $active_testimonials->num_rows() > 0): ?>
                                <div class="testimonial-inner wow animated slideInUp">
                                    <div class="contain-body testimonial-section clearfix">
                                        <div id="testimonial-list-small1">
                                            <?php foreach ($active_testimonials->result() as $row): ?>
                                            <div class="iteam">
                                                <div class="testimonial-thumb"><i class="fa fa-quote-right"></i></div>
                                                <div class="contain">
                                                    <p>" <?php echo $row->testimonial_description; ?> "</p>
                                                    <h4><?php echo "--- " . $row->commented_by; ?></h4>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <!--<div class="iteam">
                                            <div class="testimonial-thumb"><i class="fa fa-quote-right"></i></div>
                                            <div class="contain">
                                                <p>" There are many variations of passages of Lorem Ipsum available, but
                                                    the majority have suffered alteration in some form, by injected
                                                    humour, or randomised words which don't look even slightly
                                                    believable. If you are going to use a passage of Lorem Ipsum "</p>
                                                <h4>"Smith Jhon"</h4>
                                            </div>
                                        </div>
                                        <div class="iteam">
                                            <div class="testimonial-thumb"><i class="fa fa-quote-right"></i></div>
                                            <div class="contain">
                                                <p>" There are many variations of passages of Lorem Ipsum available, but
                                                    the majority have suffered alteration in some form, by injected
                                                    humour, or randomised words which don't look even slightly
                                                    believable. If you are going to use a passage of Lorem Ipsum "</p>
                                                <h4>"Smith Jhon"</h4>
                                            </div>
                                        </div>
                                        <div class="iteam">
                                            <div class="testimonial-thumb"><i class="fa fa-quote-right"></i></div>
                                            <div class="contain">
                                                <p>" There are many variations of passages of Lorem Ipsum available, but
                                                    the majority have suffered alteration in some form, by injected
                                                    humour, or randomised words which don't look even slightly
                                                    believable. If you are going to use a passage of Lorem Ipsum "</p>
                                                <h4>"Smith Jhon"</h4>
                                            </div>
                                        </div>
                                        <div class="iteam">
                                            <div class="testimonial-thumb"><i class="fa fa-quote-right"></i></div>
                                            <div class="contain">
                                                <p>" There are many variations of passages of Lorem Ipsum available, but
                                                    the majority have suffered alteration in some form, by injected
                                                    humour, or randomised words which don't look even slightly
                                                    believable. If you are going to use a passage of Lorem Ipsum "</p>
                                                <h4>"Smith Jhon"</h4>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>


                        <div class="ad-div wow animated zoomIn">
                            <h2>300x250</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
