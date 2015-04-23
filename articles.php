<?php
/*
	Template Name: Articles
*/
get_header(); 
?>

<div class="mainContent mt10 fix">
	<div class="borderBox colLeft l per55">
		<div class="Box allArcList">
			<?php
				$previous_year = $year = 0;
				$previous_month = $month = 0;
				$ul_open = false;
				$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC');
			?>
			<?php foreach($myposts as $post) : ?>
			<?php
				setup_postdata($post);
				$year = mysql2date('Y', $post->post_date);
				$month = mysql2date('n', $post->post_date);
				$day = mysql2date('j', $post->post_date);
			?>
			<?php if($year != $previous_year || $month != $previous_month) : ?>
			<?php if($ul_open == true) : ?>
				</ul>
				<?php endif; ?>
				<p class="timeTitle collapseBox"><?php the_time('Y年 m月'); ?> : <i class="collapse opened"></i></p>
				<ul class="articles-list">
					<?php $ul_open = true; ?>
					<?php endif; ?>
					<?php $previous_year = $year; $previous_month = $month; ?>
				<li class="BoxInner">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>&nbsp;<?php if(function_exists('the_views')) { the_views(); } ?></h3>
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>	
				</li>
					<?php endforeach; wp_reset_postdata();?>
				</ul>

		</div>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>