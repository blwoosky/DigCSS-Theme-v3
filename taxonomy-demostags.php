<?php
  get_header();
  global $query_string;
  query_posts($query_string . '&posts_per_page=20');
?>
<div class="mainContent mt10 fix">
	<div class="borderBox colLeft l per55">
		<div class="Box thumbnailPage">
			<div class="Box digcssPath">
				<a href="<?php echo home_url(); ?>">首页</a> &gt; 
				<a href="<?php echo home_url(); ?>/demos/">示例</a> &gt; 
				<span>
					<?php single_tag_title();
						global  $term;
					?>
				</span>
				<div class="allTag verList">
					<?php
					  wp_tag_cloud(array(
					    'taxonomy' => 'demostags',
					    'smallest' => '13',
					    'largest'  => '13',
					    'unit'     => 'px',
					    'format'   => 'list',
					  ));
					?>
				</div>
			</div>
			
			<ul class="mt10">
				<?php while (have_posts()) : the_post(); ?>
				<li class="fix BoxInner">
					<?php 
						if ( has_post_thumbnail() ) {
					?>
					<a href="<?php echo home_url(); ?>/examples/<?php the_field('demo_slink');?>" target="_blank" class="l">
						<?php  the_post_thumbnail();?>
					</a>
					<?php
						}
					?>

					<div class="demoTxt">
						<h2><a href="<?php echo home_url(); ?>/examples/<?php the_field('demo_slink');?>" target="_blank"><?php the_title();?></a></h2>
						<div class="modifyTime">上次修改: <?php the_modified_time( 'Y-m-d H:i' ); ?></div>
						<div class="demoIntro"><?php the_content();?></div>
						<div class="btns mt10">
							<a href="<?php echo home_url(); ?>/examples/<?php the_field('demo_slink');?>" target="_blank" class="viewDemo button">查看Demo</a>
							<a href="<?php the_field('demo_dlink');?>" class="downDemo button">下载Demo</a>
						</div>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
			
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>