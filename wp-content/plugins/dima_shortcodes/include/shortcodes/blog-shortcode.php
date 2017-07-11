<?php
/*

Plugin Name: DIMA-Shortcodes
Plugin URI: http://pixeldima.com/
Version: 1.0.0
Author: PixelDima
Author URI: http://pixeldima.com/
Text Domain: dimashortcodes

*/


/**
 * Class and Function List:
 * Function list:
 * - dima_shortcode_blog()
 * Classes list:
 */


class DIMA_RecentPosts {
private $query = '';
private $is_paging = true;

public function __construct() {  
  add_shortcode( 'blog',array( $this, 'dima_shortcode_blog' ));
}

function dima_shortcode_blog( $atts ){
  
  extract( shortcode_atts( array(
    'id'               => '',
    'post_class'       => '',
    'style'            => '',
    'blog_style'       => 'standard',
    'count'            => 3,
    'column'           => 3,
    'show_meta'        => '',
    'img_hover'        => '',
    'elm_hover'        => '',
    'no_border'        => 'false',
    'words'            => '150',
    'items_margin'     => 30,
    'dark'             => '',
    'category'         => '',
    'tag'              => '',
    'offset'           => '' ,
    'paging'           => 'false',
    'order'            => '',
    'show_image'       => 'true'
  ) , $atts, 'blog' ) );

  $template      = dima_helper::dima_get_demo();
  $id            =( $id          != ''      ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $style         =( $style       != ''      ) ? 'style="' . $style . '"' : '';
  $post_class    =( $post_class  != ''      ) ? ' ' . esc_attr( $post_class ) : '';
  $category      =( $category    != ''      ) ? $category : '';
  $tag           =( $tag         != ''      ) ? $tag : '';
  $no_border     =( $no_border   != 'true'  ) ? 'false' : 'true';
  $elm_hover     =( $elm_hover   != ''      ) ? $elm_hover : '';
  $img_hover     =( $img_hover   != ''      ) ? $img_hover : '';
  $show_image    =( $show_image  == 'true'  ) ? true : false;
  $show_meta     =( $show_meta   == 'false' ) ? false : true;
  $paging        =( $paging      != 'true'  ) ? false : true;
  $words         =( $words       != ''      ) ? $words : '150';
  $column        =( $column      != ''      ) ? $column : 3;
  $count         =( $count       != ''      ) ? $count : 3;
  $order         =( $order       != ''      ) ? $order : '';
  $dark          = ( $dark == '' ) ? 'true' : $dark;

  $is_slide = false;

  $this->is_paging = $paging;
  if ($blog_style=='slide') {
    $blog_style ="grid";
    $is_slide = true;
  }
		if ( $dark == "true" ) {
			$dark = " owl-darck";
		} else {
			$dark = "";
		}

  if ($is_slide) {
    wp_enqueue_script( 'dima-owl' );
  }
  wp_enqueue_script( 'dima-flexslider' );

  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

  if($offset != '' && $paging == true)
  {$offset = ( $paged - $offset ) * $count;}

  switch ($order) {
    case 'top-view':
    $order_array = array(
      'meta_key' => 'dima_post_views_count',
      'orderby' => 'meta_value_num', 
      'order' => 'DESC');
      break;
    case 'popular':
    $order_array = array(
      'orderby' => 'comment_count',
      'order' => 'DESC');
      break;
    //Latest
    default:
      $order_array = array('orderby' => 'date');
    break;
  }

  //Search
  if(isset( $_GET['s'] )){
      $array_query =array(
        's'                 => "{$_GET['s']}",
        'paged'             => "{$paged}",
        'offset'            => "{$offset}",
        'category_name'     => "{$category}",
        'tag'               => "{$tag}",
      );
      $merge = array_merge($array_query, $order_array);
      $dima_query  = new WP_Query($merge);
  //Blog With page    
  }elseif ($paging) {
    $array_query=array(
        'post_type'         => "post",
        'posts_per_page'    => "{$count}",
        'paged'             => "{$paged}",
        'offset'            => "{$offset}",
        'category_name'     => "{$category}",
        'tag'               => "{$tag}",
    );
    $merge = array_merge($array_query, $order_array); 
    $dima_query  = new WP_Query($merge);
    $this->query = $dima_query;
  }else{
    $array_query = array(
        'post_type'         => "post",
        'posts_per_page'    => "{$count}",
        'offset'            => "{$offset}",
        'category_name'     => "{$category}",
        'tag'               => "{$tag}",
    );
    $merge = array_merge($array_query, $order_array); 
    $dima_query  = new WP_Query($merge);
    $this->query = $dima_query;
  }

  if(is_archive() && get_post_type() !="dima-portfolio"){
      global $wp_query;
      $dima_query  = $wp_query;
  }

  $ARG_ARRAY = array(
      'show_meta'   => $show_meta,
      'show_image'  => $show_image,
      'no_border'   => $no_border,
      'elm_hover'   => $elm_hover,
      'img_hover'   => $img_hover,
      'words'       => $words,
      'blog_style'  => $blog_style,
      'post_class'  => $post_class,
  );

  $clm = dima_get_clm($column);

  $POST_ARRAY = array(
      'template'      => $template,
      'blog_style'    => $blog_style,
      'is_slide'      => $is_slide,
      'column'        =>  $column,
      'clm'           =>  $clm,
      'count'         =>  $count,
      'pagination'    => 'true',
      'auto_play'     => 'true',
      'navigation'    => 'false',
      'loop'          => 'false',
      'mouse_wheel'   => 'false',
      'items'         => $column,
      'items_phone'   => '',
      'items_tablet'  => '',
      'items_margin'  => $items_margin,
      'dark'         => $dark,
  );

  ob_start();
    $this->Blog_Style($POST_ARRAY,$dima_query,$ARG_ARRAY);
  return ob_get_clean();
}

public function Blog_Style($POST_ARRAY,$wp_query,$ARG_ARRAY){
 if (empty($wp_query)) {
    $wp_query = new WP_Query(array('orderby' => 'date'));
  }
  if ($POST_ARRAY['blog_style'] !='') {
    $this->{$POST_ARRAY['blog_style']}($POST_ARRAY,$wp_query,$ARG_ARRAY);
  }else{
    $this->standard($POST_ARRAY,$wp_query,$ARG_ARRAY);
  }
}


/**
* @param $POST_ARRAY
* @param $wp_query
* @param $ARG_ARRAY
 */
function masonry($POST_ARRAY,$wp_query,$ARG_ARRAY){ 
   if (is_archive() || is_home() || (is_singular() && is_page())) {
       $ARG_ARRAY['post_class'].=" isotope-item";
   }
  ?>
    <div class="boxed-blog blog-list">
      <div id="dima-isotope-container" class="dima-isotope-container isotope masonry boxed-protfolio columns-<?php echo $POST_ARRAY['column']; ?>">
      <?php
         if ($wp_query ->have_posts()): 
           while ($wp_query ->have_posts()):
                 $wp_query->the_post();
                 dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content', get_post_format(),$ARG_ARRAY);
           endwhile; 
                //restore the original post data
                wp_reset_postdata();
           else: 
                dima_helper::dima_get_view('global', '_content-none'); 
           endif;
        ?>
      </div>
    </div>    
  <?php 
  if ($this->is_paging) {  
     ob_start();
     dima_pagination($wp_query);
     $pagination = ob_get_contents();
     ob_get_clean();
     echo $pagination;
   }
     wp_reset_query();
}

/**
* @param $POST_ARRAY
* @param $wp_query
* @param $ARG_ARRAY
 */
function timeline($POST_ARRAY,$wp_query,$ARG_ARRAY){
  ?>
  <div class="dima-timeline clearfix dima-timeline-blog boxed-blog blog-list">
  <div class="h-line"></div>
  <?php 
  if ($wp_query ->have_posts()): 
      $i = 2;      
      while ($wp_query ->have_posts()): $wp_query->the_post();
      if ($i %2 == 0): ?>
        <div class="timeline_element_start ">
        <?php else: ?>
          <div class="timeline_element_end ">
        <?php endif ?>      
        <?php dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content', get_post_format(),$ARG_ARRAY); ?>
      </div>
      <?php 
      $i++;
      endwhile;
      wp_reset_postdata(); 
      ?>
      </div>
      <?php      
      else: 
        dima_helper::dima_get_view('global', '_content-none');     
      endif; 
        if ($this->is_paging) {  
          ob_start();
          dima_pagination($wp_query);
          $pagination = ob_get_contents();
          ob_get_clean();
          echo $pagination;
        }
     wp_reset_query();
}


/**
* @param $POST_ARRAY
* @param $wp_query
* @param $ARG_ARRAY
 */
function search($POST_ARRAY,$wp_query,$ARG_ARRAY){
    ?><div class="boxed-blog blog-list"><?php 
    if ($wp_query ->have_posts()){
        while ($wp_query ->have_posts()):
            $wp_query->the_post(); 
            dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content','search',$ARG_ARRAY);
        endwhile;
        wp_reset_query();
        wp_reset_postdata(); 
    }else{ 
     dima_helper::dima_get_view('global', '_content-none');  
    } 
    ?></div><?php
    if ($this->is_paging) {  
          ob_start();
          dima_pagination($wp_query);
          $pagination = ob_get_contents();
          ob_get_clean();
          echo $pagination;
        }
     wp_reset_query();

}


/**
* @param $POST_ARRAY
* @param $wp_query
* @param $ARG_ARRAY
 */
function imageside($POST_ARRAY,$wp_query,$ARG_ARRAY){
    if (is_archive() || is_home() || (is_singular() && is_page())) {
            $ARG_ARRAY['post_class'].= "image-in-side";
    }     ?><div class="boxed-blog blog-list"><?php
    if ($wp_query ->have_posts()){
        while ($wp_query ->have_posts()):
            $wp_query->the_post();
            
            $format = get_post_format();
            if($format =="quote" || $format =="link" || $format =="audio"){
            dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content', get_post_format(),$ARG_ARRAY);
            }
			else{
			dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content', 'side-style',$ARG_ARRAY);
			}
        endwhile;
        wp_reset_postdata();
    }else{
     dima_helper::dima_get_view('global', '_content-none');
    }

    ?></div><?php
    if ($this->is_paging) {
          ob_start();
          dima_pagination($wp_query);
          $pagination = ob_get_contents();
          ob_get_clean();
          echo $pagination;
        }
     wp_reset_query();

}


/**
* @param $POST_ARRAY
* @param $wp_query
* @param $ARG_ARRAY
 */
function postslist_side($POST_ARRAY,$wp_query,$ARG_ARRAY){
    if (is_archive() || is_home() || (is_singular() && is_page())) {
            $ARG_ARRAY['post_class'].= "e-post";
    }  
    ?>
    <div class="horizontal-posts-list boxed-blog blog-list clearfix">
    <span class='split'></span>
    <?php 
    if ($wp_query ->have_posts()){ 
         $wp_query->the_post();
         ?><div class="main-post ok-md-6 ok-xsd-12"><?php
         dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content', get_post_format(),$ARG_ARRAY);
         ?></div>
         <ul class="posts-list ok-md-6 ok-xsd-12">
            <?php
            $ARG_ARRAY['post_class'] ='';
              while ($wp_query ->have_posts()):             
                  $wp_query->the_post(); 
                  dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content','list',$ARG_ARRAY);
              
              endwhile;
            ?>
         </ul>
        <?php
        wp_reset_postdata(); 
    }else{ 
     dima_helper::dima_get_view('global', '_content-none');  
    }
    ?>
    </div>
    <?php 
    if ($this->is_paging) {  
          ob_start();
          dima_pagination($wp_query);
          $pagination = ob_get_contents();
          ob_get_clean();
          echo $pagination;
        }
     wp_reset_query();

}

/**
* @param $POST_ARRAY
* @param $wp_query
* @param $ARG_ARRAY
 */
function postslist_grid($POST_ARRAY,$wp_query,$ARG_ARRAY){
    if (is_archive() || is_home() || (is_singular() && is_page())) {
            $ARG_ARRAY['post_class'].= "image-in-side";
    }     ?><div class="boxed-blog blog-list"><?php 
    ?>    
    <div class="grid-posts-list boxed-blog blog-list clearfix"><?php 
    if ($wp_query ->have_posts()){ 
         $wp_query->the_post(); 
         ?><div class="main-post ok-md-12"><?php
            dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content', 'side-style',$ARG_ARRAY);
         ?></div>
         <ul class="posts-list with-two-clm ok-md-12">
            <?php
            $ARG_ARRAY['post_class'] ='';
              while ($wp_query ->have_posts()):             
                  $wp_query->the_post(); 
                  dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content','list',$ARG_ARRAY);
              
              endwhile;
            ?>
         </ul>
        <?php
        wp_reset_postdata(); 
    }else{ 
     dima_helper::dima_get_view('global', '_content-none');  
    }
    ?>
    </div>
    </div>
    <?php 
    if ($this->is_paging) {  
          ob_start();
          dima_pagination($wp_query);
          $pagination = ob_get_contents();
          ob_get_clean();
          echo $pagination;
        }
     wp_reset_query();

}

/**
* @param $POST_ARRAY
* @param $wp_query
* @param $ARG_ARRAY
 */
function postslist($POST_ARRAY,$wp_query,$ARG_ARRAY){
    ?><div class="vertical-posts-list boxed-blog blog-list"><?php 
    if ($wp_query ->have_posts()){ 
         $wp_query->the_post();
         ?><div class="main-post"><?php
         dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content', get_post_format(),$ARG_ARRAY);
         ?></div>
         <ul class="posts-list">
        <?php
        while ($wp_query ->have_posts()):             
            $wp_query->the_post(); 
            dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content','list',$ARG_ARRAY);
        
        endwhile;
         ?>
         </ul>
        <?php
        wp_reset_postdata(); 
    }else{ 
     dima_helper::dima_get_view('global', '_content-none');  
    }
    ?></div><?php 
    if ($this->is_paging) {  
          ob_start();
          dima_pagination($wp_query);
          $pagination = ob_get_contents();
          ob_get_clean();
          echo $pagination;
        }
    wp_reset_query();
}

/**
* @param $POST_ARRAY
* @param $wp_query
* @param $ARG_ARRAY
 */
function smallpostslist($POST_ARRAY,$wp_query,$ARG_ARRAY){
    ?><div class="vertical-posts-list boxed-blog blog-list"><?php 
    if ($wp_query ->have_posts()){ 
         ?>
         <ul class="posts-list no-box with-border first">
        <?php
        while ($wp_query ->have_posts()):             
            $wp_query->the_post(); 
            dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content','list',$ARG_ARRAY);
        
        endwhile;
         ?>
         </ul>
        <?php
        wp_reset_postdata(); 
    }else{ 
     dima_helper::dima_get_view('global', '_content-none');  
    }
    ?></div><?php 
    if ($this->is_paging) {  
          ob_start();
          dima_pagination($wp_query);
          $pagination = ob_get_contents();
          ob_get_clean();
          echo $pagination;
        }
    wp_reset_query();
}

/**
* @param $POST_ARRAY
* @param $wp_query
* @param $ARG_ARRAY
 */
function news_in_images($POST_ARRAY,$wp_query,$ARG_ARRAY){
    ?>
    <div class="news-in-pic box clearfix">
    <div class="boxed-blog blog-list "><?php 
    if ($wp_query ->have_posts()){ 
         $wp_query->the_post(); 
         ?>
         <ul>
         <li class="main-news-pic">  
          <div class="related-entry-thumbnail">      
            <?php
                dima_featured_image(array(
                   'post_type'                  => 'postslist',
                   'img_hover'                  => $ARG_ARRAY['img_hover'],
                   'elm_hover'                  => $ARG_ARRAY['elm_hover'],
                 ));
            ?>
          </div>
         </li>

            <?php
            $i=1;
            while ($wp_query ->have_posts()):
                  $wp_query->the_post();
                  if($i ==1){
                ?>
                <li class="news-pic">
                <div class="related-entry-thumbnail ">
                  <?php
                      echo dima_helper::dima_get_post_thumb( array(
                        'size' => 'dima-side-magazine-image',//'dima-side-post-image',
                        'a_class' => array('overlay'),
                        'post_format_thumb_fallback' => true,
                        'popup_type' => 'tooltip',
                        'is_linked' => true,
                      ));
                  ?>
                </div>
                </li>
            <?php
                  }else{
                    ?>
                <li class="news-pic">
                <div class="related-entry-thumbnail ">
                  <?php
                      echo dima_helper::dima_get_post_thumb( array(
                        'size' => 'dima-small-magazine-image',//'dima-side-post-image',
                        'a_class' => array('overlay'),
                        'post_format_thumb_fallback' => true,
                        'popup_type' => 'tooltip',
                        'is_linked' => true,
                      ));
                  ?>
                </div>
                </li>
            <?php
                  }
                     $i++;
              endwhile;
            ?>
         </ul>
        <?php
        wp_reset_postdata(); 
    }else{ 
     dima_helper::dima_get_view('global', '_content-none');  
    }
    ?>
    </div>
    </div>

    <?php 
    if ($this->is_paging) {  
          ob_start();
          dima_pagination($wp_query);
          $pagination = ob_get_contents();
          ob_get_clean();
          echo $pagination;
        }
     wp_reset_query();
}

/**
* @param $POST_ARRAY
* @param $wp_query
* @param $ARG_ARRAY
 */
function news_in_images_widget($POST_ARRAY,$wp_query,$ARG_ARRAY){
    ?>
    <div class="news-in-pic clearfix">
    <div class="boxed-blog blog-list "><?php

    if ($wp_query ->have_posts()){ 
         ?>
         <ul>
            <?php
              while ($wp_query ->have_posts()):             
                  $wp_query->the_post(); 
                ?>
                <li class="news-pic">
                <div class="related-entry-thumbnail ">      
                  <?php
                      echo dima_helper::dima_get_post_thumb( array(
                        'size'                       => 'dima-side-post-image',
                        'a_class' => array('overlay'),
                        'post_format_thumb_fallback' => true,
                        'popup_type' => 'tooltip',
                        'is_linked' => true,
                      ));
                  ?>      
                </div>
                </li>
            <?php             
              endwhile;
            ?>
         </ul>
        <?php
        wp_reset_postdata(); 
    }else{ 
     dima_helper::dima_get_view('global', '_content-none');  
    }
    ?>
    </div>
    </div>

    <?php 
    if ($this->is_paging) {  
          ob_start();
          dima_pagination($wp_query);
          $pagination = ob_get_contents();
          ob_get_clean();
          echo $pagination;
        }
     wp_reset_query();
}

function grid($POST_ARRAY,$wp_query,$ARG_ARRAY){
    $owl_class='';
    $data='';
    $js_data = array(
      'pagination'       => ( $POST_ARRAY['pagination']         == 'true' ),
      'auto_play'        => ( $POST_ARRAY['auto_play']          == 'true' ),
      'navigation'       => ( $POST_ARRAY['navigation']         == true ),
      'loop'             => ( $POST_ARRAY['loop']               == 'true' ),
      'mouse_wheel'      => ( $POST_ARRAY['mouse_wheel']        == 'true' ),
      'items'            => ( $POST_ARRAY['items']              == '' )?  1:$POST_ARRAY['items'],
      'items_phone'      => ( $POST_ARRAY['items_phone']        == '' )?  1:$POST_ARRAY['items_phone'],
      'items_tablet'     => ( $POST_ARRAY['items_tablet']       == '' )?  2:$POST_ARRAY['items_tablet'],
      'items_margin'     => ( $POST_ARRAY['items_margin']       == '' )?  0:$POST_ARRAY['items_margin'],
   	  'is_rtl'          => is_rtl()
    );

	$ARG_ARRAY['post_class'].= $POST_ARRAY['clm'] ;

    if ($POST_ARRAY['is_slide'] =='true') {
     $owl_class ='owl-carousel owl-theme owl-rtl ' . $POST_ARRAY['dark'] . ' ';
     $data = dima_creat_data_attributes( 'owl_slider', $js_data );
     $POST_ARRAY['clm'] ='';
     $ARG_ARRAY['post_class']='';
    }

    ?>
    <div class="<?php echo "$owl_class"; ?> boxed-blog blog-list" <?php echo "$data"; ?>>
    <?php 
    if ($wp_query ->have_posts()){ 
        while ($wp_query ->have_posts()):
            $wp_query->the_post(); 
            dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content', get_post_format(),$ARG_ARRAY);
        endwhile;
        wp_reset_postdata(); 
    }else{ 
     dima_helper::dima_get_view('global', '_content-none');  
    }?>
    </div>
    <?php
    if ($this->is_paging) {  
          ob_start();
          dima_pagination($wp_query);
          $pagination = ob_get_contents();
          ob_get_clean();
          echo $pagination;
        }
    wp_reset_query();

}

function standard($POST_ARRAY,$wp_query,$ARG_ARRAY){
    ?><div class="boxed-blog blog-list"><?php 
    if ($wp_query ->have_posts()){ 

        while ($wp_query ->have_posts()):
            $wp_query->the_post(); 
            dima_helper::dima_get_view_with_args($POST_ARRAY['template'], 'content', get_post_format(),$ARG_ARRAY);
        
        endwhile;
        wp_reset_postdata(); 
    }else{ 
     dima_helper::dima_get_view('global', '_content-none');  
    } 
    ?></div><?php
    if ($this->is_paging) {  
          ob_start();
          dima_pagination($wp_query);
          $pagination = ob_get_contents();
          ob_get_clean();
          echo $pagination;
        }
     wp_reset_query();
}

}
new DIMA_RecentPosts();
?>