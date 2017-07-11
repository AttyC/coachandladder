<?php
/**
 * Theme setup settings.
 *
 * @package Dima Framework
 * @subpackage Admin Setup
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


function pixeldima_setup_demo_content() {
	$pixeldima_setup_path = DIMA_TEMPLATE_PATH . '/framework/functions/admin/pixeldima-setup';
	require_once( $pixeldima_setup_path . '/dima_nav_tab.php' );
	global $dima_demo_import_class;
	?>

    <div class="about-wrap pixeldima-demo-wrap">

    <div class="pixeldima-header-text">
        <header class="pixeldima-header">
            <h1><?php echo esc_html__( 'INSTALL OKAB DEMOS', 'okab' ); ?></h1>
            <div class="about-text">
				<?php echo esc_html__( 'OKAB brings you a number of unique designs for your website. Installing a demo provides pages, posts, images, theme options, widgets, sliders and more so you don’t have to create everything from scratch. Each demo is fully customizable (fonts, colors and layouts).Please check the \'System Status\' tab to ensure your server meets all requirements for a successful import.', 'okab' ); ?>
            </div>
        </header>

		<?php if ( isset( $error ) && is_string( $error ) ) { ?>
            <div class="error"><p><?php echo esc_attr( $error ) ?></p></div>
		<?php }

		$troubleshooting_info = '';

		if ( ! DIMA_REVOLUTION_SLIDER_IS_ACTIVE ) {
			$troubleshooting_info .= '<p><strong>' . esc_html__( 'Please note', 'okab' ) . ' : </strong>' . esc_html__( 'Since Revolution Slider is not currently active, any sliders used in our Expanded demos will not be setup. If you wish for these sliders to be setup, please ensure that you have Revolution Slider installed and activated.', 'okab' ) . '</p>';
		}
		?>
        <div class="troubleshooting"><?php echo html_entity_decode( $troubleshooting_info ); ?></div>

        <ul class="pixeldima-demos-list">
			<?php
			// 0: demo name
			// 1: demo alise
			// 2: preview url
			// 3: screenshot name
			// 4 Is home page : true ( if demo => false
			$demos = array(
				/*"okab"                    => array(
					"Okab",
					"okab",
					"http://themes.pixeldima.com/okab/",
					"screenshot",
					false
				),*/
				"okab-home-1"             => array(
					"Corporate Agency",
					"okab",
					"https://themes.pixeldima.com/okab/home-03",
					"corporate-agency",
					true
				),
				"okab-home-2"             => array(
					"Simple",
					"okab",
					"https://themes.pixeldima.com/okab/home-02",
					"simple",
					true
				),
				"okab-home-3"             => array(
					"Minimal Corporate",
					"okab",
					"https://themes.pixeldima.com/okab/home01",
					"minimal-corporate",
					true
				),
				"okab-home-4"             => array(
					"Classic",
					"okab",
					"https://themes.pixeldima.com/okab/home-04",
					"classic",
					true
				),
				"okab-home-5"             => array(
					"Digital Agency",
					"okab",
					"https://themes.pixeldima.com/okab/home-05",
					"digital-agency",
					true
				),
				"okab-home-6"             => array(
					"Company",
					"okab",
					"https://themes.pixeldima.com/okab/home-06",
					"company",
					true
				),
				"business"                => array(
					"Business",
					"business",
					"http://themes.pixeldima.com/okab/business/",
					"screenshot",
					false
				),
				"restaurant"              => array(
					"Restaurant",
					"restaurant",
					"http://themes.pixeldima.com/okab/restaurant/",
					"screenshot",
					false
				),
				"construction"            => array(
					"Construction",
					"construction",
					"http://themes.pixeldima.com/okab/construction/",
					"screenshot",
					false
				),
				"shop"                    => array(
					"Shop",
					"shop",
					"http://themes.pixeldima.com/okab/shop/",
					"screenshot",
					false
				),
				"vertical-shop"           => array(
					"Vertical Shop",
					"shop",
					"https://themes.pixeldima.com/okab/shop/vertical-shop/",
					"vertical-shop",
					true
				),
				"business_rtl"            => array(
					"Business (RTL)",
					"business_rtl",
					"http://themes.pixeldima.com/okab/business-rtl/",
					"screenshot",
					false
				),
				"business_finance"        => array(
					"Business Finance",
					"business_finance",
					"http://themes.pixeldima.com/okab/business-finance/",
					"screenshot",
					false
				),
				"business_finance-rtl"    => array(
					"Business Finance (RTL)",
					"business_finance_rtl",
					"http://themes.pixeldima.com/okab/business-finance-rtl/",
					"screenshot",
					false
				),
				"business_consulting"     => array(
					"Consulting",
					"business_finance",
					"http://themes.pixeldima.com/okab/business-finance/consulting",
					"consulting",
					true
				),
				"business_consulting_rtl" => array(
					"Consulting (RTL)",
					"business_finance_rtl",
					"http://themes.pixeldima.com/okab/business-finance-rtl/consulting",
					"consulting",
					false
				),
				"minimal_portfolio"       => array(
					"Minimal Portfolio",
					"minimal_portfolio",
					"http://themes.pixeldima.com/okab/minimal-portfolio/",
					"screenshot",
					false
				),
				"hosting"                 => array(
					"Hosting",
					"hosting",
					"http://themes.pixeldima.com/okab/hosting/",
					"screenshot",
					false
				),
				"magazine"                => array(
					"Magazine",
					"magazine",
					"http://themes.pixeldima.com/okab/magazine/",
					"screenshot",
					false
				),
				"minimal_blog"            => array(
					"Minimal Blog",
					"minimal_blog",
					"http://themes.pixeldima.com/okab/minimalblog/",
					"screenshot",
					false
				),
				"photography"             => array(
					"Photography",
					"photography",
					"http://themes.pixeldima.com/okab/photography/",
					"screenshot",
					false
				),
				"app"                     => array(
					"App",
					"app",
					"http://themes.pixeldima.com/okab/app/",
					"screenshot",
					false
				),
				"resume"                  => array(
					"Resume",
					"resume",
					"http://themes.pixeldima.com/okab/demo-resume/",
					"screenshot",
					false
				),
				"cosmetic"                => array(
					"Cosmetic",
					"cosmetic",
					"http://themes.pixeldima.com/okab/demo-cosmetic/",
					"screenshot",
					false
				),
			);
			// 0: demo name
			// 1: demo alise
			// 2: preview url
			// 3: screenshot name
			foreach ( $demos as $demo ) {
				$name        = $demo[0];
				$alise       = $demo[1];
				$preview_url = $demo[2];
				$screenshot  = $demo[3];
				$screenshot  = '/data/demos/' . sanitize_title( $alise ) . '/' . esc_attr( $screenshot ) . '.png';
				$dima_demo_import_class->dima_display_demo( $alise, $name, DIMA_TEMPLATE_URL . $screenshot, $preview_url );
			}

			$dima_demo_import_class->dima_display_soon_demo( DIMA_TEMPLATE_URL . '/data/soon.jpg' );
			?>
        </ul>

    </div>

	<?php
}

?>