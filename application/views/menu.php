<!-- Navigation -->
<div class="col-xs-12 col-sm-9 col-md-9">
    <div class="wsmenucontainer clearfix">
        <div class="header">
            <nav class="wsmenu slideLeft clearfix">
                <ul class="mobile-sub wsmenu-list">
                    <li><a href="<?php echo base_url();?>" class="active"><i class="fa fa-home"></i><span class="hometext">&nbsp;&nbsp;Home</span></a></li>
                    <li><a class="<?php echo($active=='our_services')?'active':''; ?>" href="#">What we do</a>
                        <ul class="wsmenu-submenu">
                            <?php if (isset($all_services) && $all_services->num_rows() > 0):
                                foreach ($all_services->result() as $row): ?>
                                     <li class="<?php echo($active=='our_services')?'active':''; ?>"><a href="<?php echo $row->service_page_url; ?>"><?php echo $row->service_name;?></a></li>
                        <?php        endforeach;
                            endif; ?>
                            <!--<li><a href="#">Digital Advertising Operations</a></li>
                            <li><a href="#">Web & Software Development</a></li>
                            <li><a href="#">Back Office Processing</a></li>
                            <li><a href="#">Data Aggregation and Analysis</a></li>
                            <li><a href="#">BPO</a>-->
                                <!--     <ul class="wsmenu-submenu-sub">
                                      <li><a href="#">Second level menu</a></li>
                                      <li><a href="#">Second level menu</a></li>
                                      <li><a href="#">Second level menu</a></li>
                                      <li><a href="#">Second level menu</a>
                                        <ul class="wsmenu-submenu-sub-sub">
                                          <li class=""><a href="#">Third level menu</a></li>
                                          <li class=""><a href="#">Third level menu</a></li>
                                          <li class=""><a href="#">Third level menu</a></li>
                                          <li class=""><a href="#">Third level menu</a></li>
                                        </ul>
                                      </li>
                                    </ul> -->
                        </ul>
                    </li>
                    <li><a class="<?php echo($active=='about')?'active':''; ?>" href="#">About</a>
                        <ul class="wsmenu-submenu">
                            <li><a class="<?php echo($active=='about')?'active':''; ?>" href="<?php echo base_url();?>about-us">Company Overview</a></li>
                            <li><a class="<?php echo($active=='about')?'active':''; ?>" href="<?php echo base_url();?>career">Career</a></li>
                        </ul>
                    </li>
                    <!--<li><a href="#">Services</a></li>-->
                    <li><a class="<?php echo($active=='our_skills')?'active':''; ?>" href="<?php echo base_url();?>our-skills">Our Skills</a></li>
                    <li><a href="#">News</a></li>
                    <li><a class="<?php echo($active=='contacts')?'active':''; ?>" href="<?php echo base_url();?>contact">Contact</a></li>
                    <li>
                        <form action="#" class="searchBox" id="searchiteam" method="get">
                            <input type="search" onblur="if (this.value == '') {this.value = 'Search';}" onfocus="if (this.value == 'Search') {this.value = '';}" id="s" name="s" value="" />
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>