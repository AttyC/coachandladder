<?php /* Footer Widget*/ ?>

.top-footer .widget .widget-title{
color: <?php echo esc_attr( $var_widget_header_color ); ?>;
font-size: <?php echo esc_attr( $var_widget_header_text_size ); ?>px;
<?php echo esc_attr( $var_widget_header_uppercase ); ?>;
}

.widget.widget_recent_entries a:hover,
.widget.widget_categories a:hover,
.widget.widget_meta a:hover,
.widget.widget_layered_nav a:hover,
.widget.widget_nav_menu a:hover,
.widget.widget_archive a:hover,
.widget.widget_pages a:hover,
.widget.twitter-widget a:hover,
.widget.widget_rss a:hover,
.widget.widget_product_categories a:hover,
.widget.widget_recent_comments a:hover{
color:<?php echo esc_attr( $var_body_link_color_hover ) ?>;
}

.top-footer .widget,.top-footer .widget p{
font-size: <?php echo esc_attr( $var_widget_body_text_size ); ?>px;
color: <?php echo esc_attr( $var_widget_body_color ); ?>;
<?php echo esc_attr( $var_widget_body_uppercase ); ?>;
}
.top-footer .widget_shopping_cart_content .amount,
.top-footer .widget_shopping_cart_content .product-title,
.top-footer .product_list_widget .amount,
.top-footer .product_list_widget .product-title{
color: <?php echo esc_attr( $var_widget_link_color ); ?>;
}
.top-footer p{
color: <?php echo esc_attr( $var_widget_body_color ); ?>;
}

.top-footer .widget li .post-date{
color: <?php echo esc_attr( $var_widget_body_color ); ?>;
}
.top-footer .widget .product_list_widget li,
.top-footer .widget.widget_recent_entries ul li,
.top-footer .widget.widget_recent_entries ol li,
.top-footer .widget.widget_categories ul li,
.top-footer .widget.widget_categories ol li,
.top-footer .widget.widget_meta ul li,
.top-footer .widget.twitter-widget ul li,
.top-footer .widget.widget_meta ol li,
.top-footer .widget.widget_rss ul li,
.top-footer .widget.widget_layered_nav ul li,
.top-footer .widget.widget_layered_nav ol li,
.top-footer .widget.widget_nav_menu ul li,
.top-footer .widget.widget_nav_menu ol li,
.top-footer .widget.widget_archive ul li,
.top-footer .widget.widget_archive ol li,
.top-footer .widget.widget_pages ul li,
.top-footer .widget.widget_pages ol li,
.top-footer .widget.widget_product_categories ul li,
.top-footer .widget.widget_product_categories ol li,
.top-footer .widget.widget_recent_comments ul li,
.top-footer .widget.widget_recent_comments ol li{
border-top: 1px solid <?php echo esc_attr( $var_widget_border_color ); ?>;
}
.top-footer .widget ul li a, .top-footer .widget ol li a{
color: <?php echo esc_attr( $var_widget_link_color ); ?>;
}
<?php /* sidebar Widget*/ ?>

.dima-sidebar .widget .widget-title{
font-size : <?php echo esc_attr( $var_widget_sidebar_header_text_size ); ?>px;
<?php echo esc_attr( $var_widget_sidebar_header_uppercase ); ?>;
}

.dima-sidebar .widget,.widget_tag_cloud .tagcloud a, .widget_product_tag_cloud .tagcloud a{
font-size: <?php echo esc_attr( $var_widget_sidebar_body_text_size ); ?>px;
<?php echo esc_attr( $var_widget_sidebar_body_uppercase ); ?>;
}