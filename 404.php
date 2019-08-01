<?php get_header(); ?>
<div class="content">
	<div id="main-content">
		<?php 
			_e('<h2>404 NOT FOUND</h2>', 'eduglobal');
			_e('<p>The article you were looking for was not found, but maybe try looking again!', 'eduglobal');
			get_search_form(); // Hien thi khung tim kiem

			_e('<h3>Content categories: </h3>', 'eduglobal');
			echo '<div class="404-cat-list">';
				wp_list_categories( array( 'title_li' => '' ) ); // Hien thi danh sach categories 
			echo '</div>';

			_e('Tag Cloud', 'eduglobal');   // Hien thi the tag
			wp_tag_cloud();
		?>
	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>