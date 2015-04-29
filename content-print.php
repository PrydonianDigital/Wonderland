					<div class="line-break"></div>

					<h3>Print</h3><a class="anchor" id="print"></a>

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

						<div class="image">

							<img src="<?php echo $image; ?>"  class="scale-with-grid" alt="<?php echo $title; ?>" />

							<p class="desc"><?php echo $description; ?>

						</div>

						<?php } ?>