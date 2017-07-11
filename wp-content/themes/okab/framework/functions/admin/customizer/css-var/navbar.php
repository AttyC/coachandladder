<?php

$is_transparent  = dima_helper::dima_get_option( 'dima_header_navbar_transparent' ) == '1';
$is_custom_fonts = dima_helper::dima_get_option( 'dima_custom_font' ) == '1';
$is_text_logo    = dima_helper::dima_get_option( 'dima_header_logo' ) == '';
?>

<?php
/*!Without TOPBAR*/
?>
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav>li,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end>li{
height: <?php echo esc_attr( $var_nav_height ) ?>px;
line-height: <?php echo esc_attr( $var_nav_height ) ?>px;
}
<?php /*FIXED MENU */ ?>
.dima-navbar-wrap.desk-nav.fixed .dima-navbar nav .dima-nav-end > li,
.dima-navbar-wrap.desk-nav.fixed nav .dima-nav > li{
height: <?php echo esc_attr( $var_nav_height_after_shrink ) ?>px;
line-height: <?php echo esc_attr( $var_nav_height_after_shrink ) ?>px;
}

.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav > li:last-child > a,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end > li:last-child > a {
<?php if ( is_rtl() ) { ?>
    padding-left: 0;
<?php } else { ?>
    padding-right: 0;
<?php } ?>
}

.dima-navbar-wrap.desk-nav.fixed .dima-navbar nav .dima-nav-end .cart_wrapper .start-border:before{
height: <?php echo esc_attr( $var_nav_height_after_shrink ) - 30 ?>px !important;
}
.dima-navbar-wrap.desk-nav.dima-topbar-active{
height: <?php echo esc_attr( $var_nav_height ) + 34 ?>px !important;
}
.dima-navbar-wrap.desk-nav.dima-topbar-active.fixed{
height: <?php echo esc_attr( $var_nav_height_after_shrink ) + 34 ?>px !important;
}
.dima-navbar-wrap.desk-nav{
height: <?php echo esc_attr( $var_nav_height ) ?>px;
}
.dima-navbar-wrap.desk-nav.fixed{
height: <?php echo esc_attr( $var_nav_height_after_shrink ) ?>px !important;
}
.dima-navbar-wrap.desk-nav.dima-navbar-top {
height: auto !important;
}
<?php //Sub-menu ?>
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav > li > .sub-menu,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav > li .menu-full-width,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end > li > .sub-menu,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end > li .menu-full-width{
top: <?php echo esc_attr( $var_nav_height ) ?>px;
}
.dima-navbar-wrap.desk-nav.dima-navbar-center .dima-navbar .logo-cenetr .logo{
height: <?php echo esc_attr( $var_nav_height ) ?>px;
}
.dima-navbar-wrap.desk-nav.dima-navbar-center.fixed .logo-cenetr .logo{
height: <?php echo esc_attr( $var_nav_height_after_shrink ) ?>px;
}
<?php //Sub-menu ?>
.dima-navbar-wrap.desk-nav.fixed nav .dima-nav > li > .sub-menu,
.dima-navbar-wrap.desk-nav.fixed nav .dima-nav-end > li > .sub-menu{
top: <?php echo esc_attr( $var_nav_height_after_shrink ) ?>px;
}


<?php /*SHOP*/ ?>
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end .cart_wrapper .start-border:before{
<?php if ( $var_nav_height <= 35 ) { ?>
    height:0px;
<?php } else { ?>
    max-height :<?php echo esc_attr( $var_nav_height ) - 32 ?>px;
    height :<?php echo esc_attr( $var_nav_height ) - 32 ?>px;
<?php } ?>
}

.dima-navbar-wrap.desk-nav .dima-navbar.fix_nav.fixed nav .dima-nav-end .cart_wrapper .start-border:before{
<?php if ( $var_nav_height_after_shrink <= 35 ) { ?>
    height:0px;
<?php } else { ?>
    max-height :<?php echo esc_attr( $var_nav_height_after_shrink ) - 32 ?>px;
<?php } ?>
}

