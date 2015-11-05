
					<div class="dav">

						<div class="videoPlay">

						<?php
						$entries = get_post_meta( get_the_ID(), '_cmbdav_dav', true );

						$first = true;

						foreach ( (array) $entries as $key => $entry ) {

						    $dtitle = $ddescription = $dmp4 = $dwebm = $dogg = $dposter = $dwidth = $dheight = '';

						    if ( isset( $entry['dtitle'] ) )
						        $dtitle = esc_html( $entry['dtitle'] );

						    if ( isset( $entry['ddescription'] ) )
						        $ddescription = $entry['ddescription'];

						    if ( isset( $entry['dmp4'] ) )
						        $dmp4 = esc_html( $entry['dmp4']);

						    if ( isset( $entry['dwebm'] ) )
						        $dwebm = esc_html( $entry['dwebm']);

						    if ( isset( $entry['dogg'] ) )
						        $dogg = esc_html( $entry['dogg']);

						    if ( isset( $entry['dimage'] ) )
						        $dposter = esc_html( $entry['dimage']);

						    if ( isset( $entry['dmin'] ) )
						        $dmin = esc_html( $entry['dmin']);

						    if ( isset( $entry['dsec'] ) )
						        $dsec = esc_html( $entry['dsec']);

						    if ( isset( $entry['dwidth'] ) )
						        $dwidth = esc_html( $entry['dwidth']);

						    if ( isset( $entry['dheight'] ) )
						        $dheight = esc_html( $entry['dheight']);

							if ($key == 0) {
						?>

							<div id="videoWrapper" itemprop="video" itemscope itemtype="http://schema.org/VideoObject" data-width="<?php echo $dwidth; ?>" data-height="<?php echo $dheight; ?>">
								<span id="videoTitle" itemprop="name"><?php echo $dtitle; ?></span>
								<meta itemprop="thumbnailUrl" content="<?php echo $dposter; ?>" />
								<meta itemprop="embedURL" content="<?php echo $dmp4; ?>" />
								<meta itemprop="duration" content="T<?php if($dmin==''){echo '0';}else{echo $dmin;} ?>M<?php echo $dsec; ?>S" />
								<video id="wonderlandPlayerDigital" class="video-js vjs-default-skin vjs-big-play-centered" controls loop width="<?php echo $dwidth; ?>" height="<?php echo $dheight; ?>" poster="<?php echo $dposter; ?>"><source src="<?php echo $dmp4; ?>" type="video/mp4" /><source src="<?php echo $dwebm; ?>" type="video/webm" /><source src="<?php echo $dogg; ?>" type="video/ogg" /><p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p></video>
							</div><!--videoWrapper-->

							<p class="desc" itemprop="description"><?php echo $ddescription; ?></p>

						<?php
							}
						}
						?>

						</div>

						<?php
							$swfentries = get_post_meta( get_the_ID(), '_cmbdav_dav', true );
							$count++;
							foreach ( (array) $entries as $entry ) {
								if ($count++ > 1)   {
						?>
						<div class="additional davplayer">

							<h2>Additional formats</h2>

							<p>
								<?php
								$entries = get_post_meta( get_the_ID(), '_cmbdav_dav', true );

								foreach ( (array) $entries as $key => $entry ) {

									$dtitle = $ddescription = $dmp4 = $dwebm = $dogg = $dposter = $dwidth = $dheight = '';

								    if ( isset( $entry['dtitle'] ) )
								        $dtitle = esc_html( $entry['dtitle'] );

								    if ( isset( $entry['ddescription'] ) )
								        $ddescription = $entry['ddescription'];

								    if ( isset( $entry['dmp4'] ) )
								        $dmp4 = esc_html( $entry['dmp4']);

								    if ( isset( $entry['dwebm'] ) )
								        $dwebm = esc_html( $entry['dwebm']);

								    if ( isset( $entry['dogg'] ) )
								        $dogg = esc_html( $entry['dogg']);

								    if ( isset( $entry['dimage'] ) )
								        $dposter = esc_html( $entry['dimage']);

								    if ( isset( $entry['dmin'] ) )
								        $dmin = esc_html( $entry['dmin']);

								    if ( isset( $entry['dsec'] ) )
								        $dsec = esc_html( $entry['dsec']);

								    if ( isset( $entry['dwidth'] ) )
								        $dwidth = esc_html( $entry['dwidth']);

								    if ( isset( $entry['dheight'] ) )
								        $dheight = esc_html( $entry['dheight']);

								?>
								<a class="selector" data-title="<?php echo $dtitle; ?>" data-mp4="<?php echo $dmp4; ?>" data-webm="<?php echo $dwebm; ?>" data-ogg="<?php echo $dogg; ?>" data-poster="<?php echo $dposter; ?>" data-description="<?php echo $ddescription; ?>" data-width="<?php echo $dwidth; ?>" data-height="<?php echo $dheight; ?>" data-min="<?php if($dmin==''){echo '0';}else{echo $dmin;} ?>" data-sec="<?php echo $dsec; ?>"><?php echo $dtitle; ?></a>

								<?php } ?>
							</p>

						</div>
						<?php
								break;
								}
							}
						?>

					</div>