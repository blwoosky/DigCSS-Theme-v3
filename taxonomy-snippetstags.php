<?php
	get_header();
	global $query_string;
	query_posts( $query_string . '&posts_per_page=-1');
?>

		<div class="codePage">
			<div class="digcssPath bgp p10">
				<a href="<?php echo home_url(); ?>">首页</a> &gt;
				<a href="<?php echo home_url(); ?>/snippets/">代码</a> &gt;
				<span>
					<?php single_tag_title();
						global  $term;
					?>
				</span>
			</div>
			<div class="mt10 codeWrap bgp p30">
				<h2 class="BoxInnerTitle"><?php single_tag_title();?></h2>
				<ul class="codeList verList">
				<?php while (have_posts()) :the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>