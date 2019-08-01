<article id="post-<?php the_iD(); ?>" <?php post_class(); ?> >
	<div class="entry-thumbnail">
		<?php eduglobal_thumbnail('large'); ?>  <!-- size thumbnail la size mac dinh cua wordpress -->
	</div>
	<div class="entry-header">
		<?php eduglobal_entry_header(); ?>
		<?php 
			$attachments = get_children( array( 'post_parent' => $post-> ID));
			$attachment_number = count($attachments);
			printf( __('This image post contain %1$s photos' , 'eduglobal'), $attachment_number);
		 ?>  
	</div>
	<div class="entry-content"> 
		<?php eduglobal_entry_content(); ?>
		<?php ( is_single() ? eduglobal_entry_tag() : '' ); ?> 
	</div>
</article>