<?php /*!With TOPBAR*/ ?>

.dima-navbar-wrap.desk-nav.fixed.dima-topbar-active{
max-height: <?php echo esc_attr( $var_nav_height_after_shrink_with_topbar ) ?>px !important;
}

<?php /*NavBar Color*/ ?>
.mobile-nav.dima-navbar-wrap .dima-btn-nav,
.dima-navbar,
.dima-navbar-wrap.desk-nav .dima-navbar,
.dima-navbar-wrap.desk-nav .dima-navbar.dima-navbar-vertical,
.dima-navbar-wrap.desk-nav.dima-navbar-top .dima-navbar nav{
background-color:<?php echo esc_attr( $var_nav_font_Bg_color ) ?>;
}
.mobile-nav.dima-navbar-wrap .dima-btn-nav{
border: 1px solid <?php echo esc_attr( $var_nav_font_color ) ?>;;
color: <?php echo esc_attr( $var_nav_font_color ) ?>;;
}
.dima-navbar-wrap.desk-nav.dima-navbar-top .dima-navbar .dima-nav{
background-color:<?php echo esc_attr( $var_nav_logo_on_top_background_color ) ?>;
}

.dima-navbar-wrap.desk-nav .dima-navbar-transparent.dima-navbar{
background-color:<?php echo esc_attr( $var_transparent_nav_font_Bg_color ) ?>;
}

<?php if ( $is_text_logo ) { ?>
    .dima-navbar-wrap.desk-nav .dima-navbar a.dima-brand,
    .dima-navbar-wrap.mobile-nav .dima-navbar a.dima-brand
    {
	<?php echo get_font_family_and_weight( $var_logo_font_family, $var_logo_font_selcted ) ?>
    font-size:<?php echo esc_attr( $var_logo_font_size ); ?>px;
    line-height:<?php echo esc_attr( $var_logo_font_size ) + 2; ?>px;
    letter-spacing:<?php echo esc_attr( $var_logo_letter_spacing ); ?>px;
	<?php echo esc_attr( $var_logo_font_uppercase ); ?>;
    color:<?php echo esc_attr( $var_logo_font_color ) ?>;
    }

    .dima-navbar-wrap.mobile-nav .dima-navbar a.dima-brand
    {
    line-height:90px;
    color:<?php echo esc_attr( $var_logo_font_color ) ?> !important;

    }
<?php } ?>
.mobile-nav.dima-navbar-wrap .dima-navbar nav .dima-nav>li>a,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav > li > a,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end > li > a{
color:<?php echo esc_attr( $var_nav_font_color ) ?>;
}
.dima-navbar-wrap.desk-nav .fix_nav,
.dima-navbar-wrap.desk-nav .dima-navbar-transparent.fix_nav{
background-color:<?php echo esc_attr( $var_nav_font_Bg_color_after ) ?>;
}

<?php // Transparent Menu?>

<?php if ( $is_transparent ) { ?>
    .dima-navbar-wrap.desk-nav .dima-navbar-transparent.dima-navbar .dima-nav > li > a,
    .dima-navbar-wrap.desk-nav .dima-navbar-transparent.dima-navbar .dima-nav-end > li > a {
    color:<?php echo esc_attr( $var_transparent_nav_font_text_color ) ?>;
    }

    .dima-navbar-wrap.desk-nav .dima-navbar-transparent.dima-navbar a.dima-brand,
    .dima-navbar-wrap.mobile-nav .dima-navbar-transparent.dima-navbar a.dima-brand
    {
    color:<?php echo esc_attr( $var_transparent_nav_font_text_color ) ?>;
    }

    .dima-navbar-wrap.desk-nav .dima-navbar-transparent.fix_nav.dima-navbar a.dima-brand,
    .dima-navbar-wrap.mobile-nav .dima-navbar-transparent.fix_nav.dima-navbar a.dima-brand,
    .dima-navbar-wrap.desk-nav .dima-navbar-transparent.fix_nav .dima-nav > li > a,
    .dima-navbar-wrap.desk-nav .dima-navbar-transparent.fix_nav .dima-nav-end > li > a{
    color:<?php echo esc_attr( $var_nav_font_color_after ) ?>
    }
<?php } ?>
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav > li > a,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end > li > a{
<?php echo esc_attr( $var_nav_font_uppercase ) ?>;
}

