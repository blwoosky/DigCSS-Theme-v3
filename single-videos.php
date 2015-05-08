<?php
get_header(); 
?>

<div class="Box digcssPath mt10">
	<a href="<?php echo home_url(); ?>">首页</a> &gt; 
	<a href="<?php echo home_url(); ?>/videos/">视频</a> &gt;
	<span><?php the_title();?></span>
</div>

<div class="video-body mt10">
	<?php the_field('video_src');?>
</div>

<div class="col-md-9 col-lg-8">
	<div class="singlePage">
		<div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="arcContent">
					<?php the_content(); ?>
				</div>
				<div class="videoDownLink">
					下载高清视频 &rarr;
					<a href="<?php the_field('video_dlink');?>" target="_blank" class="button">Download Video</a>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
	<?php comments_template(); ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

