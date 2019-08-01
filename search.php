<?php get_header(); ?>
<div class="content">
	<div id="main-content">
		<div class="search-info">
			<?php 
				$search_query = new WP_Query('s='.$s.'&showpost=-1');
				$search_keyword = wp_specialchars($s, 1);
				$search_count = $search_query->post_count;
				printf(__('We found %1$s articles for your search query', 'eduglobal'), $search_count);
			?>
		</div>
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