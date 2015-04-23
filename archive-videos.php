<?php
  get_header();
  global $query_string;
  query_posts($query_string . '&posts_per_page=10');
?>
<div class="mainContent mt10 fix">
	<div class="borderBox colLeft l per55">
		<div class="Box thumbnailPage">
			<div class="Box digcssPath">
				<a href="<?php echo home_url(); ?>">首页</a> &gt; 
				<span>视频</span>
			</div>
			
			<ul class="mt10">
				<?php
					while (have_posts()){
						the_post();
				?>
				<li class="fix BoxInner">
					<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink() ?>" target="_blank" class="l">
							<?php  the_post_thumbnail();?>
						</a>
					<?php } ?>

					<div class="demoTxt">
						<h2><a href="<?php the_permalink() ?>" target="_blank"><?php the_title();?></a></h2>
						<div class="modifyTime">播放时长: <?php the_field('video_runtime');?></div>
						<div class="demoIntro"><?php the_content();?></div>
						<div class="btns mt10">
							<a href="<?php the_permalink();?>" class="button">播放视频</a>
						</div>
					</div>
				</li>
				<?php } ?>

			</ul>
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>