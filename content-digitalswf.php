					<div class="dg">

						<div class="line-break"></div>

						<?php
						$swfentries = get_post_meta( get_the_ID(), '_cmbdigitalswf_digital', true );

						foreach ( (array) $swfentries as $key => $swfentry ) {

						    $swftitle = $swfdescription = $swfwidth = $swfheight = $swf = '';

						    if ( isset( $swfentry['swftitle'] ) )
						        $swftitle = esc_html( $swfentry['swftitle'] );

						    if ( isset( $swfentry['swfdescription'] ) )
						        $swfdescription = esc_html( $swfentry['swfdescription'] );

						    if ( isset( $swfentry['swfwidth'] ) )
						        $swfwidth = esc_html( $swfentry['swfwidth'] );

						    if ( isset( $swfentry['swfheight'] ) )
						        $swfheight = esc_html( $swfentry['swfheight'] );

						    if ( isset( $swfentry['swf'] ) )
						        $swf = esc_html( $swfentry['swf']);

						?>

						<div class="flashPlay" data-swf="<?php echo $swftitle; ?>">

							<div class="flashBanner">

								<object id="flash_896241048" width="<?php echo $swfwidth; ?>" height="<?php echo $swfheight; ?>" type="application/x-shockwave-flash" data="<?php echo $swf; ?>">
									<param value="transparent" name="wmode">
									<param value="<?php echo $swf; ?>" name="movie">
								</object>

								<p class="desc"><?php echo $swfdescription; ?></p>

							</div>

							<div class="flashFail">

								<p>Sorry, this content needs the <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a> to be viewed.</p>

								<p>If viewing this on a mobile or tablet device please visit the site on desktop to see this content in full.</p>

							</div>

						</div>

						<?php } ?>


						<div class="additional">

							<h2>Additional formats</h2>

							<p>
								<?php
								$swfentries = get_post_meta( get_the_ID(), '_cmbdigitalswf_digital', true );

								foreach ( (array) $swfentries as $key => $entry ) {

								    $swftitle = '';

								    if ( isset( $entry['swftitle'] ) )
								        $swftitle = esc_html( $entry['swftitle'] );

								?>
								<a href="" class="selector" data-swf="<?php echo $swftitle; ?>"><?php echo $swftitle; ?></a>

								<?php } ?>

							</p>

						</div>




					</div>