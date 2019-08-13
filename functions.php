<?php
/**
@ Khai bao hang
	@ THEME_URL = lay duong dan thu muc theme
	@ CORE = lay duong dan thu muc core
**/
define('THEME_URL', get_stylesheet_directory() );
define('CORE', THEME_URL . "/core");

/**
@ Nhung file /core/init.php
**/
require_once(CORE . "/init.php");

/**
@ Thiet lap chieu rong toi da hien thi noi dung (khong tinh sidebar)
**/
if(!isset($content_width)) {
	$content_width = 620;
}

/**
@ Khai bao chuc nang cua theme
**/
if( !function_exists('eduglobal_theme_setup'))  { /* Ham nay moc vao hook init cua wp, thuc thi sau khi load xong trang */
	function eduglobal_theme_setup() {

		/* Thiet lap textdomain la ten nhan dien cac chuoi cho phep dich trong theme*/
		$languages_folder = THEME_URL . '/languages';
		load_theme_textdomain('eduglobal', $languages_folder);


		/* Tu dong them link RSS vao <head> de trinh doc RSS hieu truc tiep dia chi RSS Feed trong webside */
		add_theme_support('automatic-feed-link'); 

		/* Them post thumbnails (chuc nang Featured image khi tao post)*/
		add_theme_support('post-thumbnails');

		/* Tao post format*/
		add_theme_support('post-formats' , array( 
			'image',
			'video',
			'gallery',
			'quote',
			'link'
		) );

		/* Them title-tag de hien thi kieu Ten post | Ten webside */
		add_theme_support('title-tag');  

		/* Them custom bacground*/
		$default_background = array(   //mang bien mau mac dinh
			'default_color' => '#e8e8e8'
		);
		add_theme_support('custom-background', $default_background);

		/* Them menu*/
		register_nav_menu('primary-menu' , __( 'Primary Menu','eduglobal'));  
		/* Ham __( dung de thiet lap Primary Menu co the sua lai trong file .po theo textdomain,
		   primary-menu la 1 slug */


		/* Tao side-bar*/
		$sidebar = array(  //bien dung de khai bao tham so trong sidebar
			'name' => __('Main Sidebar', 'eduglobal'),
			'id' => 'main-sidebar',
			'description' => __('Default sidebar'),
			'class' => 'main-sidebar',
			'before_title' => '<h3 class="widget-title"> ',
			'after_title' => '</h3>'
 		);
 		register_sidebar( $sidebar);
	}

	add_action('init' , 'eduglobal_theme_setup');
}


/**
TEMPLATE FUNCTION */
if( !function_exists('eduglobal_header')) {
	function eduglobal_header() { ?>
		<div class="logo">
		<div class="site-name">
			<?php 
			if( is_home() ) {
				printf('<h1> <a href="%1$s" title="%2$s"> %3$s </a></h1>', 
				get_bloginfo('url'),
				get_bloginfo('description'),
				get_bloginfo('site-name') );
			} else {
				printf('<p> <a href="%1$s" title="%2$s"> %3$s </a></p>', 
				get_bloginfo('url'),
				get_bloginfo('description'),
				get_bloginfo('site-name') );
			}
			?>
		</div>
		<div class="site-description"> <?php bloginfo('description'); ?> </div>
		</div>	<?php
	}
} 

/**
Thiet lap menu
**/
if( !function_exists('eduglobal_menu')) {
	function eduglobal_menu($menu) {
		$menu = array(
			'theme_location' => $menu,
			'container' => 'nav',
			'container_class' => $menu,
			'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>' 
		);
		wp_nav_menu($menu);
	}
}

/**
Ham tao phan trang
 **/
if(!function_exists('eduglobal_pagination')) {
	function eduglobal_pagination() {
		if( $GLOBALS['wp_query'] -> max_num_pages < 2) {
			return '';
		} ?>
			<nav class="pagination" role="navigation">
				<?php if(get_next_posts_link() ) : ?>
					<div class="prev"><?php next_posts_link( __('Older Post', 'eduglobal')); ?> </div>
				<?php endif; ?>
				<?php if (get_previous_posts_link()) : ?>
					<div class='next'><?php previous_posts_link(__('Newest Post', 'eduglobal')); ?> </div>
				<?php endif; ?>
			</nav>

	<?php }
}


