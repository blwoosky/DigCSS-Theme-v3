<?php get_header(); ?>

<div class="mainContent arcPage mt10 fix">
	<div class="borderBox colLeft l per55" id="post-<?php the_ID(); ?>">
		<article class="Box arcWrap">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2 class="arcTitle"><?php the_title(); ?></h2>
			<div class="BoxInner">
				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
				<div class="arcContent">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				</div>
			</div>
		<?php endwhile; endif; ?>
		</article>
		<?php if (function_exists('oposts_show')) oposts_show(); ?>
		<?php comments_template(); ?>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>