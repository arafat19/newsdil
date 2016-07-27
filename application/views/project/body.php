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

<!-- about us Section -->
<section id="choos" class="top-gap-about">
    <div class="container">
        <div class="row">
            <div class="titel-area clearfix">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <h2><?php echo $title_area_heading_h2; ?></h2>

                    <div class="divied"></div>
                </div>
            </div>

            <div class="col-lg-9 col-sm-9 col-md-9">
                <?php echo $active_project_page['project_page_description']; ?>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2">
                <div class="row text-center text-uppercase "><h6>Related <?php echo $current_project_category_name; ?>
                        Projects</h6></div>
                <div class="divied"></div>
                <ul>
                    <?php if (isset($category_wise_active_project_list) && $category_wise_active_project_list->num_rows() > 0):
                        foreach ($category_wise_active_project_list->result() as $row): ?>
                            <li>
                                <a class="btn btn-primary btn-sm btn-outline"
                                   href="<?php echo $row->project_internal_link; ?>">
                                    <?php echo $row->project_title; ?>
                                </a>
                            </li>
                        <?php endforeach;
                    endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

