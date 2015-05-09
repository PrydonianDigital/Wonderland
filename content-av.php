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
						        $description = $entry['description'];

						    if ( isset( $entry['mp4'] ) )
						        $mp4 = esc_html( $entry['mp4']);

						    if ( isset( $entry['webm'] ) )
						        $webm = esc_html( $entry['webm']);

						    if ( isset( $entry['ogg'] ) )
						        $ogg = esc_html( $entry['ogg']);

						    if ( isset( $entry['image'] ) )
						        $poster = esc_html( $entry['image']);

						    if ( isset( $entry['min'] ) )
						        $min = esc_html( $entry['min']);

						    if ( isset( $entry['sec'] ) )
						        $sec = esc_html( $entry['sec']);

							if ($key == 0) {
						?>

							<div id="videoWrapper" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
								<span id="videoTitle" itemprop="name"><?php echo $title; ?></span>
								<meta itemprop="thumbnailUrl" content="<?php echo $poster; ?>" />
								<meta itemprop="embedURL" content="<?php echo $mp4; ?>" />
								<meta itemprop="duration" content="T<?php if($min==''){echo '0';}else{echo $min;} ?>M<?php echo $sec; ?>S" />
								<video id="wonderlandPlayer" class="video-js vjs-default-skin vjs-big-play-centered" controls width="auto" height="auto" poster="<?php echo $poster; ?>"><source src="<?php echo $mp4; ?>" type="video/mp4" /><source src="<?php echo $webm; ?>" type="video/webm" /><source src="<?php echo $ogg; ?>" type="video/ogg" /><p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p></video>
							</div><!--videoWrapper-->

							<p class="desc" itemprop="description"><?php echo $description; ?></p>

						<?php
							}
						}
						?>

						</div>

						<?php
							$swfentries = get_post_meta( get_the_ID(), '_cmbav_av', true );
							$count++;
							foreach ( (array) $entries as $entry ) {
								if ($count++ > 1)   {
						?>
						<div class="additional avplayer">

							<h2>Additional formats</h2>

							<p>
								<?php
								$entries = get_post_meta( get_the_ID(), '_cmbav_av', true );

								foreach ( (array) $entries as $key => $entry ) {

									$title = $description = $mp4 = $webm = $ogg = $poster = '';

								    if ( isset( $entry['title'] ) )
								        $title = esc_html( $entry['title'] );

								    if ( isset( $entry['description'] ) )
								        $description = $entry['description'];

								    if ( isset( $entry['mp4'] ) )
								        $mp4 = esc_html( $entry['mp4']);

								    if ( isset( $entry['webm'] ) )
								        $webm = esc_html( $entry['webm']);

								    if ( isset( $entry['ogg'] ) )
								        $ogg = esc_html( $entry['ogg']);

								    if ( isset( $entry['image'] ) )
								        $poster = esc_html( $entry['image']);

								    if ( isset( $entry['min'] ) )
								        $min = esc_html( $entry['min']);

								    if ( isset( $entry['sec'] ) )
								        $sec = esc_html( $entry['sec']);

								?>
								<a class="selector" data-title="<?php echo $title; ?>" data-mp4="<?php echo $mp4; ?>" data-webm="<?php echo $webm; ?>" data-ogg="<?php echo $ogg; ?>" data-poster="<?php echo $poster; ?>" data-description="<?php echo $description; ?>" data-min="<?php if($min==''){echo '0';}else{echo $min;} ?>" data-sec="<?php echo $sec; ?>"><?php echo $title; ?></a>

								<?php } ?>
							</p>

						</div>
						<?php
								break;
								}
							}
						?>

					</div>