/**
Ham hien thi thumbnail (anh dai dien cho post)
**/

if( !function_exists('eduglobal_thumbnail')) {
	function eduglobal_thumbnail($size) {
		if( !is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')) : ?>
		<!--Anh thumbnail se khong hien thi trong trang single nhung se hien thi trong single neu co format la image -->
		<figure class="post-thumbnail" ><?php the_post_thumbnail($size); ?> </figure>
		<?php endif ; ?>
		<?php }
}

/**
Hien thi entry_header hien thi tieu de post_thumbnail 
**/
if( !function_exists('eduglobal_entry_header')) {
	function eduglobal_entry_header() { ?>
		<?php if(is_single()) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> "><?php the_title(); ?></a></h1>
		<?php else : ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> "> <?php the_title(); ?></a></h2>
		<?php endif; ?>
	<?php }
}

/**
Ham entry_meta lay du lieu post
**/
if( !function_exists('eduglobal_entry_meta')) {
	function eduglobal_entry_meta() { ?>
		<?php if(!is_page()) : ?>
			<div class="entry-meta">
				<?php 
					printf( __('<span class="author">Posted by %1$s ', 'eduglobal'), 
					get_the_author() );

					printf( __('<span class="date-published">at %1$s ', 'eduglobal'),
					get_the_date() );

					printf( __('<span class="category">in %1$s ','eduglobal'),
					get_the_category_list( ', ' ) );

					if (comments_open()) :
						echo '<span class="meta-reply">';
							comments_popup_link(
								__('Leave a comment','eduglobal'),
								__('One comment', 'eduglobal'),
								__('% comment', 'eduglobal')
							);
							echo '</span>';
						endif;
				?>
			</div>
		<?php endif; ?>

	<?php }
}


/**
Ham entry_content hien thi noi dung cua post/page
**/
if( !function_exists('eduglobal_entry_content')) {
	function eduglobal_entry_content() { 
		if(!is_single() && !is_page()) {
			the_excerpt();
		} else {
			the_content();

			/*Phan trang trong single */
			$link_pages = array(
				'before' => __('<p>Page: ', 'eduglobal'),
				'after' => '</p>',
				'nextpagelink' => __('Next Page', 'eduglobal'),
				'previouspagelink' => __('Previous Page: ','eduglobal')
			);
			wp_link_pages( $link_pages );
		}

	}
}

/**
Nut doc them
**/
function eduglobal_readmore() {
	return '<a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __('..[Read more]','eduglobal') .'</a>';
}
add_filter('excerpt_more','eduglobal_readmore');

/**
Ham entry_tag de hien thi tag
**/
if(!function_exists('eduglobal_entry_tag')) {
	function eduglobal_entry_tag() {
		if( has_tag() ) :
			echo '<div class="entry-tag">';
			printf( __('Tagged in %1$s', 'eduglobal'), get_the_tag_list('',', '));
			echo '</div>';
		endif;
	}
}

/* ----- Nhung file style.css ----- */
function eduglobal_style() {
	wp_register_style('main-style', get_template_directory_uri() . "/style.css", 'all');
	wp_enqueue_style('main-style');
	wp_register_style('reset-style', get_template_directory_uri() . "/reset.css", 'all');
	wp_enqueue_style('reset-style');

	// Superfish Menu 
	wp_register_style('superfish-style', get_template_directory_uri() . "/superfish.css", 'all');
	wp_enqueue_style('superfish-style');
	wp_register_script('superfish-script', get_template_directory_uri() . "/superfish.js", array('jquery'));
	wp_enqueue_script('superfish-script');

	//Custom Script
	wp_register_script('custom-script', get_template_directory_uri() . "/custom.js", array('jquery'));
	wp_enqueue_script('custom-script');
}
add_action('wp_enqueue_scripts', 'eduglobal_style');