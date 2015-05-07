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

	if ($key == 0) {
		if($swf == '') {} else {
?>

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

									if ($key == 0) {
										if($swf == '') {} else {
								?>

								<div id="flashBanner" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">

									<div id="flashFail">

										<p>Sorry, this content needs the <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a> to be viewed.</p>

										<p>If viewing this on a mobile or tablet device please visit the site on desktop to see this content in full.</p>

									</div>

								</div>
								<span id="videoTitle" itemprop="name"><?php echo $swfTitle; ?></span>
								<meta itemprop="thumbnailUrl" content="" />
								<div id="htmlBanner">
									<iframe width="0" height="0" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" name="" src="about:blank"></iframe>
								</div>
								<p class="desc" itemprop="description"><?php echo $swfdescription; ?></p>
								<script>
								$(function() {
									$('#flashBanner').flash({
										swf: '<?php echo $swf; ?>',
										width: '<?php echo $swfwidth; ?>',
										height: '<?php echo $swfheight; ?>'
									});
								});
								</script>
								<?php
										}
									}
								}
								?>
							</div>

							<?php
								$swfentries = get_post_meta( get_the_ID(), '_cmbdigitalswf_digitalswf', true );
								$count++;
								foreach ( (array) $swfentries as $swfentry ) {
									if ($count++ > 1)   {
							?>

							<div class="additional flashbanner">

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

								<?php
									}
								?>

								</p>
							</div>
							<?php
									break;
									}
								}
							?>

					</div>

					<script>
					$(function() {
						$('.selector').first().addClass('selected');
						$('.additional').find('a[data-swf*="html"]').on('click', function(){
							//window.open($(this).data('swf'), '_blank');
							$('#flashBanner').flash().remove();
							$('.flashBanner .desc').html($(this).data('description'));
							$('#htmlBanner iframe').attr('width', $(this).data('width')).attr('height', $(this).data('height')).attr('src', $(this).data('swf'));
							$('.selector').removeClass('selected');
							$(this).addClass('selected');
						});
						$('.additional').find('a[data-swf*="swf"]').on('click', function(){
							$('#flashBanner').flash({
								swf: $(this).data('swf'),
								width: $(this).data('width'),
								height: $(this).data('height')
							});
							$('#htmlBanner').empty();
							$('.selector').removeClass('selected');
							$(this).addClass('selected');
							$('.flashBanner .desc').html($(this).data('description'));
						});
					});
					</script>

<?php
		}
	}
}
?>