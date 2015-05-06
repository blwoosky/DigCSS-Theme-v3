<?php
  get_header();
  global $query_string;
  query_posts($query_string . '&posts_per_page=20');
?>
		<div class="thumbnailPage">
			<div class="digcssPath bgp p10">
				<a href="<?php echo home_url(); ?>">首页</a> &gt; 
				<a href="<?php echo home_url(); ?>/demos/">示例</a> &gt; 
				<span>
					<?php single_tag_title();
						global  $term;
					?>
				</span>
			</div>
			
			<div class="mt10 bgp p15">
				<ul class="row thumbnailList">
					<?php while (have_posts()) : the_post(); ?>
					<li class="fix col-md-4 col-sm-6">
						<?php 
							if ( has_post_thumbnail() ) {
						?>
						<a href="<?php echo home_url(); ?>/examples/<?php the_field('demo_slink');?>" target="_blank" class="l">
							<?php  the_post_thumbnail();?>
						</a>
						<?php
							}
						?>

						<div class="trans thumbnailTxt">
							<div class="npt15">
								<div class="bgp bShadow p10">
									<h2><a href="<?php echo home_url(); ?>/examples/<?php the_field('demo_slink');?>" target="_blank"><?php the_title();?></a></h2>
									<div class="arcMeta">上次修改: <?php the_modified_time( 'Y-m-d H:i' ); ?></div>
									<div class="demoIntro"><?php the_content();?></div>
									<div class="btns mt10">
										<a href="<?php echo home_url(); ?>/examples/<?php the_field('demo_slink');?>" target="_blank" class="viewDemo btn btn-sm btn-primary">查看Demo</a>
										<a href="<?php the_field('demo_dlink');?>" class="downDemo btn btn-sm btn-primary">下载Demo</a>
									</div>
								</div>
							</div>
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
			
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>