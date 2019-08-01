<?php 
	/* Template Name: Full Width */
?>
<?php get_header(); ?>
<div class="content">
	<div id="main-content" class="full-width">
		<?php if (have_posts() ) : while( have_posts()) : the_post(); ?>  <!-- su dung query va vong lap -->
			<?php get_template_part('content', get_post_format()); ?>  <!-- ham nhung tap tin content ten format.php neu post hien tai ko co format se lay content.php -->

		<?php endwhile ?>
		<?php else: ?>
			<?php get_template_part('content', 'none'); ?> <!-- nhung tap tin content-non -->
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>