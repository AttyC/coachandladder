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
?>
p{}
p, html{
<?php echo get_font_family_and_weight( $var_body_font_family, $var_body_font_weight_selected ) ?>
font-size:<?php echo esc_attr( $var_body_font_size ); ?>px;
color:<?php echo esc_attr( $var_body_text_color ) ?>;
}
h1, h2, h3, h4, h5, h6, .posted_in label{
<?php
echo get_font_family_and_weight( $var_heading_font_family, $var_heading_font_selected )
?>
color:<?php echo esc_attr( $var_heading_font_color ) ?>;
letter-spacing:<?php echo esc_attr( $var_heading_letter_spacing ); ?>px;
<?php echo esc_attr( $var_heading_font_uppercase ); ?>;
}

h1 a,h2 a,h3 a,h4 a,h5 a,h6 a,.posted_in label a{
color:<?php echo esc_attr( $var_heading_font_color ) ?>;
}

<?php
//Main color
if ( ! empty( $var_main_color ) ) {
	?>

    .tagcloud a:hover, .tags a:hover{
    background-color: <?php echo esc_attr( $var_main_color ) ?>;
    border: 1px solid <?php echo esc_attr( $var_main_color ) ?>;
    }
    .boxed-blog article .post-meta a:hover,
    .boxed-blog .post .post-meta a:hover,
    .hr-start i, .hr-end i,
    .topaz-line{
    color:<?php echo esc_attr( $var_main_color ) ?>;
    }
    .search-box input,
    .search-box{
    background-color:<?php echo esc_attr( $var_main_color ) ?>;
    box-shadow: none;
    }
    form input[type="search"]:focus, form input[type="text"]:focus, form input[type="email"]:focus, form input[type="date"]:focus, form input[type="password"]:focus, form input[type="url"]:focus, form input[type="tel"]:focus, form textarea:focus {
    border-color: <?php echo esc_attr( $var_main_color ) ?> !important;
    -webkit-box-shadow: 0.3em 0em 0em 0em <?php echo esc_attr( $var_main_color ) ?> inset;
    box-shadow: 0.3em 0em 0em 0em <?php echo esc_attr( $var_main_color ) ?> inset;
    }
    .pagination .current, .pagination .current-page, .dima-pagination .current, .dima-pagination .current-page,
    .pagination ul li>span:hover, .pagination ul li a:hover, .dima-pagination ul li>span:hover, .dima-pagination ul li a:hover {
    background: <?php echo esc_attr( $var_main_color ) ?>;
    border: 1px solid <?php echo esc_attr( $var_main_color ) ?>;
    color: #FFFFFF;
    }
    .dima-link{
    background-color: <?php echo esc_attr( $var_main_color ) ?>
    }

    ul.dima-accordion.dima-acc-separated .dima-accordion-group .dima-accordion-header .dima-accordion-toggle,
    ul.dima-accordion.dima-acc-sample .dima-accordion-group .dima-accordion-header .dima-accordion-toggle {
    border-color:<?php echo esc_attr( $var_main_color ) ?>;
    }
    ul.dima-accordion .dima-accordion-group .dima-accordion-header .dima-accordion-toggle {
    background-color: <?php echo esc_attr( $var_main_color ) ?>
    }
    ul.dima-accordion.dima-acc-janobi .dima-accordion-header .dima-accordion-toggle:before {
    background: <?php echo esc_attr( $var_main_color ) ?>;
    border: 1px solid <?php echo esc_attr( $var_main_color ) ?>;
    }
    ul.dima-accordion.dima-acc-clear .dima-accordion-group .dima-accordion-header .dima-accordion-toggle:before{
    color: <?php echo esc_attr( $var_main_color ) ?>;
    }

    .widget .button,[type="submit"],.dima-button{
    background-color: <?php echo esc_attr( $var_main_color ) ?>
    }
    .stroke {
    color: <?php echo esc_attr( $var_main_color ) ?>;
    border: 1px solid <?php echo esc_attr( $var_main_color ) ?>;
    }
    .fill:hover {
    background-color: <?php echo esc_attr( $var_main_color ) ?>;
    opacity: .9;
    }
    .stroke[data-direction="start"]:hover:after,
    .stroke[data-direction="end"]:hover:after
    .stroke[data-direction="up"]:hover:after,
    .stroke[data-direction="down"]:hover:after{
    background-color: <?php echo esc_attr( $var_main_color ) ?>
    }
    blockquote,
    .dima-tab-line-style .dima-tab-nav .tab.active {
    border-color: <?php echo esc_attr( $var_main_color ) ?> !important;
    }
    .dropcap.dropcap-3,
    .dropcap.dropcap-2{
    background-color: <?php echo esc_attr( $var_main_color ) ?>
    }
    .dropcap.dropcap-1{
    color: <?php echo esc_attr( $var_main_color ) ?>
    }
    .dima-iconbox:hover .icon-box-header i.icon-box-hover {
    color: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .features-box.background-hover:hover{
    background: <?php echo esc_attr( $var_main_color ) ?> !important;
    -webkit-box-shadow: 0 0 0 1px <?php echo esc_attr( $var_main_color ) ?>;
    box-shadow: 0 0 0 1px <?php echo esc_attr( $var_main_color ) ?>;
    }
    .dima-iconbox:hover i.box-square.icon-box-hover, .dima-iconbox:hover i.box-circle.icon-box-hover{
    background: <?php echo esc_attr( $var_main_color ) ?> !important;
    }
    .overlay:before{
    background-color: <?php echo esc_attr( $var_main_color ) ?>
    }
    .social-media li:hover {
    border: 1px solid <?php echo esc_attr( $var_main_color ) ?>;
    background: <?php echo esc_attr( $var_main_color ) ?>;
    }
    ul.list-style li:before{
    color: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .dima-pricing-table .dima-pricing-col.featured-larg .dima-pricing-row, .dima-pricing-table .dima-pricing-col.featured .dima-pricing-row {
    color: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .dima-pricing-table .dima-pricing-col.featured-larg .header,
    .dima-pricing-table .dima-pricing-col.featured .header {
    background-color: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .dima-testimonial blockquote:before{
    color: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .dima-testimonial.dima-theme-testimonial blockquote {
    background: <?php echo esc_attr( $var_main_color ) ?>;
    border-color: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .dima-testimonial.dima-theme-testimonial.quote-start-bottom:after,
    .dima-testimonial.dima-theme-testimonial.quote-start-bottom:before,
    .dima-testimonial.dima-theme-testimonial.quote-end-bottom:after,
    .dima-testimonial.dima-theme-testimonial.quote-end-bottom:before,
    .dima-testimonial.dima-theme-testimonial.quote-bottom-center-arrow:after,
    .dima-testimonial.dima-theme-testimonial.quote-bottom-center-arrow:before {
    border-top-color: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .dima-timeline article:hover .dima-custom-heading a,
    .dima-timeline article:hover .dima-custom-heading i,
    .dima-timeline article:hover h5 a,
    .dima-timeline article:hover h5 i,
    .dima-timeline .timeline_element-content:hover .dima-custom-heading a,
    .dima-timeline .timeline_element-content:hover .dima-custom-heading i,
    .dima-timeline .timeline_element-content:hover h5 a,
    .dima-timeline .timeline_element-content:hover h5 i {
    color: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .dima-timeline article:hover:after,
    .dima-timeline .timeline_element-content:hover:after {
    background: <?php echo esc_attr( $var_main_color ) ?>; !important;
    }
    mark.dima-mark {
    background-color: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .dima-product-content .star-rating:before,
    .woocommerce-page .star-rating:before,
    .woocommerce .star-rating:before,
    .dima-product-content .star-rating span:before,
    .woocommerce-page .star-rating span:before,
    .woocommerce .star-rating span:before {
    color: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .ui-slider .ui-slider-range {
    background: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .ui-slider .ui-slider-handle {
    background: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .products-grids .dima-product .onsale:after,
    .products-list .dima-product .onsale:after{
    border-top-color:<?php echo esc_attr( $var_main_color ) ?>;
    }
    .mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-handle,
    .mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-current,
    .mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-total,
    .mejs-controls .mejs-time-rail .mejs-time-current,
    .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current{
    background: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .mejs-controls .mejs-time-rail .mejs-time-float{
    background: <?php echo esc_attr( $var_main_color ) ?>;
    border-color: <?php echo esc_attr( $var_main_color ) ?>;
    }
    .mejs-controls .mejs-time-rail .mejs-time-float-corner{
    border-color: <?php echo esc_attr( $var_main_color ) ?> transparent transparent transparent;
    }
    .spin-2{
    border-color: transparent <?php echo esc_attr( $var_main_color );
	echo esc_attr( $var_main_color );
	echo esc_attr( $var_main_color ) ?>;
    }
    ::selection {
    background-color: <?php echo esc_attr( $var_main_color ) ?>
    }
    ::-moz-selection {
    background: <?php echo esc_attr( $var_main_color ) ?>
    }

<?php }
//Main color end
?>

.widget-content ul.archif-posts li a,
.widget-content ul.categories-posts li a,
.boxed-blog .post .post-meta a{
color:<?php echo esc_attr( $var_body_text_color ) ?>;
}

a {
color:<?php echo esc_attr( $var_body_link_color ) ?>;
}

.widget-content ul.archif-posts li:hover > a,
.widget-content ul.categories-posts li:hover > a,
.widget-content ul.featured-posts li:hover h6,
.boxed-blog .post .post-meta a:hover,
a:hover{
color:<?php echo esc_attr( $var_body_link_color_hover ) ?>;
}

.boxed {
background-color : <?php echo esc_attr( $var_body_background_color ) ?>;
<?php if ( esc_url( $var_body_background_pattern ) != '' ) { ?>
    background: url(<?php echo esc_url( $var_body_background_pattern ) ?>) repeat fixed;
<?php } ?>
<?php if ( esc_url( $var_body_background_image ) != '' ) { ?>
    background: url(<?php echo esc_url( $var_body_background_image ) ?>) 0% 0% fixed;
    -webkit-background-size: cover !important;
    background-size: cover !important;
<?php } ?>
margin-top: <?php echo esc_attr( $var_boxed_margin ); ?>px;
margin-bottom: <?php echo esc_attr( $var_boxed_margin ); ?>px;
}


.container{
width: <?php echo esc_attr( $var_container_width ) ?>%;
max-width: <?php echo esc_attr( $var_container_max_width ) ?>px;
}

.boxed .dima-navbar-wrap.desk-nav.fixed .fix_nav,
.boxed .all_content{
max-width: <?php echo esc_attr( $var_container_max_width ) ?>px;
margin: 0 auto;
}

.boxed {
max-width: <?php echo esc_attr( $var_container_max_width ) ?>px;
}
.work-item:hover .link_overlay,
.dima-team-member:hover .link_overlay,
.post-img:hover .link_overlay,
.isotope-item .post-img:hover .link_overlay{
background:<?php echo esc_attr( $var_hover_overlay_bg ) ?>;
}

.work-item:hover .link_overlay ul a:hover,
.dima-team-member:hover .link_overlay ul a:hover,
.post-img:hover .link_overlay ul a:hover,
.dima-product:hover .link_overlay ul a:hover{
color:<?php echo esc_attr( $var_hover_overlay_bg ) ?>;
}