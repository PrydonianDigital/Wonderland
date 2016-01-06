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

	if(element_exists('#wonderlandPlayer')) {
		var player = videojs('wonderlandPlayer').ready(function() {
			console.log('AV ready');
		});
	}

	if(element_exists('#wonderlandPlayerDigital')) {
		var dplayer = videojs('wonderlandPlayerDigital').ready(function() {
			console.log('Digital AV ready');
		});
	}

	$('.avplayer .selector').first().addClass('selected');
	$('.additional.avplayer a').on('click', function(e){
		e.preventDefault();
		$('.avplayer .selector').removeClass('selected');
		//player.dispose();
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

	$('.davplayer .selector').first().addClass('selected');
	$('.additional.davplayer a').on('click', function(e){
		e.preventDefault();
		$('.davplayer .selector').removeClass('selected');
		//dplayer.dispose();
		$(this).addClass('selected');
		var $dvideoTitle = $(this).data('title'),
			$dmp4		= $(this).data('mp4'),
			$dwebm		= $(this).data('webm'),
			$dogg		= $(this).data('ogg'),
			$dposter	= $(this).data('poster'),
			$dmin		= $(this).data('min'),
			$dsec		= $(this).data('sec'),
			$ddesc		= $(this).data('description');
			$dwidth		= $(this).data('width');
			$dheight	= $(this).data('height');
			$dloop		= $(this).data('loop');
		dplayer.poster($dposter);
		$('.dav meta[itemprop="thumbnailUrl"]').attr('content', $dposter);
		$('.dav meta[itemprop="embedURL"]').attr('content', $dmp4);
		$('.dav meta[itemprop="duration"]').attr('content', 'T'+$dmin+'M'+$dsec+'S');
		$('.dav .videoPlay .desc').html($ddesc);
		$('.dav #videoTitle').html($dvideoTitle);
		$('.dav #wonderlandPlayerDigital').attr('poster', $dposter);
		$('.dav #videoWrapper').attr('data-width', $dwidth).attr('data-height', $dheight)
		dplayer.src(
			{ type: "video/mp4", src: $dmp4 },
			{ type: "video/webm", src: $dwebm },
			{ type: "video/ogg", src: $odgg }
		);
		if($(window).width() < 700) {
		var pw = $('.dav .videoPlay').width(),
			aspectW = pw / $width,
			aspectH = $dheight * aspectW;
		dplayer.width($dwidth).height(aspectH)
		} else {
			dplayer.width($dwidth).height($dheight)
		}
		if($loop == 'on') {
			dplayer.loop(true);
		} else {
			dplayer.loop(false);
		}
		dplayer.play();
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

function exists(data) {
	if(!data || data==null || data=='undefined' || typeof(data)=='undefined') return false;
	else return true;
}
function element_exists(id){
	if($(id).length > 0){
		return true;
	}
	return false;
}