<?php
/**
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */

$is_related      = dima_helper::dima_get_option( 'dima_projects_related_display' );
$columns         = dima_helper::dima_get_option( 'dima_projects_related_columns' );
$count           = dima_helper::dima_get_option( 'dima_projects_related_count' );
$elm_hover       = dima_helper::dima_get_option( 'dima_projects_related_elm_hover' );
$img_hover       = dima_helper::dima_get_option( 'dima_projects_related_img_hover' );
$no_border       = ( dima_helper::dima_get_option( 'dima_projects_related_border' ) == '0' ) ? 'true' : 'false';
$portfolio_style = dima_helper::dima_get_option( 'dima_projects_related_style' );

?>
<?php if ( $is_related ) { ?>
	<section class="section related-portfolio">
		<div class="page-section-content">
			<div class="container page-section">
				<div class="portfolio-posts clearfix">
					<h3 class="related-portfolio-title"><?php esc_html_e( 'Related Projects', 'okab' ); ?></h3>
					<?php echo do_shortcode( '[related_portfolio column="' . esc_attr( $columns ) . '" no_border="' . esc_attr( $no_border ) . '" img_hover="' . esc_attr( $img_hover ) . '" elm_hover="' . esc_attr( $elm_hover ) . '" count="' . esc_attr( $count ) . '" portfolio_style="' . esc_attr( $portfolio_style ) . '" ]' ) ?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>