<?php get_header('single'); ?>

	<div class="wrapper">

		<div class="container">

			<div class="columns sixteen">

				<div class="about">
					<a class="anchor" id="about"></a>

					<div class="closed"></div>

					<?php
						$args = array (
							'pagename' => 'About Wonderland',
						);
						$delivery = new WP_Query( $args );
						if ( $delivery->have_posts() ) {
							while ( $delivery->have_posts() ) {
								$delivery->the_post();
					?>
					<div class="columns eight">
						<p><strong><?php the_title(); ?></strong></p>
						<?php the_content(); ?>
					</div>
					<div class="columns four">
						<p><strong><?php _e( 'Find Us', 'wl' ); ?></strong></p>
						<?php echo wpautop( get_post_meta( get_the_ID(), $prefix . '_wl_about_findus', true ) ); ?>
					</div>
					<div class="columns three">
						<p><strong><?php _e( 'Contact Us', 'wl' ); ?></strong></p>
						<?php echo wpautop( get_post_meta( get_the_ID(), $prefix . '_wl_about_contactus', true ) ); ?>
					</div>
					<?php
								}
							} else {
								// no posts found
							}
							// Restore original Post Data
							wp_reset_postdata();
						?>
					<div class="line-break"></div>

				</div><!--about-->

				<h2 class="entry-title"><?php the_title(); ?></h2>
				<p><?php $client = get_post_meta( get_the_ID(), '_wl_portfolio_client', true ); echo $client; ?></p>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'apdids' ) : ?>

				<div <?php post_class('twelve columns offset-by-two'); ?>>

					<?php if( has_term( 'AV', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

						<?php get_template_part( 'content', 'av' ); ?>

					<?php } ?>

					<?php if( has_term( 'Print', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Print</h3><a class="anchor" id="print"></a>

						<?php get_template_part( 'content', 'print' ); ?>

					<?php } ?>

					<?php if( has_term( 'Digital', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php get_template_part( 'content', 'digitalimage' ); ?>

						<?php get_template_part( 'content', 'digitalswf' ); ?>

					<?php } ?>

				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'apdsdi' ) : ?>

				<div class="twelve columns offset-by-two">

					<?php if( has_term( 'AV', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

						<?php get_template_part( 'content', 'av' ); ?>

					<?php } ?>

					<?php if( has_term( 'Print', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Print</h3><a class="anchor" id="print"></a>

						<?php get_template_part( 'content', 'print' ); ?>

					<?php } ?>

					<?php if( has_term( 'Digital', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php get_template_part( 'content', 'digitalswf' ); ?>

						<?php get_template_part( 'content', 'digitalimage' ); ?>

					<?php } ?>

				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'adidsp' ) : ?>

				<div class="twelve columns offset-by-two">

					<?php if( has_term( 'AV', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

						<?php get_template_part( 'content', 'av' ); ?>

					<?php } ?>

					<?php if( has_term( 'Digital', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php get_template_part( 'content', 'digitalimage' ); ?>

						<?php get_template_part( 'content', 'digitalswf' ); ?>

					<?php } ?>

					<?php if( has_term( 'Print', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Print</h3><a class="anchor" id="print"></a>

						<?php get_template_part( 'content', 'print' ); ?>

					<?php } ?>

				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'adsdip' ) : ?>

				<div class="twelve columns offset-by-two">

					<?php if( has_term( 'AV', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

						<?php get_template_part( 'content', 'av' ); ?>

					<?php } ?>

					<?php if( has_term( 'Digital', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php get_template_part( 'content', 'digitalswf' ); ?>

						<?php get_template_part( 'content', 'digitalimage' ); ?>

					<?php } ?>

					<?php if( has_term( 'Print', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Print</h3><a class="anchor" id="print"></a>

						<?php get_template_part( 'content', 'print' ); ?>

					<?php } ?>

				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'pdidsa' ) : ?>

				<div class="twelve columns offset-by-two">

					<?php if( has_term( 'Print', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Print</h3><a class="anchor" id="print"></a>

						<?php get_template_part( 'content', 'print' ); ?>

					<?php } ?>

					<?php if( has_term( 'Digital', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php get_template_part( 'content', 'digitalimage' ); ?>

						<?php get_template_part( 'content', 'digitalswf' ); ?>

					<?php } ?>

					<?php if( has_term( 'AV', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

						<?php get_template_part( 'content', 'av' ); ?>

					<?php } ?>

				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'pdsdia' ) : ?>

				<div class="twelve columns offset-by-two">

					<?php if( has_term( 'Print', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Print</h3><a class="anchor" id="print"></a>

						<?php get_template_part( 'content', 'print' ); ?>

					<?php } ?>

					<?php if( has_term( 'Digital', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php get_template_part( 'content', 'digitalswf' ); ?>

						<?php get_template_part( 'content', 'digitalimage' ); ?>

					<?php } ?>

					<?php if( has_term( 'AV', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

						<?php get_template_part( 'content', 'av' ); ?>

					<?php } ?>

				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'padids' ) : ?>

				<div class="twelve columns offset-by-two">

					<?php if( has_term( 'Print', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Print</h3><a class="anchor" id="print"></a>

						<?php get_template_part( 'content', 'print' ); ?>

					<?php } ?>

					<?php if( has_term( 'AV', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

						<?php get_template_part( 'content', 'av' ); ?>

					<?php } ?>

					<?php if( has_term( 'Digital', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php get_template_part( 'content', 'digitalimage' ); ?>

						<?php get_template_part( 'content', 'digitalswf' ); ?>

					<?php } ?>

				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'padsdi' ) : ?>

				<div class="twelve columns offset-by-two">

					<?php if( has_term( 'Print', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Print</h3><a class="anchor" id="print"></a>

						<?php get_template_part( 'content', 'print' ); ?>

					<?php } ?>

					<?php if( has_term( 'AV', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

						<?php get_template_part( 'content', 'av' ); ?>

					<?php } ?>

					<?php if( has_term( 'Digital', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php get_template_part( 'content', 'digitalswf' ); ?>

						<?php get_template_part( 'content', 'digitalimage' ); ?>

					<?php } ?>

				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'didsap' ) : ?>

				<div class="twelve columns offset-by-two">

					<?php if( has_term( 'Digital', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php get_template_part( 'content', 'digitalimage' ); ?>

						<?php get_template_part( 'content', 'digitalswf' ); ?>

					<?php } ?>

					<?php if( has_term( 'AV', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

						<?php get_template_part( 'content', 'av' ); ?>

					<?php } ?>

					<?php if( has_term( 'Print', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Print</h3><a class="anchor" id="print"></a>

						<?php get_template_part( 'content', 'print' ); ?>

					<?php } ?>

				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'dsdiap' ) : ?>

				<div class="twelve columns offset-by-two">

					<?php if( has_term( 'Digital', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php get_template_part( 'content', 'digitalswf' ); ?>

						<?php get_template_part( 'content', 'digitalimage' ); ?>

					<?php } ?>

					<?php if( has_term( 'AV', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

						<?php get_template_part( 'content', 'av' ); ?>

					<?php } ?>

					<?php if( has_term( 'Print', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Print</h3><a class="anchor" id="print"></a>

						<?php get_template_part( 'content', 'print' ); ?>

					<?php } ?>

				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'didspa' ) : ?>

				<div class="twelve columns offset-by-two">

					<?php if( has_term( 'Digital', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php get_template_part( 'content', 'digitalimage' ); ?>

						<?php get_template_part( 'content', 'digitalswf' ); ?>

					<?php } ?>

					<?php if( has_term( 'Print', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Print</h3><a class="anchor" id="print"></a>

						<?php get_template_part( 'content', 'print' ); ?>

					<?php } ?>

					<?php if( has_term( 'AV', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

						<?php get_template_part( 'content', 'av' ); ?>

					<?php } ?>

				<?php endif; ?>

				<?php global $post; $order = get_post_meta( $post->ID, '_wl_portfolio_media_order', true ); if( $order == 'dsdipa' ) : ?>

				<div class="twelve columns offset-by-two">

					<?php if( has_term( 'Digital', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php get_template_part( 'content', 'digitalswf' ); ?>

						<?php get_template_part( 'content', 'digitalimage' ); ?>

					<?php } ?>

					<?php if( has_term( 'Print', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>Print</h3><a class="anchor" id="print"></a>

						<?php get_template_part( 'content', 'print' ); ?>

					<?php } ?>

					<?php if( has_term( 'AV', 'type' ) ) { ?>

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

						<?php get_template_part( 'content', 'av' ); ?>

					<?php } ?>

				<?php endif; ?>

			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>