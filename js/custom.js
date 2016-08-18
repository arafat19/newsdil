// JavaScript Document

$(window).load(function() {
	$(".se-pre-con").fadeOut("slow");
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
	$("#testimonial-list-small").owlCarousel({
		stopOnHover : true,
		autoPlay: 3000,
		navigation:false,
		pagination:true,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : true,

	});
	$("#testimonial-list-small1").owlCarousel({
		stopOnHover : true,
		autoPlay: 3000,
		navigation:false,
		pagination:true,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : true,

	});
	$("#related-project-iteam").owlCarousel({
		autoPlay: 3000, //Set AutoPlay to 3 seconds
		items : 3,
		navigation:true,
		pagination:false,
		stopOnHover : true,
		itemsDesktop : [1199,2],
		itemsDesktopSmall : [979,2]
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

//Checkbox selector
$(document).ready(function () {
	$('#iteam1').click(function () {
		$('#div1').hide('fast');
	});
	$('#iteam2').click(function () {
		$('#div1').hide('fast');
	});
	$('#iteam3').click(function () {
		$('#div1').hide('fast');
	});
	$('#iteam4').click(function () {
		$('#div1').hide('fast');
	});
	$('#iteam5').click(function () {
		$('#div1').show('fast');
	});
	$('#iteam6').click(function () {
		$('#submit-iteam').show('fast');
	});
});


//smoothScroll
smoothScroll.init();


//Form warnign and sucess
$(document).ready(function(){
	$(".success-colse").click(function(){
		$(".alert-success").toggle("slow");
	});
});

$(document).ready(function(){
	$(".waring-colse").click(function(){
		$(".alert-warning").toggle("slow");
	});
});



