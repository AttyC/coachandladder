<?php
/**
 * Setup : NavTab
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

global $submenu;
$dima_menu_items = '';
if ( isset( $submenu['pixel-dima-dashboard'] ) ) {
	$dima_menu_items = $submenu['pixel-dima-dashboard'];
}
if ( is_array( $dima_menu_items ) ) {
	?>
	<div class="wrap about-wrap dima-admin-header ">
		<h2 class="nav-tab-wrapper">

			<?php
			foreach ( $dima_menu_items as $dima_menu_item ) {
				?>
				<a href="admin.php?page=<?php echo esc_attr( $dima_menu_item[2] ) ?>"
				   class="nav-tab <?php if ( isset( $_GET['page'] ) and $_GET['page'] == $dima_menu_item[2] ) {
					   echo 'nav-tab-active';
				   } ?> "><?php echo esc_attr( $dima_menu_item[0] ) ?></a>
				<?php
			}
			?>
		</h2>
	</div>
	<?php
}
?>