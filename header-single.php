<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]><html class="no-js ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php echo basic_wp_seo(); ?>
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
</head>
<body <?php body_class(); ?> itemscope="" itemtype="http://schema.org/WebPage">

<div class="page-wrap">

	<div class="fixed">
		<div class="container">
			<div class="sixteen columns border-btm">
				<header>

					<div class="logo"><a href="<?php bloginfo('url'); ?>" target="_parent"><img src="<?php echo( get_header_image() ); ?>" alt="<?php _e( 'WONDERLAND', 'wl' ); ?>" /></a></div>

					<div class="mobileNav">
						<div class="mobileNavBtn closed"></div>
						<div class="mobileNavBtn open"></div>

						<nav>
							<ul>
								<li><a class="filterBtn selected" data-filter="*"><?php _e( 'all', 'wl' ); ?></a></li>
								<?php
									$types = get_terms('type','hide-empty=0&orderby=id');
									foreach ( $types as $type ) {
										if( ++$count > 10 ) break;
											echo '<li><a class="filterBtn" href="/wonderland/?'.$type->slug.'">'.$type->name.'</a></li>';
									}
								?>
								<li class="break">&middot;</li>
								<li><a href="#about" class="aboutBtn"><?php _e( 'About', 'wl' ); ?></a></li>
							</ul>
						</nav>

					</div>

					<nav>
						<ul>
							<li class="filter"><?php _e( 'Filter &raquo;', 'wl' ); ?></li>
							<li><a class="filterBtn selected" data-filter="*"><?php _e( 'all', 'wl' ); ?></a></li>
							<?php
								$taxonomies = array(
									'type'
								);
								$args = array(
									'hide_empty' => true,
									'orderby' => 'id',
									'exclude' => '7'
								);
								$types = get_terms($taxonomies, $args);
								foreach ( $types as $type ) {
									if( ++$count > 10 ) break;
										echo '<li><a class="filterBtn" href="/wonderland/?'.$type->name.'">'.$type->name.'</a></li>';
								}
							?>
							<li class="break">&middot;</li>
							<li><a href="#about" class="aboutBtn"><?php _e( 'About', 'wl' ); ?></a></li>
						</ul>
					</nav>

				</header>
			</div>

			<div class="menu two columns">

				<h4><?php the_title(); ?></h4>
				<p><?php $client = get_post_meta( get_the_ID(), '_wl_portfolio_client', true ); echo $client; ?></p>
				<ul>
				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'apdids' ) : ?>
					<?php if( has_term( 'AV', 'type' ) ) { ?>
					<li><a href="#av">AV</a></li>
					<?php } ?>
					<?php if( has_term( 'Print', 'type' ) ) { ?>
					<li><a href="#print">Print</a></li>
					<?php } ?>
					<?php if( has_term( 'Digital', 'type' ) ) { ?>
					<li><a href="#digital">Digital</a></li>
					<?php } ?>
				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'apdsdi' ) : ?>
					<?php if( has_term( 'AV', 'type' ) ) { ?>
					<li><a href="#av">AV</a></li>
					<?php } ?>
					<?php if( has_term( 'Print', 'type' ) ) { ?>
					<li><a href="#print">Print</a></li>
					<?php } ?>
					<?php if( has_term( 'Digital', 'type' ) ) { ?>
					<li><a href="#digital">Digital</a></li>
					<?php } ?>
				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'adidsp' ) : ?>
					<?php if( has_term( 'AV', 'type' ) ) { ?>
					<li><a href="#av">AV</a></li>
					<?php } ?>
					<?php if( has_term( 'Digital', 'type' ) ) { ?>
					<li><a href="#digital">Digital</a></li>
					<?php } ?>
					<?php if( has_term( 'Print', 'type' ) ) { ?>
					<li><a href="#print">Print</a></li>
					<?php } ?>
				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'adsdip' ) : ?>
					<?php if( has_term( 'AV', 'type' ) ) { ?>
					<li><a href="#av">AV</a></li>
					<?php } ?>
					<?php if( has_term( 'Digital', 'type' ) ) { ?>
					<li><a href="#digital">Digital</a></li>
					<?php } ?>
					<?php if( has_term( 'Print', 'type' ) ) { ?>
					<li><a href="#print">Print</a></li>
					<?php } ?>
				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'pdidsa' ) : ?>
					<?php if( has_term( 'Print', 'type' ) ) { ?>
					<li><a href="#print">Print</a></li>
					<?php } ?>
					<?php if( has_term( 'Digital', 'type' ) ) { ?>
					<li><a href="#digital">Digital</a></li>
					<?php } ?>
					<?php if( has_term( 'AV', 'type' ) ) { ?>
					<li><a href="#av">AV</a></li>
					<?php } ?>
				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'pdsdia' ) : ?>
					<?php if( has_term( 'Print', 'type' ) ) { ?>
					<li><a href="#print">Print</a></li>
					<?php } ?>
					<?php if( has_term( 'Digital', 'type' ) ) { ?>
					<li><a href="#digital">Digital</a></li>
					<?php } ?>
					<?php if( has_term( 'AV', 'type' ) ) { ?>
					<li><a href="#av">AV</a></li>
					<?php } ?>
				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'padids' ) : ?>
					<?php if( has_term( 'Print', 'type' ) ) { ?>
					<li><a href="#print">Print</a></li>
					<?php } ?>
					<?php if( has_term( 'AV', 'type' ) ) { ?>
					<li><a href="#av">AV</a></li>
					<?php } ?>
					<?php if( has_term( 'Digital', 'type' ) ) { ?>
					<li><a href="#digital">Digital</a></li>
					<?php } ?>
				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'padsdi' ) : ?>
					<?php if( has_term( 'Print', 'type' ) ) { ?>
					<li><a href="#print">Print</a></li>
					<?php } ?>
					<?php if( has_term( 'AV', 'type' ) ) { ?>
					<li><a href="#av">AV</a></li>
					<?php } ?>
					<?php if( has_term( 'Digital', 'type' ) ) { ?>
					<li><a href="#digital">Digital</a></li>
					<?php } ?>
				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'didsap' ) : ?>
					<?php if( has_term( 'Digital', 'type' ) ) { ?>
					<li><a href="#digital">Digital</a></li>
					<?php } ?>
					<?php if( has_term( 'AV', 'type' ) ) { ?>
					<li><a href="#av">AV</a></li>
					<?php } ?>
					<?php if( has_term( 'Print', 'type' ) ) { ?>
					<li><a href="#print">Print</a></li>
					<?php } ?>
				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'dsdiap' ) : ?>
					<?php if( has_term( 'Digital', 'type' ) ) { ?>
					<li><a href="#digital">Digital</a></li>
					<?php } ?>
					<?php if( has_term( 'AV', 'type' ) ) { ?>
					<li><a href="#av">AV</a></li>
					<?php } ?>
					<?php if( has_term( 'Print', 'type' ) ) { ?>
					<li><a href="#print">Print</a></li>
					<?php } ?>
				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'didspa' ) : ?>
					<?php if( has_term( 'Digital', 'type' ) ) { ?>
					<li><a href="#digital">Digital</a></li>
					<?php } ?>
					<?php if( has_term( 'AV', 'type' ) ) { ?>
					<li><a href="#av">AV</a></li>
					<?php } ?>
					<?php if( has_term( 'Print', 'type' ) ) { ?>
					<li><a href="#print">Print</a></li>
					<?php } ?>
				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'dsdipa' ) : ?>
					<?php if( has_term( 'Digital', 'type' ) ) { ?>
					<li><a href="#digital">Digital</a></li>
					<?php } ?>
					<?php if( has_term( 'Print', 'type' ) ) { ?>
					<li><a href="#print">Print</a></li>
					<?php } ?>
					<?php if( has_term( 'AV', 'type' ) ) { ?>
					<li><a href="#av">AV</a></li>
					<?php } ?>
				<?php endif; ?>
				</ul>
			</div><!--menu-->
		</div>
	</div><!--fixed-->