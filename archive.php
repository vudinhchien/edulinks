<?php get_header(); ?>
<div class="content">
	<div id="main-content">
		<div class="archive-title">
			<?php
				if( is_tag()) : 
					printf( __('Posts tagget: %1$s', 'eduglobal'), single_tag_title('', false));
				elseif( is_category() ) :
					printf( __('Post Categorized: %1$s', 'eduglobal'), single_cat_title('',false));
				elseif( is_day() ) :
					printf( __('Daily Archive: %1$s', 'eduglobal'), get_the_time('l, F j ,Y'));
				elseif( is_month() ) :
					printf( __('Monthly Archive: %1$s', 'eduglobal'), get_the_time('F Y'));
				elseif( is_year() ) :
					printf( __('Yearly Archive: %1$s', 'eduglobal'), get_the_tine('Y'));
				endif; 				
			?>
		</div>
		<?php if( is_tag() || is_category() ) :  ?>
			<div class="archive-description">
				<?php echo term_description(); ?>
			</div>
		<?php endif; ?>
		<?php if (have_posts() ) : while( have_posts()) : the_post(); ?>  <!-- su dung query va vong lap -->
			<?php get_template_part('content', get_post_format()); ?>  <!-- ham nhung tap tin content ten format.php neu post hien tai ko co format se lay content.php -->
		<?php endwhile ?>
		<?php eduglobal_pagination(); ?>  <!-- phan trang-->
		<?php else: ?>
			<?php get_template_part('content', 'none'); ?> <!-- nhung tap tin content-non -->
		<?php endif; ?>
	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>