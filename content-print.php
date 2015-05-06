
						<?php
						$entries = get_post_meta( get_the_ID(), '_cmbprint_print', true );

						foreach ( (array) $entries as $key => $entry ) {

						    $title = $description = $image = '';

						    if ( isset( $entry['title'] ) )
						        $title = esc_html( $entry['title'] );

						    if ( isset( $entry['description'] ) )
						        $description = esc_html( $entry['description'] );

						    if ( isset( $entry['image'] ) )
						        $image = esc_html( $entry['image']);

						?>

						<div class="image" itemscope itemtype="http://schema.org/ImageObject">

							<span id="imageTitle" itemprop="name"><?php echo $title; ?></span>

							<img src="<?php echo $image; ?>"  class="scale-with-grid" alt="<?php echo $title; ?>" itemprop="contentURL" />

							<p class="desc" itemprop="description"><?php echo $description; ?></p>

						</div>

						<?php } ?>