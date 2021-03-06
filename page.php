<?php
/*
	Template Name: Single Page
*/
get_header(); 
?>
<!-- Start left column -->
	<div class="col-md-9 col-lg-8">
		<div class="p10 bgp">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="arcContent">
					<?php the_content(); ?>
				</div>
			<?php endwhile; endif; ?>
		</div>
		<?php comments_template(); ?>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
