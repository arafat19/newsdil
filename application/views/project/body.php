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
<div id="promo-six" class="parallax-section">
    <div class="parallax-content">
        <div class="color-overlay"></div>
        <div class="container text-center wow animated bounceIn">
            <div class="col-xs-12 clearfix">
                <h2>History of <span>Project</span></h2>
                <div class="overview_page"><a href="<?php echo base_url(); ?>about-us">KNOW MORE ABOUT US</a></div>
                <div class="catagories">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li>/</li>
                        <li><a href="" class="active">Project Details</a></li>
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
                        <div class="contain">
                            <div class="project-list wow animated slideInLeft">
                                <img width="750"
                                src="<?php echo base_url(); ?>uploaded/projects/<?php echo $active_project_page['project_image']; ?>"
                                alt="<?php echo $active_project_page['project_image']; ?>" />
                            </div>
                            <h3><?php echo $active_project_page['project_title']; ?></h3>
                            <?php echo $active_project_page['project_page_description']; ?>
                        </div>
                    </div>
                </div>
                <div class="contain-right">
                    <div class="col-xs-12 col-sm-5 col-md-4">
                        <div class="contain">
                            <h2>About Project</h2>
                            <div class="divied"></div>
                            <div class="project-details wow animated slideInRight">
                                <ul class="nv-details-list">
                                    <li>
                                        <span class="nv-info-item-name">Date</span>
                                        <span class="nv-info-item-value"><time
                                                datetime="2015-10-16"><?= $active_project_page['project_end_date']; ?></time></span>
                                    </li>
                                    <li><span class="nv-info-item-name">Category</span>
                                        <span class="nv-info-item-value">
                                            <a><?= $active_project_page['project_category_name']; ?></a>
                                        </span>
                                    </li>
                                    <li><span class="nv-info-item-name">Client</span><span
                                            class="nv-info-item-value"><?= $active_project_page['client_name']; ?></span>
                                    </li>
                                    <!--                                    <li><span class="nv-info-item-name">Skills</span><span class="nv-info-item-value">Adobe Photoshop</span></li>-->
                                    <li><span class="nv-info-item-name">Website</span>
                                        <span class="nv-info-item-value">
                                            <a href="<?= $active_project_page['project_external_link']; ?>"
                                               target="_blank">
                                                <?= $active_project_page['project_external_link']; ?>
                                            </a>
                                        </span>
                                    </li>
                                </ul>
                                <h4>Description</h4>
                                <p style="text-align: justify;">
                                    <span style="font-family: 'roboto condensed', sans-serif; font-size: 13pt;">
                                        <?= $active_project_page['project_description']; ?>
                                </span>
                                </p>
                            </div>
                            <div class="panel-group wow animated slideInUp" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                                   href="#collapse1">Key Features</a></h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                        <ul class="Post-list-iteam">
                                            <?= $active_project_page['project_key_features']; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                                   href="#collapse2">Benefits</a></h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul class="Post-list-iteam">
                                                <?= $active_project_page['project_benefits']; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                                   href="#collapse3">Technology Used</a></h4>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul class="Post-list-iteam">
                                                <?=$active_project_page['project_technology_used']; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="related-project">
                    <div class="col-xs-12">
                        <h2>Related <?=$current_project_category_name?> Projects</h2>
                        <div class="divied"></div>
                        <div id="related-project-iteam" class="wow animated zoomIn">
                            <?php if (isset($category_wise_active_project_list) && $category_wise_active_project_list->num_rows() > 0):
                                foreach ($category_wise_active_project_list->result() as $row):
                                    if($active_project_page['project_title'] != $row->project_title) {
                                    ?>
                                    <div class="iteam">
                                        <a href="<?=$row->project_internal_link?>">
                                            <img src="<?= base_url(); ?>uploaded/projects/<?=$row->project_image?>" alt="<?=$row->project_image?>">
                                        </a>
                                    </div>

                                <?php } endforeach;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>