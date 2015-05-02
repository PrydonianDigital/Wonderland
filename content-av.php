					<div class="av">

						<div class="videoPlay">

						<?php
						$entries = get_post_meta( get_the_ID(), '_cmbav_av', true );

						$first = true;

						foreach ( (array) $entries as $key => $entry ) {

						    $title = $description = $mp4 = $webm = $ogg = $poster = '';

						    if ( isset( $entry['title'] ) )
						        $title = esc_html( $entry['title'] );

						    if ( isset( $entry['description'] ) )
						        $description = esc_html( $entry['description'] );

						    if ( isset( $entry['mp4'] ) )
						        $mp4 = esc_html( $entry['mp4']);

						    if ( isset( $entry['webm'] ) )
						        $webm = esc_html( $entry['webm']);

						    if ( isset( $entry['ogg'] ) )
						        $ogg = esc_html( $entry['ogg']);

						    if ( isset( $entry['image'] ) )
						        $poster = esc_html( $entry['image']);

							if ($key == 0) {
						?>

							<div id="videoWrapper" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
								<span id="videoTitle" itemprop="name"><?php echo $title; ?></span>
								<meta itemprop="thumbnailUrl" content="<?php echo $poster; ?>" />
								 <meta itemprop="embedURL" content="<?php echo $mp4; ?>" />
								<video id="wonderlandPlayer" class="video-js vjs-default-skin vjs-big-play-centered" controls width="auto" height="auto" poster="<?php echo $poster; ?>"><source src="<?php echo $mp4; ?>" type="video/mp4" /><source src="<?php echo $webm; ?>" type="video/webm" /><source src="<?php echo $ogg; ?>" type="video/ogg" /><p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p></video>
							</div><!--videoWrapper-->

							<p class="desc" itemprop="description"><?php echo $description; ?></p>

						<?php
							}
						}
						?>

						</div>

						<?php
							$entries = get_post_meta( get_the_ID(), '_cmbav_av', true );
							foreach ( (array) $entries as $key => $entry ) {
								if ( $key < 1 ) {} else {
						?>
						<div class="additional">

							<h2>Additional formats</h2>

							<p>
								<?php
								$entries = get_post_meta( get_the_ID(), '_cmbav_av', true );

								foreach ( (array) $entries as $key => $entry ) {

									$title = $description = $mp4 = $webm = $ogg = $poster = '';

								    if ( isset( $entry['title'] ) )
								        $title = esc_html( $entry['title'] );

								    if ( isset( $entry['description'] ) )
								        $description = esc_html( $entry['description'] );

								    if ( isset( $entry['mp4'] ) )
								        $mp4 = esc_html( $entry['mp4']);

								    if ( isset( $entry['webm'] ) )
								        $webm = esc_html( $entry['webm']);

								    if ( isset( $entry['ogg'] ) )
								        $ogg = esc_html( $entry['ogg']);

								    if ( isset( $entry['image'] ) )
								        $poster = esc_html( $entry['image']);

								?>
								<a class="selector" data-title="<?php echo $title; ?>" data-mp4="<?php echo $mp4; ?>" data-webm="<?php echo $webm; ?>" data-ogg="<?php echo $ogg; ?>" data-poster="<?php echo $poster; ?>" data-description="<?php echo $description; ?>"><?php echo $title; ?></a>

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
						videojs('wonderlandPlayer', {});
						$('.av').on('click', '.selector', function(e){
							e.preventDefault();
							$('.selector').removeClass('selected');
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
								$desc		= $(this).data('description');
							var player = videojs('wonderlandPlayer');
							player.poster($poster);
							player.src(
								{ type: "video/mp4", src: $mp4 },
								{ type: "video/webm", src: $webm },
								{ type: "video/ogg", src: $ogg }
							);
						});
					});
					</script>