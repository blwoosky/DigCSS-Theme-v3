<?php
  get_header();
  global $query_string;
  query_posts($query_string . '&posts_per_page=10');
?>
<div class="mainContent mt10 fix">
	<div class="homeArcList colLeft borderBox l per55">
		<div class="Box">
			<?php $posts = query_posts($query_string . '&orderby=date&showposts=-1'); ?>
			<?php if (have_posts()) : ?>
				<h2 class="BoxTitle">Recommend/推荐文章</h2>
			<ul>
			<?php while (have_posts()) : the_post(); ?>
				<li class="BoxInner" id="post-<?php the_ID(); ?>" >
					<h3><a href="<?php the_field('arcLink');?>" target="_blank"><?php the_title() ?>&rarr;</a></h3>
					<div class="authorName">Author:<?php the_field('arcAuthor');?></div>
					<div>
						<?php the_content();?>
					</div>
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