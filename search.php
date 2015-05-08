<?php get_header(); ?>

<!-- Start left column -->
	<div class="col-md-9 col-lg-8">
		<div>
			<h2 class="BoxTitle1 p10 bgp">搜索结果/search result:</h2>
			<?php $posts = query_posts($query_string . '&orderby=date&showposts=-1'); ?>
			<?php if (have_posts()) : ?>
			<ul>
			<?php while (have_posts()) : the_post(); ?>
				<li class="bgp mt10 p20" id="post-<?php the_ID(); ?>" >
					<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>	
				</li>
			<?php endwhile; ?>
			</ul>
			<?php else : ?>
				<p class="BoxInner nothing">啥都没有...</p>
			<?php endif; ?>
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>