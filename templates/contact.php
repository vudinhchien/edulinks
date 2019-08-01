<?php  
	/*
	Template Name: Contact
	*/
?>
<?php get_header(); ?>
<div class="content">
	<div id="main-content">
		<div class="contact-info">
			<h4>Địa chỉ liên hệ</h4>
			<p>Kungatan 13 LGH 1020, 5142 Katrineho, Sweden</p>
			<p>076.222.703</p>
		</div>
		<div class="contact-form">
			<?php echo do_shortcode('[contact-form-7 id="1391" title="Contact form 1"]'); ?>
		</div>
	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>