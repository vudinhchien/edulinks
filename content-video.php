<article id="post-<?php the_iD(); ?>" <?php post_class(); ?> >
	<div class="entry-header">
		<?php eduglobal_entry_header(); ?>  
	</div>
	<div class="entry-content"> 
		<?php the_content(); ?>
		<?php ( is_single() ? eduglobal_entry_tag() : '' ); ?> 
	</div>
</article>