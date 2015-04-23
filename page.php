<?php
/*
	Template Name: Single Page
*/
get_header(); 
?>


<div class="mainContent mt10 fix">
	<div class="borderBox colLeft l per55">
		<div class="Box singlePage">
			<div class="BoxInner">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="arcContent">
						<?php the_content(); ?>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<?php comments_template(); ?>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
