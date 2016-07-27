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
                                    src="<?php echo base_url(); ?>images/logo.png" alt=""/></a></div>
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
                            <?php
                            $skill_cat_id = 0;
                            if (isset($active_skills) && $active_skills->num_rows() > 0):

                                foreach ($active_skills->result() as $row):
                                    if ($skill_cat_id != $row->skill_category_id) {
                                        ?>
                                        <h5><?php echo $row->skill_category_name; ?></h5>
                                        <div class="bottom-Line"></div>
                                    <?php }
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-success active"
                                             role="progressbar" aria-valuenow="<?php echo $row->skill_percentage; ?>"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="width: <?php echo $row->skill_percentage; ?>%">
                                            <span class="sr-only"><?php echo $row->skill_percentage; ?>% Complete (success)</span>
                                        </div>
                                        <span class="progress-type"><?php echo $row->skill_name; ?></span>
                                        <span class="progress-completed"><?php echo $row->skill_percentage; ?>%</span>
                                    </div>
                                    <?php
                                    $skill_cat_id = $row->skill_category_id;
                                endforeach;

                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>