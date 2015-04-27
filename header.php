<!DOCTYPE HTML>
<html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
	<meta content="yes" name="apple-mobile-web-app-capable" />
	<meta content="telephone=no" name="format-detection" />
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico">
	 <!--[if !IE]><!-->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	  <!--<![endif]-->
	  <!--[if lt IE 9]>
	  <link rel="stylesheet" href="<?php echo home_url(); ?>/css/oldie.css">
	  <![endif]-->
	  <!--[if IE 9]>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	  <![endif]-->


	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
	
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.0.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/digcss.js"></script>

</head>

<body <?php body_class(); ?>>
	<div class="container-fluid pageWrap">
		<header class="pageHeader text-center">
			<a href="<?php echo home_url(); ?>" class="dib">
				<span class="dib boy"></span>
				<span class="dib logo"></span>
			</a>
		</header>
		<header class="commonTop text-center">
			<nav class="main_nav yahei dib">
				<?php wp_nav_menu( array(
					'menu'=>'mainNav',
					'container'=>false,
					"menu_class"=>"list-inline"
				));?>
			</nav>
			<?php get_search_form(); ?>
		</header> <!-- End commonTop -->
		<div class="mainBody bShadow p30 mt10 row">
			<!-- Start left column -->
			<div class="col-md-9 col-lg-8">
