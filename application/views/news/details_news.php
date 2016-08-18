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
            <div
                class="contain-body about-section what-we-do overview-section lates-news-section news-section-details clearfix">
                <div class="contain-left">
                    <div class="col-xs-12 col-sm-7 col-md-8">
                        <h2>Lates News</h2>
                        <div class="divied"></div>
                        <div class="contain">
                            <div class="news-area wow animated slideInLeft">
                                <div class="new-iteam">
                                    <div class="news-thumb">
                                        <img width="738"
                                             src="<?php echo base_url(); ?>uploaded/news_image/<?php echo $single_active_news['news_image']; ?>"
                                             alt="<?php echo $single_active_news['news_image']; ?>"/>
                                    </div>
                                    <div class="news-contain career-post-list">
                                        <h4><?php echo $single_active_news['news_title']; ?></h4>
                                        <?php echo $single_active_news['news_details']; ?>
                                        <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                             Lorem Ipsum has been the industry's standard dummy text ever since the
                                             1500s, when an unknown printer took a galley of type and scrambled it to
                                             make a type specimen book. It has survived not only five centuries, but also
                                             the leap into electronic typesetting</p>
                                         <p>Let’s start out with the innovation giants over at Apple. For their
                                             recruitment ad here, they take an obvious stab at a rival company. It’s
                                             controversial enough to entice applicants, yet witty enough to be considered
                                             tasteful.</p>
                                         <ul class="Post-list-iteam">
                                             <li>We actually “listen” to our employees!</li>
                                             <li>Our managers recruit and retain the very best…it’s what we do</li>
                                             <li>We put the “you” back in “team”</li>
                                         </ul>
                                         <h5>Your company will benefit from our performance-driven culture.</h5>
                                         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                             Lorem Ipsum has been the industry's standard dummy text ever since the
                                             1500s, when an unknown printer took a galley of type and scrambled it to
                                             make a type specimen book. It has survived not only five centuries, but also
                                             the leap into electronic typesetting, remaining essentially unchanged. It
                                             was popularised in the 1960s with the release of Letraset sheets containing
                                             Lorem Ipsum passages, and more recently with desktop publishing
                                             software.</p>
                                         <ul>
                                             <li><a href="#">Softwear Development</a></li>
                                             <li><a href="#">Web Develpoment Multi Framework</a></li>
                                             <li><a href="#">Branding &amp; Graphics</a></li>
                                             <li><a href="#">Domain Hosting</a></li>
                                             <li><a href="#">Back office processing</a></li>
                                         </ul>
                                         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                             Lorem Ipsum has been the industry's standard dummy text ever since the
                                             1500s, when an unknown printer took a galley of type and scrambled it to
                                             make a type specimen book. It has survived not only five centuries, but also
                                             the leap into electronic typesetting, remaining essentially unchanged. It
                                             was popularised in the 1960s with the release of Letraset sheets containing
                                             Lorem Ipsum passages, and more recently with desktop publishing
                                             software.</p>
                                         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                             Lorem Ipsum has been the industry's standard dummy text ever since the
                                             1500s, when an unknown printer took a galley of type and scrambled it to
                                             make a type specimen book. It has survived not only five centuries, but also
                                             the leap into electronic typesetting, remaining essentially unchanged. It
                                             was popularised in the 1960s with the release of Letraset sheets containing
                                             Lorem Ipsum passages, and more recently with desktop publishing
                                             software.</p>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contain-right">
                    <div class="col-xs-12 col-sm-5 col-md-4">
                        <div class="contain">
                            <h2>News & Updates</h2>
                            <div class="divied"></div>
                            <div class="news-inner-side news-section news-details wow animated slideInRight animated"
                                 style="visibility: visible; animation-name: slideInRight;">
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

                                <!--<div class="nees-iteam bg-news">
                                    <div class="news-thumb"><a href="#"><img src="images/news_thumb_02.jpg" alt=""></a>
                                    </div>
                                    <div class="contain">
                                        <h3>Subscribe to our email newsletter to receive our news,</h3>
                                        <p>The standard chunk of Lorem Ipsum reproduced below interested.....</p>
                                        <div class="read-btn"><a href="news.html">More News</a></div>
                                    </div>
                                </div>
                                <div class="nees-iteam">
                                    <div class="news-thumb"><a href="#"><img src="images/news_thumb_03.jpg" alt=""></a>
                                    </div>
                                    <div class="contain">
                                        <h3>Subscribe to our email newsletter to receive our news</h3>
                                        <p>The standard chunk of Lorem Ipsum reproduced below interested.....</p>
                                        <div class="read-btn"><a href="news.html">More News</a></div>
                                    </div>
                                </div>
                                <div class="nees-iteam bg-news">
                                    <div class="news-thumb"><a href="#"><img src="images/news_thumb_02.jpg" alt=""></a>
                                    </div>
                                    <div class="contain">
                                        <h3>Subscribe to our email newsletter to receive our news,</h3>
                                        <p>The standard chunk of Lorem Ipsum reproduced below interested.....</p>
                                        <div class="read-btn"><a href="news.html">More News</a></div>
                                    </div>
                                </div>
                                <div class="nees-iteam">
                                    <div class="news-thumb"><a href="#"><img src="images/news_thumb_01.jpg" alt=""></a>
                                    </div>
                                    <div class="contain">
                                        <h3>We are recnt worked goverment</h3>
                                        <p>The standard chunk of Lorem Ipsum reproduced below interested.....</p>
                                        <div class="read-btn"><a href="news.html">More News</a></div>
                                    </div>

                                </div>
                                <div class="nees-iteam bg-news">
                                    <div class="news-thumb"><a href="#"><img src="images/news_thumb_02.jpg" alt=""></a>
                                    </div>
                                    <div class="contain">
                                        <h3>Subscribe to our email newsletter to receive our news,</h3>
                                        <p>The standard chunk of Lorem Ipsum reproduced below interested.....</p>
                                        <div class="read-btn"><a href="news.html">More News</a></div>
                                    </div>

                                </div>
                                <div class="nees-iteam">
                                    <div class="news-thumb"><a href="#"><img src="images/news_thumb_03.jpg" alt=""></a>
                                    </div>
                                    <div class="contain">
                                        <h3>Subscribe to our email newsletter to receive our news</h3>
                                        <p>The standard chunk of Lorem Ipsum reproduced below interested.....</p>
                                        <div class="read-btn"><a href="news.html">More News</a></div>
                                    </div>

                                </div>
                                <div class="nees-iteam bg-news">
                                    <div class="news-thumb"><a href="#"><img src="images/news_thumb_02.jpg" alt=""></a>
                                    </div>
                                    <div class="contain">
                                        <h3>Subscribe to our email newsletter to receive our news,</h3>
                                        <p>The standard chunk of Lorem Ipsum reproduced below interested.....</p>
                                        <div class="read-btn"><a href="news.html">More News</a></div>
                                    </div>

                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

