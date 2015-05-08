<?php get_header(); ?>
<!-- Start left column -->
<div class="col-md-9 col-lg-8">
	<div class="homeList">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="bgp mb30" id="post-<?php the_ID(); ?>">
			<h3 class="yahei"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>	
			<p>
				<?php the_excerpt(); ?>
			</p>
			<div>
				<a href="<?php the_permalink(); ?>" class="mt10 btn btn-primary btn-sm">阅读全文</a>
			</div>
		</div>
	<?php endwhile; ?>
	<?php else : ?>
		<div class="bgp">
			<h3 class="yahei">Nothing...</h3>
		</div>
	<?php endif; ?>
	<div class="mb30"><?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } ?></div>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>