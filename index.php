<?php get_header(); ?>

<div class="row">
	<div class="col-md-9 col-lg-8">
		<div class="Box">
			<h2 class="BoxTitle">latest articles:</h2>
			<ul>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li class="BoxInner" id="post-<?php the_ID(); ?>" >
					<h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>	
					<p>
						<?php the_excerpt(); ?>
					</p>
				</li>
			<?php endwhile; ?>
			<?php else : ?>
				<li class="BoxInner">
					<h3>Nothing...</h3>
				</li>
			<?php endif; ?>
			</ul>
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>