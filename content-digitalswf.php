					<div class="dg">

						<div class="line-break"></div>

						<div class="flashPlay">

							<div class="flashBanner">

								<?php
								$swfentries = get_post_meta( get_the_ID(), '_cmbdigitalswf_digitalswf', true );

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
								<span class="swfData" data-title="<?php echo $swftitle; ?>" data-swf="<?php echo $swf; ?>" data-description="<?php echo $swfdescription; ?>" data-width="<?php echo $swfwidth; ?>" data-height="<?php echo $swfheight; ?>"></span>
								<?php } ?>
								<div id="flashBanner">

									<div id="flashFail">

										<p>Sorry, this content needs the <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a> to be viewed.</p>

										<p>If viewing this on a mobile or tablet device please visit the site on desktop to see this content in full.</p>

									</div>

								</div>

								<p class="desc"></p>

							</div>

						</div>

						<?php
							$entries = get_post_meta( get_the_ID(), '_cmbdigitalswf_digitalswf', true );
							foreach ( (array) $entries as $key => $entry ) {
								if ( $key < 1 ) {} else {
						?>

						<div class="additional">

							<h2>Additional formats</h2>

							<p>
								<?php
								$swfentries = get_post_meta( get_the_ID(), '_cmbdigitalswf_digitalswf', true );

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

								<a class="selector" data-title="<?php echo $swftitle; ?>" data-swf="<?php echo $swf; ?>" data-description="<?php echo $swfdescription; ?>" data-width="<?php echo $swfwidth; ?>" data-height="<?php echo $swfheight; ?>"><?php echo $swftitle; ?></a>

								<?php } ?>

							</p>

						</div>

						<?php
								}
						?>
						<?php
							}
						?>

					</div>

					<script>
					$(function() {
						var $swfTitle 	= $('.swfData').first().data('title'),
							$swf		= $('.swfData').first().data('swf'),
							$desc		= $('.swfData').first().data('description'),
							$width		= $('.swfData').first().data('width'),
							$height		= $('.swfData').first().data('height');
						if(exists($swf)) {
						$('#flashBanner').flash({
							swf: $swf,
							width: $width,
							height: $height
						});
						} else {
							$('#flashBanner').hide();
						}
						$('.flashBanner .desc').html($desc);
						$('.dg').on('click', '.selector', function(e){
							e.preventDefault();
							$('.selector').removeClass('selected');
							$('#flashObject').empty();
							$(this).addClass('selected');
						var $swfTitle 	= $(this).data('title'),
							$swf		= $(this).data('swf'),
							$desc		= $(this).data('description'),
							$width		= $(this).data('width'),
							$height		= $(this).data('height');
						$('#flashBanner').flash({
							swf: $swf,
							width: $width,
							height: $height
						});
						$('.flashBanner .desc').html($desc);
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
					</script>