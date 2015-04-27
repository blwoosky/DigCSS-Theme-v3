<?php
/*
	Template Name: Articles
*/
get_header(); 
?>
	<div class="allArcList">
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
			</div> <?php #CLOSE DIV FOR .bgp ?>
			<?php endif; ?> 
			<div class="bgp mb30">
				<p class="BoxTitle collapseBox"><?php the_time('Y年 m月'); ?> : <i class="collapse opened"></i></p>
				<ul class="articles-list trans">
			<?php $ul_open = true; ?>
		<?php endif; ?>
		<?php $previous_year = $year; $previous_month = $month; ?>
				<li>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>&nbsp;<?php if(function_exists('the_views')) { the_views(); } ?></h3>
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>	
				</li>
					<?php endforeach; wp_reset_postdata();?>
				</ul>
			</div> <?php #CLOSE DIV FOR .bgp ?>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>