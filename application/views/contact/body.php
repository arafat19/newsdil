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
<div id="promo-three" class="parallax-section">
    <div class="parallax-content">
        <div class="color-overlay"></div>
        <div class="container text-center wow animated bounceIn">
            <div class="col-xs-12 clearfix">
                <h2>Contact <span>us</span></h2>
                <div class="overview_page"><a href="aboutus.html">KNOW MORE ABOUT US</a></div>
                <div class="catagories">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>/</li>
                        <li><a href="contact.html" class="active">Contact us</a></li>
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
            <div class="contain-body about-section what-we-do contact-section clearfix">
                <div class="col-xs-12">
                    <h2>GOT ANY QUESTION FOR US?</h2>
                    <div class="divied"></div>
                    <div class="contain">
                        <h3>Please fill out the form below and our representative will respond to your inquiry within 1
                            - 2 business days.</h3>
                        <div class="contact-page">
                            <div class="col-xs-12">
                                <?php if (validation_errors()) { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <i class="fa fa-exclamation-triangle"></i>
                                        <?php echo validation_errors(); ?>
                                        <div class="waring-colse" data-dismiss="alert"><i
                                                class="fa fa-times-circle"></i>
                                        </div>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('con_success_msg')) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <i class="fa fa-check"></i>
                                        <?php echo $this->session->flashdata('con_success_msg'); ?>
                                        <div class="success-colse" data-dismiss="alert"><i
                                                class="fa fa-times-circle"></i>
                                        </div>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('con_failure_msg')) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <i class="fa fa-times"></i>
                                        <?php echo $this->session->flashdata('con_failure_msg'); ?>
                                        <div class="danger-colse" data-dismiss="alert"><i
                                                class="fa fa-times-circle"></i>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <form name='contact_us' id='contact_us' enctype="multipart/form-data" method="post">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <p>
                                        <input type="text" class="textfield" id="full_name" name="full_name"
                                               placeholder="Name*"    autofocus/>
                                        <input type="email" class="textfield" placeholder="Email*" name="email"
                                               id="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                               required/>
                                        <input type="tel" class="textfield" id="cell_number" name="cell_number"
                                               pattern="[0][1-9]{4}[-][0-9]{6}"
                                               placeholder="Mobile Number (Format: 01XXX-XXXXXX)"/>
                                        <input type="text" class="textfield" id="subject" name="subject"
                                               placeholder="Subject*" required/>
                                        <input type="number" class="textfield" id="human" name="human"
                                               pattern="[0-9]"
                                               placeholder="3 + 2 = ?" required/>
                                    </p>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <p>
                                         <textarea class="textfield" rows="12" name="message" id="message"
                                                   placeholder="Message*"></textarea>
                                    </p>
                                    <label>
                                        <input type="submit" class="submit-button" value="SUBMIT NOW" id="formSubmit" onclick="myValidationFunction()">
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--<div class="col-xs-12">
                    <div class="social-media-section title clearfix">
                        <h2>Follow Us Below Social Media</h2>
                        <div class="divied"></div>
                        <div class="media-iteam wow animated slideInRight">
                            <ul>
                                <li class="wow animated rotateIn animated"
                                    style="visibility: visible; animation-name: rotateIn;"><a href="#"><i
                                            class="icon-facebook"></i></a></li>
                                <li class="wow animated rotateIn animated"
                                    style="visibility: visible; animation-name: rotateIn;"><a href="#"><i
                                            class="icon-twitter"></i></a></li>
                                <li class="wow animated rotateIn animated"
                                    style="visibility: visible; animation-name: rotateIn;"><a href="#"><i
                                            class="icon-dribbble"></i></a></li>
                                <li class="wow animated rotateIn animated"
                                    style="visibility: visible; animation-name: rotateIn;"><a href="#"><i
                                            class="icon-pinterest"></i></a></li>
                                <li class="wow animated rotateIn animated"
                                    style="visibility: visible; animation-name: rotateIn;"><a href="#"><i
                                            class="icon-gplus"></i></a></li>
                                <li class="wow animated rotateIn animated"
                                    style="visibility: visible; animation-name: rotateIn;"><a href="#"><i
                                            class="icon-rss"></i></a></li>
                                <li class="wow animated rotateIn animated"
                                    style="visibility: visible; animation-name: rotateIn;"><a href="#"><i
                                            class="icon-vimeo"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <div id="map"><div style="height:300px;width:500px;max-width:100%;list-style:none; transition: none;overflow:hidden;"><div id="gmap-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Bogra,+Bangladesh&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-map-html" href="http://www.dog-checks.com/dachshund-checks" id="grab-map-info">dachshund checks</a><style>#gmap-display .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.dog-checks.com/google-maps-authorization.js?id=334d21a0-2686-ee25-997f-885908b663d0&c=google-map-html&u=1470872487" defer="defer" async="async"></script></div>
</section>
