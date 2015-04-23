<?php get_header(); ?>

<div class="mainContent mt10 fix">
	<div class="homeArcList colLeft borderBox l per55">
		<div class="Box">
			<?php $posts = query_posts($query_string . '&orderby=date&showposts=-1'); ?>
			<?php if (have_posts()) : ?>
				<?php /* If this is a category archive */ if (is_category()) { ?>
					<h2 class="BoxTitle">&#8216;<?php single_cat_title(); ?>&#8217;下所有文章</h2>
				<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
					<h2 class="BoxTitle">&#8216;<?php single_tag_title(); ?>&#8217;相关的文章</h2>
				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
					<h2 class="BoxTitle"><?php the_time('Y年m月d日'); ?>所有文章</h2>
				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
					<h2 class="BoxTitle"><?php the_time('Y年m月'); ?>所有文章</h2>
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
					<h2 class="BoxTitle"><?php the_time('Y年'); ?>所有文章</h2>
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
					<h2 class="BoxTitle">Author Archive</h2>
				<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<h2 class="BoxTitle">Blog Archives</h2>
				<?php } ?>
			<ul>
			<?php while (have_posts()) : the_post(); ?>
				<li class="BoxInner" id="post-<?php the_ID(); ?>" >
					<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>	
					<p>
						<?php the_excerpt(); ?>
					</p>
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
