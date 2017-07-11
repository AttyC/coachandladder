<?php

/**
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
$n = dima_footer_widget_areas_count();
?>

<!-- TOP FOOTER -->
<?php if ( $n != 0 ) : ?>
	<div class="top-footer">
		<div class="container">
			<div class="ok-row">
				<?php
				$clm = 12;
				if ( $n == 2 ) {
					$clm = 6;
				} elseif ( $n == 3 ) {
					$clm = 4;
				} elseif ( $n == 4 ) {
					$clm = 3;
				}
				$i = 0;
				while ( $i < $n ) : $i ++;

					echo '<div class="ok-md-' . intval( esc_attr( $clm ) ) . ' ok-xsd-12 ok-sd-6 dima-widget">';
					dynamic_sidebar( 'footer-' . $i );
					echo '</div>';

				endwhile;

				?>
			</div>
		</div>
	</div>
<?php endif; ?>

<!--! TOP FOOTER -->