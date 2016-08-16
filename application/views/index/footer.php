<!-- Footer Section -->
<footer>
    <div class="footer-section">
        <div class="footer-before clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="block-iteam">
                            <h3>Latest Tweets</h3>
                            <div class="twitt-list"><i class="fa fa-twitter"></i>
                                <p>Check out 'Chow - <span>Recipe & Food WordPress Theme' on #EnvatoMarket #themeforest http://t.co/OKLOuekjcW </span>109
                                    days ago</p>
                            </div>
                            <div class="twitt-list"><i class="fa fa-twitter"></i>
                                <p> Check out this great #themeforest item 'Trizzy - Multi-Purpose WooCommerce WordPress
                                    Theme'<span> http://t.co/gEvxLFuwB4</span> 302 days ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="block-iteam">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fshwapnoduar.info&tabs=timeline&width=370&height=295&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId" width="370" height="295" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="block-iteam">
                            <h3>Subscibe</h3>
                            <p>Subscribe to our email newsletter to receive our news, updates and awesome free files,
                                tuts and sources .</p>
                            <form>
                                <input type="text" value="your@gmail.com" class="input-area">
                                <input type="button" value="Subscribe" class="send-btn">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-after clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <p> <?php echo $all_system_configuration_ui['footer_text']; ?></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="social-iteam">
                            <ul>
                                <?php if (isset($active_social_icons) && $active_social_icons->num_rows() > 0):
                                    foreach ($active_social_icons->result() as $row): ?>
                                        <li>
                                            <a href="<?php echo $row->social_icon_link; ?>" target="_blank">
                                                <i class="<?php echo $row->social_icon_logo_class_name; ?>"></i>
                                            </a>
                                        </li>
                                        <?php
                                    endforeach;
                                endif; ?>
                                <!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                             <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                             <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                             <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                             <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                             <li><a href="#"><i class="fa fa-rss"></i></a></li>
                             <li><a href="#"><i class="fa fa-share"></i></a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="to-top" href="#intro" data-scroll=""><i class="fa fa-angle-up"></i></a>
    </div>
</footer>
<!-- jQuery -->
<!--<script src="--><?php //echo base_url();?><!--js/jquery-1.11.0.min.js"></script>-->
<script src="<?= base_url() ?>js/jquery-2.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

<script src="<?= base_url() ?>js/jquery-plugin-collection.js"></script>
<script src="<?= base_url() ?>js/progress.js"></script>
<!--Main Menu File-->
<script src="<?php echo base_url(); ?>js/webslidemenu.js"></script>
<!-- Lightbox js  -->
<script src="<?php echo base_url(); ?>js/jquery.prettyPhoto.js"></script>
<!-- Portfolio js  -->
<script src="<?php echo base_url(); ?>js/jquery.isotope.min.js"></script>
<!-- Counter js  -->
<script src="<?php echo base_url(); ?>js/counter.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.nicescroll.plus.js"></script>
<!-- Carousel js  -->
<script src="<?php echo base_url(); ?>js/owl.carousel.js"></script>
<!-- Scroll js  -->
<script src="<?php echo base_url(); ?>js/smooth-scroll.js"></script>
<!-- Paralaxx js  -->
<script src="<?= base_url(); ?>js/jquery.parallax.js"></script>
<!-- Custom js  -->
<script src="<?php echo base_url(); ?>js/custom.js"></script>
<!-- Animation js  -->
<script src="<?php echo base_url(); ?>js/wow.min.js"></script>

<!-- Google map js  -->

<script>
    new WOW().init();
</script>

</body>
</html>