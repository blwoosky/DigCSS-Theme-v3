<?php
	get_header();
	global $query_string;
	query_posts( $query_string . '&posts_per_page=-1');
?>
<!-- Start left column -->
	<div class="col-md-9 col-lg-8">
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
			<h2 class="arcTitle p10"><?php single_tag_title();?> 代码片段</h2>
			<div class="codeWrap bgp p30">
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