<?php /*TOPBAR Color*/ ?>
.dima-topbar{
background-color: <?php echo esc_attr( $var_nav_topbar_bg ) ?>;
}
.dima-topbar,
.dima-topbar li a,
.dima-topbar .card a,
.dima-topbar i{
color: <?php echo esc_attr( $var_nav_topbar_color ) ?>;
}

<?php /*Menu Color*/ ?>
.mobile-nav.dima-navbar-wrap .dima-navbar nav .dima-nav-end>li>a:hover,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav > li > a:hover,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav > li.active > a,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end > li > a:hover{
color:<?php echo esc_attr( $var_nav_font_color_hover ) ?>;
}

<?php /*SubMenu*/ ?>
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav .sub-menu,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end .sub-menu{
background-color:<?php echo esc_attr( $var_submenu_bg_color ) ?>;
}

.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav .sub-menu a,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end .sub-menu a{
color:<?php echo esc_attr( $var_submenu_text_color ) ?>;
}

.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav .sub-menu a:hover,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end .sub-menu a:hover{
color:<?php echo esc_attr( $var_submenu_text_hover_color ) ?>;
}
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav .sub-menu,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end .sub-menu{
box-shadow: 0 3px 5px rgba(0,0,0,0.25),inset 0 2px 0px <?php echo esc_attr( $var_submenu_text_hover_color ) ?>;
}
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav > li > .sub-menu .sub-menu,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav > li .menu-full-width .sub-menu,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end > li > .sub-menu .sub-menu,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end > li .menu-full-width .sub-menu{
<?php if ( is_rtl() ) { ?>
    -webkit-box-shadow: 0 3px 5px rgba(0, 0, 0, 0.25), inset 2px 0px 0px <?php echo esc_attr( $var_submenu_text_hover_color ) ?>;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.25), inset 2px 0px 0px <?php echo esc_attr( $var_submenu_text_hover_color ) ?>;
<?php } else { ?>
    -webkit-box-shadow: 0 3px 5px rgba(0, 0, 0, 0.25), inset -2px 0px 0px <?php echo esc_attr( $var_submenu_text_hover_color ) ?>;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.25), inset -2px 0px 0px <?php echo esc_attr( $var_submenu_text_hover_color ) ?>;

<?php } ?>
}


<?php /*Navbar menu */ ?>
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav > li > a,
.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end > li > a{
<?php /*Navbar menu and submenu*/ ?>
<?php echo get_font_family_and_weight( $var_nav_font_family, $var_nav_font_slected ) ?>
font-size:<?php echo esc_attr( $var_nav_font_size ); ?>px;
line-height:<?php echo esc_attr( $var_nav_font_size ) + 2; ?>px;
}
<?php /*Topbar font family*/ ?>
<?php if ( $is_custom_fonts ) { ?>
    .dima-topbar,
    .header-vertical.text-center{
	<?php echo get_font_family_and_weight( $var_nav_font_family, '' ) ?>
    }
<?php } ?>

<?php
/*LOGO dima_header_logo */
?>
.dima-navbar-wrap.desk-nav .dima-navbar .logo img{
width:    <?php echo esc_attr( $var_header_logo_width ) ?>px;
}

.mobile-nav.dima-navbar-wrap .dima-navbar nav .dima-nav-end .badge-number,
.dima-navbar-wrap.desk-nav .dima-navbar nav .badge-number{
background:<?php echo esc_attr( $var_nav_font_color_hover ) ?>;
}