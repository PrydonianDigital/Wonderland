$(function() {

	if(Cookies.get('wonderland')){
		console.log('you already have some Wonderland cookies set. You can change your broswer preferences to stop them if you want.');
	} else {
		Cookies.set('wonderland', 'true');
		$('body').append('<div id="cookieInfo">This site uses cookies in order to function properly. By continuing to browse, you agree that we can save them on your device.</div>');
		$('#cookieInfo').delay(10000).fadeOut(1500)
	}

	var $container = $('.gridHolder');
	$('#allPosts').infinitescroll({
		navSelector  : "div#nav",
		nextSelector : "div#nav a:first",
		itemSelector : "#allPosts div.item"
	},function(newElements){
		$container.isotope( 'insert', $( newElements ) );
		$( newElements ).each(function() {
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
	});

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

	$('.menu').hide();

	$('.menu').on('click', 'a', function (e) {
	    e.preventDefault();
	    $('html,body').animate( { scrollTop:$(this.hash).offset().top } , 1000);
	});

	$('.flashbanner .selector').first().addClass('selected');

	if($('.flashbanner .selector').first().attr('data-html') == 'on') {
		$('#htmlBanner iframe').attr('width', $('.flashbanner .selector').first().data('width')).attr('height', $('.flashbanner .selector').first().data('height')).attr('src', $('.flashbanner .selector').first().data('swf'));
		$('#flashBanner').hide();
	} else {
		$('#flashBanner').show();
		$('#htmlBanner iframe').attr('width', '0').attr('height', '0').attr('src', 'about:blank');
		$('#flashBanner').flash({
			swf: $('.flashbanner .selector').first().data('swf'),
			width: $('.flashbanner .selector').first().data('width'),
			height: $('.flashbanner .selector').first().data('height')
		});
	}

	$('.additional.flashbanner a').on('click', function(){
		var dataAttr = $(this).attr('data-html');
		if (dataAttr == 'on') {
			$('#flashBanner').flash().remove();
			$('.flashBanner .desc').html($(this).data('description'));
			$('#htmlBanner iframe').attr('width', $(this).data('width')).attr('height', $(this).data('height')).attr('src', $(this).data('swf'));
			$('.flashbanner .selector').removeClass('selected');
			$(this).addClass('selected');
		} else {
			$('#flashBanner').flash({
				swf: $(this).data('swf'),
				width: $(this).data('width'),
				height: $(this).data('height')
			});
			$('#htmlBanner iframe').attr('width', '0').attr('height', '0').attr('src', 'about:blank');
			$('.flashbanner .selector').removeClass('selected');
			$(this).addClass('selected');
			$('.flashPlay .desc').html($(this).data('description'));
		}
	});


	$('.davplayer .selector').first().addClass('selected');
	videojs('wonderlandPlayerDigital', {});
	$('.additional.davplayer a').on('click', function(e){
		e.preventDefault();
		$('.davplayer .selector').removeClass('selected');
		videojs('wonderlandPlayerDigital', {}, function(){
			var myPlayer = this;
			myPlayer.dispose();
		});
		$(this).addClass('selected');
		var $videoTitle = $(this).data('title'),
			$mp4		= $(this).data('mp4'),
			$webm		= $(this).data('webm'),
			$ogg		= $(this).data('ogg'),
			$poster		= $(this).data('poster'),
			$min		= $(this).data('min'),
			$sec		= $(this).data('sec'),
			$desc		= $(this).data('description');
			$width		= $(this).data('width');
			$height		= $(this).data('height');
		var dplayer = videojs('wonderlandPlayerDigital');
		dplayer.poster($poster);
		$('.dav meta[itemprop="thumbnailUrl"]').attr('content', $poster);
		$('.dav meta[itemprop="embedURL"]').attr('content', $mp4);
		$('.dav meta[itemprop="duration"]').attr('content', 'T'+$min+'M'+$sec+'S');
		$('.dav .videoPlay .desc').html($desc);
		$('.dav #videoTitle').html($videoTitle);
		$('.dav #wonderlandPlayer').attr('poster', $poster);
		$('.dav #videoWrapper').attr('data-width', $width).attr('data-height', $height)
		dplayer.src(
			{ type: "video/mp4", src: $mp4 },
			{ type: "video/webm", src: $webm },
			{ type: "video/ogg", src: $ogg }
		);
		if($(window).width() < 700) {
		var pw = $('.dav .videoPlay').width(),
			aspectW = pw / $width,
			aspectH = $height * aspectW;
		dplayer.width($width).height(aspectH)
		} else {
			dplayer.width($width).height($height)
		}
		dplayer.play();
	});


	$('.avplayer .selector').first().addClass('selected');
	videojs('wonderlandPlayer', {});
	$('.av').on('click', '.selector', function(e){
		e.preventDefault();
		$('.avplayer .selector').removeClass('selected');
		videojs('wonderlandPlayer', {}, function(){
			var myPlayer = this;
			myPlayer.dispose();
		});
		$(this).addClass('selected');
		var $videoTitle = $(this).data('title'),
			$mp4		= $(this).data('mp4'),
			$webm		= $(this).data('webm'),
			$ogg		= $(this).data('ogg'),
			$poster		= $(this).data('poster'),
			$min		= $(this).data('min'),
			$sec		= $(this).data('sec'),
			$width		= $(this).data('width'),
			$height		= $(this).data('height'),
			$desc		= $(this).data('description');
		var player = videojs('wonderlandPlayer');
		player.poster($poster);
		$('.av meta[itemprop="thumbnailUrl"]').attr('content', $poster);
		$('.av meta[itemprop="embedURL"]').attr('content', $mp4);
		$('.av meta[itemprop="duration"]').attr('content', 'T'+$min+'M'+$sec+'S');
		$('.av .videoPlay .desc').html($desc);
		$('.av #videoTitle').html($videoTitle);
		$('.av #wonderlandPlayer').attr('poster', $poster);
		player.src(
			{ type: "video/mp4", src: $mp4 },
			{ type: "video/webm", src: $webm },
			{ type: "video/ogg", src: $ogg }
		);
		player.play();
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
