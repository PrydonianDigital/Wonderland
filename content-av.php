					<div class="av">

						<div class="line-break"></div>

						<h3>AV</h3><a class="anchor" id="av"></a>

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

						<div class="videoPlay" data-video="<?php echo $title; ?>">

							<div class="videoWrapper">

								<video id="player" class="video-js vjs-default-skin vjs-big-play-centered"
									controls preload="auto"
									width="auto" height="auto"
									poster="<?php echo $poster; ?>"
									data-setup=""
									data-video="<?php echo $title; ?>">
									<source src="<?php echo $mp4; ?>" type='video/mp4' />
									<source src="<?php echo $webm; ?>" type='video/webm' />
									<source src="<?php echo $ogg; ?>" type='video/ogg' />
									<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
								</video>

							</div><!--videoWrapper-->

							<p class="desc"><?php echo $description; ?></p>

						</div>

						<?php } ?>

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

								    $title = '';

								    if ( isset( $entry['title'] ) )
								        $title = esc_html( $entry['title'] );

								?>
								<a href="" class="selector" data-video="<?php echo $title; ?>"><?php echo $title; ?></a>

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