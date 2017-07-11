<?php
/**
 * @package Dima Framework
 * @subpackage views global
 * @version   1.0.0
 * @since     1.0.0
 * @author    PixelDima <info@pixeldima.com>
 */
if ( comments_open() || get_comments_number() ) :
	comments_template( '', true );
endif;