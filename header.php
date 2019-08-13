<!DOCTYPE html>
<html <?php language_attributes(); ?> />
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="profile" href="http://gmgp.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>">
	<?php wp_head(); ?>   <!-- khai bao hook -->
</head>
<body <?php body_class(); ?> >  <!-- Ham them class cho tung trang vao the body de viet css khac nhau-->
	<div class="top-bar">
		<?php eduglobal_header(); ?> 
		<?php eduglobal_menu('primary-menu'); ?>
	</div>
	<div id="container">