//MOBILE MENU
$(document).ready(function() {

	$('.mobileNav .closed').on('click', function(event) {
		$(this).hide();
		$('.open').show();
	    $('.mobileNav nav').show();
		$('.wrapper').css('padding-top', '85px');
	});

	$('.mobileNav .open').on('click', function(event) {
		$(this).hide();
		$('.closed').show();
	    $('.mobileNav nav').hide();
		$('.wrapper').css('padding-top', '55px');
	});

	// About
	$('.aboutBtn').on('click', function(event) {
		//event.preventDefault();
		$('.about').slideDown().fadeIn(1000).show();
		$('.aboutBtn').addClass('selected');
	});

	$('.about .closed').on('click', function(event) {
		window.location.hash = ''; // for older browsers, leaves a # behind
		history.pushState('', document.title, window.location.pathname);
		event.preventDefault();
		$('.about').slideUp().fadeOut(1000);
		$('.aboutBtn').removeClass('selected');
	});

	// Grid Icons
	$('.item').each(function() {

		if ($(this).hasClass('type-av')){
			$(this).find('.icons').append('<span>AV</span>');
		}

		if ($(this).hasClass('type-print')){
			$(this).find('.icons').append('<span>Print</span>');
		}

		if ($(this).hasClass('type-digital')){
			$(this).find('.icons').append('<span>Digital</span>');
		}

	});

	$('.videoPlay').first().show();
	$('.selector').first().addClass('selected');
	$('.av').on('click', '.selector', function(e){
		e.preventDefault();
		var playNext = $(this).data('video')
		$('.selector').removeClass('selected');
		$(this).addClass('selected');
		$('.videoPlay').hide();
		$('.videoPlay[data-video="'+playNext+'"]').show();
	});

	$('.flashPlay').first().show();
	$('.selector').first().addClass('selected');
	$('.dg').on('click', '.selector', function(e){
		e.preventDefault();
		var playNext = $(this).data('swf')
		$('.selector').removeClass('selected');
		$(this).addClass('selected');
		$('.flashPlay').hide();
		$('.flashPlay[data-swf="'+playNext+'"]').show();
	});

	$('.menu').hide();

	$('.menu').on('click', 'a', function (e) {
	    e.preventDefault();
	    $('html,body').animate( { scrollTop:$(this.hash).offset().top } , 1000);
	});

});

// ISOTOPE SETUP
var $container = $('.gridHolder').isotope({
	itemSelector: '.item',
	transitionDuration: '0.2s',
	layoutMode: 'masonry',
	masonry: {
		gutter: 10,
		columnWidth: 105
	}
});

$('nav').on( 'click', '.filterBtn', function() {
	$('nav a').removeClass('selected');
	$(this).addClass('selected');
	var filterValue = $(this).attr('data-filter');
	$container.isotope({ filter: filterValue });
});

//HOME PAGE FILTER URL
var showWhat = document.URL.split('?')[1];
var showHash = document.URL.split('#')[1];

if (showWhat == 'AV') {
	$('nav a').removeClass('selected');
	$('.linkAV').addClass('selected');
	$container.isotope({ filter: '.type-av' });
}
if (showWhat == 'Print') {
	$('nav a').removeClass('selected');
	$('.linkPrint').addClass('selected');
	$container.isotope({ filter: '.type-print' });
}
if (showWhat == 'Digital') {
	$('nav a').removeClass('selected');
	$('.linkDigital').addClass('selected');
	$container.isotope({ filter: '.type-digital' });
}

if (showWhat == 'About') {
	$('.about').slideDown().fadeIn(1000).show();
	$('.aboutBtn').addClass('selected');
}

if (showHash == 'about') {
	$('.about').slideDown().fadeIn(1000).show();
	$('.aboutBtn').addClass('selected');
}

// Side Menu
$(window).load(function() {

	var topOfOthDiv = 65;

	$('.aboutBtn').on('click', function(event) {
		topOfOthDiv = 270;
	});

	$('.about .closed').on('click', function(event) {
		topOfOthDiv = 65;
	});

	if($(window).scrollTop() > topOfOthDiv) { //scrolled past the other div?
		$(".menu").fadeIn(500); //reached the desired point -- show div
	}

	$(window).scroll(function() {

		if($(window).scrollTop() > topOfOthDiv) { //scrolled past the other div?
			$(".menu").fadeIn(500); //reached the desired point -- show div
		}

		if($(window).scrollTop() < topOfOthDiv) { //scrolled past the other div?
			$(".menu").fadeOut(200); //reached the desired point -- show div
		}

	});
});

