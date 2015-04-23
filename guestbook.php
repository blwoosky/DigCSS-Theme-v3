<?php
/*
	Template Name: Guest Book
*/
get_header(); 
?>
<div class="fix">
<section class="g-2-3 default-page">
<h2 class="colorful-title">
	<span>\</span>
	<span>^</span>
	<span>_</span>
	<span>^</span>
	<span>/</span>
	<span>留</span>
	<span>言</span>
	<span>板</span>
</h2>
<?php comments_template(); ?>
</section>	
<?php get_sidebar(); ?>
<?php get_footer(); ?>