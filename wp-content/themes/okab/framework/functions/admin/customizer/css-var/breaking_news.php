<?php
/**
 * Genirated CSS
 *
 * @package PHP-CSS
 * @subpackage general
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */
/**
 * dima_news_title_bg
 * dima_news_title_text_color
 * dima_news_text_bg
 * dima_news_text_color
 */
?>
<?php if ( dima_helper::dima_get_option( 'dima_news_display' ) ) { ?>


	.dima-breaking-news .dima-breaking-news-title,
	.dima-breaking-news .side-color{
	background:<?php echo esc_attr( $dima_news_title_bg ) ?>;
	}
	.dima-breaking-news{
	background:<?php echo esc_attr( $dima_news_text_bg ) ?>;
	}
	.dima-breaking-news .dima-breaking-news-title:after{
	<?php if ( is_rtl() ) {
		?>border-right-color:<?php echo esc_attr( $dima_news_title_bg ) ?>;<?php
	} else {
		?>border-left-color:<?php echo esc_attr( $dima_news_title_bg ) ?>;<?php
	} ?>

	}
	.dima-breaking-news ul.slides li a{
	color:<?php echo esc_attr( $dima_news_text_color ) ?>;
	}
	.dima-breaking-news .dima-breaking-news-title span{
	color:<?php echo esc_attr( $dima_news_title_text_color ) ?>;
	}
<?php } ?>