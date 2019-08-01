<article id="post-<?php the_iD(); ?>" <?php post_class(); ?> >
	<div class="entry-thumbnail">
		<?php eduglobal_thumbnail('thumbnail'); ?>  <!-- size thumbnail la size mac dinh cua wordpress -->
	</div>
	<div class="entry-header">
		<?php eduglobal_entry_header(); ?>
		<?php eduglobal_entry_meta(); ?>  
	</div>
	<div class="entry-content"> 
		<?php eduglobal_entry_content(); ?>
		<?php ( is_single() ? eduglobal_entry_tag() : '' ); ?> 
	</div>
</article>