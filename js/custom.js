// JavaScript Document

$(window).load(function() {
	$(".se-pre-con").fadeOut("slow");;
});

$(document).ready(function() {
	    $("#services-list").owlCarousel({
		autoPlay: 3000, //Set AutoPlay to 3 seconds
		items : 3,
		navigation:true,
		pagination:false,
		stopOnHover : true,
		itemsDesktop : [1199,2],
		itemsDesktopSmall : [979,2]
    });
	    $("#team-list").owlCarousel({
		autoPlay: 3000, //Set AutoPlay to 3 seconds
		items : 3,
		navigation:true,
		pagination:false,
		stopOnHover : true,
		itemsDesktop : [1199,2],
		itemsDesktopSmall : [979,2]
    });
	    $("#testimonial-list").owlCarousel({
		stopOnHover : true,
		autoPlay: 3000,
		navigation:true,
		pagination:false,
	    slideSpeed : 300,
	    paginationSpeed : 400,
	    singleItem : true,
		
    });
	
//jQuery to collapse the navbar on scroll
	$(window).scroll(function() {
		if ($(".navbar").offset().top > 50) {
			$(".navbar-fixed-top").addClass("top-nav-collapse");
			$(".logo").addClass("small-logo");
		} else {
			$(".navbar-fixed-top").removeClass("top-nav-collapse");
		}
	});
});

//smoothScroll
	smoothScroll.init();	
