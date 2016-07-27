<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url();?>admin"><?php echo $navbar_title;?></a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>
                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-footer">
                    <a href="#">Read All New Messages</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
                <li>
                    <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">View All</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $full_name; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo base_url();?>admin/sdil/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>admin/configuration"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url();?>signout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="<?php echo($active=='dashboard')?'active':''; ?>">
                <a href="<?php echo base_url();?>admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="<?php echo($active=='service_settings')?'active':''; ?>">
                <a href="javascript:;" data-toggle="collapse" data-target="#service"><i class="fa fa-fw fa-gear"></i> Service Settings <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="service" class="collapse">
                    <li class="<?php echo($active=='service_settings')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/service"><i class="fa fa-fw fa-database"></i>Add Service</a>
                    </li>
                    <li class="<?php echo($active=='service_settings')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/add/service/page"><i class="fa fa-fw fa-database"></i>Add Service Page</a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo($active=='all_contacts')?'active':''; ?>">
                <a href="<?php echo base_url();?>admin/contacts"><i class="fa fa-fw fa-phone"></i>All Contacts</a>
            </li>
            <li class="<?php echo($active=='admin_profile')?'active':''; ?>">
                <a href="<?php echo base_url();?>admin/sdil/profile"><i class="fa fa-fw fa-user"></i>Profile Edit</a>
            </li>
            <li class="<?php echo($active=='system_configuration_page')?'active':''; ?>">
                <a href="<?php echo base_url();?>admin/configuration"><i class="fa fa-fw fa-gear"></i>System Configuration</a>
            </li>

            <li class="<?php echo($active=='landing_page')?'active':''; ?>">
                <a href="javascript:;" data-toggle="collapse" data-target="#landing_page"><i class="fa fa-fw fa-gear"></i> Landing Page Settings <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="landing_page" class="collapse">
                    <li class="<?php echo($active=='social_icon')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/socialicon"><i class="fa fa-fw fa-database"></i>Add Social Icon</a>
                    </li>
                    <li class="<?php echo($active=='team_members')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/addteam"><i class="fa fa-fw fa-group"></i>Add Team Member</a>
                    </li>
                    <li class="<?php echo($active=='testimonials')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/addtestimonials"><i class="fa fa-fw fa-database"></i>Add Testimonials</a>
                    </li>
                    <li class="<?php echo($active=='partners')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/add/partners"><i class="fa fa-fw fa-group"></i>Add Partners</a>
                    </li>
                </ul>
            </li>

            <li class="<?php echo($active=='career')?'active':''; ?>">
                <a href="javascript:;" data-toggle="collapse" data-target="#careers"><i class="fa fa-fw fa-gear"></i> Career Management <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="careers" class="collapse">
                    <li class="<?php echo($active=='career')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/add/job"><i class="fa fa-fw fa-database"></i>Add Job</a>
                    </li>
                    <li class="<?php echo($active=='career')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/add/job/page"><i class="fa fa-fw fa-database"></i>Add Job Page</a>
                    </li>
                    <li class="<?php echo($active=='career')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/job/applicants"><i class="fa fa-fw fa-group"></i>Applicants</a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo($active=='pr_category')?'active':''; ?>">
                <a href="javascript:;" data-toggle="collapse" data-target="#project"><i class="fa fa-fw fa-gear"></i> Project Configuration <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="project" class="collapse">
                    <li class="<?php echo($active=='pr_category')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/add/project/category"><i class="fa fa-fw fa-database"></i>Add Project Category</a>
                    </li>
                    <li class="<?php echo($active=='pr_category')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/add/project"><i class="fa fa-fw fa-database"></i>Add Project</a>
                    </li>
                    <li class="<?php echo($active=='pr_category')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/add/project/page"><i class="fa fa-fw fa-database"></i>Add Project Page</a>
                    </li>
                </ul>
            </li>

            <li class="<?php echo($active=='other_page')?'active':''; ?>">
                <a href="javascript:;" data-toggle="collapse" data-target="#other_page"><i class="fa fa-fw fa-gear"></i> Other Page Settings <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="other_page" class="collapse">
                    <li class="<?php echo($active=='other_page')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/update/company/overview"><i class="fa fa-fw fa-database"></i>Company Overview</a>
                    </li>
                    <li class="<?php echo($active=='other_page')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/add/company/skill/category"><i class="fa fa-fw fa-database"></i>Add Company Skill Category</a>
                    </li>
                    <li class="<?php echo($active=='other_page')?'active':''; ?>">
                        <a href="<?php echo base_url();?>admin/add/company/skills"><i class="fa fa-fw fa-database"></i>Add Company Skills</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
            </li>
            <li>
                <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>