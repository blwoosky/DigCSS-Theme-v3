<?php get_header(); ?>

	
		<div>
			<?php $posts = query_posts($query_string . '&orderby=date&showposts=-1'); ?>
				<div class="p10 bgp">
					<?php if (have_posts()) : ?>
					<?php /* If this is a category archive */ if (is_category()) { ?>
						<h2 class="BoxTitle1">&#8216;<?php single_cat_title(); ?>&#8217;下所有文章</h2>
					<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
						<h2 class="BoxTitle1">&#8216;<?php single_tag_title(); ?>&#8217;相关的文章</h2>
					<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
						<h2 class="BoxTitle1"><?php the_time('Y年m月d日'); ?>所有文章</h2>
					<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
						<h2 class="BoxTitle1"><?php the_time('Y年m月'); ?>所有文章</h2>
					<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
						<h2 class="BoxTitle1"><?php the_time('Y年'); ?>所有文章</h2>
					<?php /* If this is an author archive */ } elseif (is_author()) { ?>
						<h2 class="BoxTitle1">Author Archive</h2>
					<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
						<h2 class="BoxTitle1">Blog Archives</h2>
					<?php } ?>
				</div>
			<ul>
			<?php while (have_posts()) : the_post(); ?>
				<li class="bgp mt10 p20" id="post-<?php the_ID(); ?>" >
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
