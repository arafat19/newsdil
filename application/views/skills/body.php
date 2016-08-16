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
<div id="promo-seven" class="parallax-section">
    <div class="parallax-content">
        <div class="color-overlay"></div>
        <div class="container text-center">
            <div class="col-xs-12 clearfix">
                <h2>Our <span> Skill</span></h2>
                <div class="overview_page"><a href="<?= base_url() ?>/about">KNOW MORE ABOUT US</a></div>
                <div class="catagories">
                    <ul>
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li>/</li>
                        <li><a href="" class="active">Skill</a></li>
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
            <div class="contain-body about-section what-we-do">
                <div class="contain">
                    <div class="col-xs-12">
                        <h2>Our Global Skills</h2>
                        <div class="divied"></div>
                        <div class="contain">
                            <h3>We have International standard expert Software Engineers and Project Managers</h3>
                            <p>They are capable to make your dream true and accelerate your business like F1 cars.</p>
                        </div>
                    </div>
                    <div class="progress-iteam">
                        <?php
                        $skill_cat_id = 0;
                        if (isset($active_skills) && $active_skills->num_rows() > 0):
                            foreach ($active_skills->result() as $row): ?>

                                <?php if ($skill_cat_id != $row->skill_category_id) {
                                    ?>
                                    <div class="col-md-6">
                                        <div class="progress-list">
                                            <p class="lead text-black"><?php echo $row->skill_category_name; ?></p>
                                            <?php
                                            $query = $this->db->query("SELECT sdil_skills.* FROM sdil_skills WHERE sdil_skills.is_active= '1' AND sdil_skills.skill_category_id=" . $row->skill_category_id);
                                            foreach ($query->result() as $rows): ?>
                                                <div class="progress-item">
                                                    <div class="progress-title">
                                                        <h6><?php echo $rows->skill_name; ?></h6>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar"
                                                             data-percent="<?= $rows->skill_percentage ?>"></div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php $skill_cat_id = $row->skill_category_id;
                            endforeach;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>