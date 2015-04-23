<div class="col-md-3 col-lg-4">
	<?php
		$args = array(
			'post_type' => 'videos',
			'posts_per_page' => 1
		);
		// The Query
		$the_query = new WP_Query( $args );
		if(have_posts()):while ( $the_query->have_posts() ) :
		$the_query->the_post();
	?>
	<div class="Box">
		<h2 class="BoxTitle">latest video:</h2>
		<?php if ( has_post_thumbnail() ) {?>
		<div class="thumbnailBox fix">
			<a href="#" class="thumbnailImg"><?php  the_post_thumbnail();?></a>
			<div class="BoxInner thumbnailIntro borderBox">
				<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				<div class="runTime">RUNTIME:  <?php the_field('video_runtime');?></div>
				<div class="thumbnailExcerpt">
					<?php the_excerpt();?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php endwhile; endif;?>
	<div class="mt10 Box sideArticles">
		<h2 class="BoxTitle">article:</h2>
		<h3 class="BoxInnerTitle">文章分类:</h3>
		<ul class="BoxInner">
			<?php wp_list_categories(
				'show_count=1&title_li='
			); ?> 
		</ul>
		<h3 class="BoxInnerTitle">文章存档:</h3>
		<ul class="BoxInner">
			<?php wp_get_archives(
				'show_post_count=1'
			); ?> 
		</ul>
	</div>

	<?php if (function_exists('vote_poll') && !in_pollarchive()): ?>
	<div class="mt10 Box sideArticles">
        <h2 class="BoxTitle">Polls</h2>
		<div class="BoxInner">
			<?php get_poll();?>
		</div>
	</div>
	<?php endif; ?>

</div> <!-- End SidrBar -->