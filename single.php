<?php get_header(); ?>
<!-- Start left column -->
<div class="col-md-12">
	<div id="post-<?php the_ID(); ?>">
		<article class="arcWrap">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2 class="p10 arcTitle"><?php the_title(); ?></h2>
			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
			<div class="arcContent bgp p20">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
			</div>
		<?php endwhile; endif; ?>
		</article>

		<div class="arcTitle">
			相关文章推荐
		</div>
		<div class="p10 bgp">
			<?php wp_related_posts()?>
		</div>

		<?php if (function_exists('oposts_show')) oposts_show(); ?>
		<?php comments_template(); ?>
	</div>
</div>

<?php get_footer(); ?>