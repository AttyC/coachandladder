<?php
/**
 * Plugin site output
 */

require( DIMA_UNDER_CONSTRUCTION_PATH . '/functions/options.php' );
$allowed_tags   = array(
	'strong' => array(),
	'br'     => array(),
	'em'     => array(),
	'p'      => array( 'a' => true ),
	'a'      => array(
		'href'   => true,
		'target' => true,
		'title'  => true,
	)
);
$dima_copyright = dima_helper::dima_get_option( 'dima_footer_content_text' );

?>

<!DOCTYPE html>
<!--[if IE 9]>
<html class="no-js ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body>
<div id="bg-pattern"></div>
<div class="dima-uc-overlay">
	<div class="dima-uc-wrap-outer">
		<div class="dima-uc-wrap-inner">
			<div class="dima-uc">
				<h1><?php echo stripslashes( $dima_uc_heading ); ?></h1>
				<div class="dima-divider topaz-line"><i class="fa fa-stop"></i></div>
				<p><?php echo stripslashes( $dima_uc_subheading ); ?></p>
			</div>
			<div class="container page-section">
				<?php
				echo do_shortcode( html_entity_decode( $dima_uc_shortcodes ) );
				?>
			</div>

			<?php if ( isset( $dima_uc_social_enable ) && $dima_uc_social_enable == 1 ) : ?>
				<span class="dima-clear"></span>
				<div class="social-media text-center social-big">
					<ul class="inline clearfix">
						<?php dima_get_global_social(); ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if ( isset( $dima_uc_cpyright_enable ) && $dima_uc_cpyright_enable == 1 ) : ?>

				<div class="dima-clear" style="padding-bottom:30px"></div>
				<div class="text-center">
					<?php echo
					wp_kses( $dima_copyright, $allowed_tags );
					?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>