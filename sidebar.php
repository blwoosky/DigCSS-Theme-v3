<div class="sideBar col-md-3 col-lg-4">

	<?php #latest video?>
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
	<div class="bgp mt30">
		<h2 class="BoxTitle">latest video</h2>
		<?php if ( has_post_thumbnail() ) {?>
		<div class="thumbnailBox fix">
			<a href="#" class="thumbnailImg"><?php  the_post_thumbnail();?></a>
			<div class="BoxInner thumbnailIntro borderBox">
				<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
				<div class="runTime">RUNTIME:  <?php the_field('video_runtime');?></div>
				<div class="thumbnailExcerpt">
					<?php the_excerpt();?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php endwhile; endif;?>
	<?php #end latest video?>


	<?php #latest demo?>
	<?php
		$the_query = new WP_Query(array('post_type' => 'demos','posts_per_page' => 1) );
		if(have_posts()):while ( $the_query->have_posts() ) : $the_query->the_post();
	?>

	<div class="bgp mt30">
		<h2 class="BoxTitle">latest demo</h2>
		<?php if ( has_post_thumbnail() ) {?>
		<div class="thumbnailBox fix">
			<a href="<?php echo home_url(); ?>/examples/<?php the_field('demo_slink');?>" class="thumbnailImg"><?php  the_post_thumbnail();?></a>
			<div class="BoxInner thumbnailIntro borderBox">
				<h3 class="yahei"><a href="<?php echo home_url(); ?>/examples/<?php the_field('demo_slink');?>"><?php the_title();?></a></h3>
				<div class="arcMeta">上次修改时间: <?php the_modified_time( 'Y-m-d H:i' ); ?></div>
				<div class="thumbnailExcerpt">
					<?php the_excerpt();?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php endwhile; endif;wp_reset_postdata();?>
	<?php #end latest demo?>


	<?php
		$the_query = new WP_Query(array('post_type' => 'snippets','posts_per_page' => 6));
		if(have_posts()):
	?>

	<div class="bgp mt30">
		<h2 class="BoxTitle">latest code</h2>
		<ul class="BoxInner">
		<?php 
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
		?>
			<li><a href="<?php the_permalink();?>" class="trans"><?php the_title();?></a></li>
		<?php endwhile;?>
		</ul>
	</div>

	<?php  endif;wp_reset_postdata();?>

	<?php if (function_exists('vote_poll') && !in_pollarchive()): ?>
	<div class="bgp mt30">
        <h2 class="BoxTitle">Polls</h2>
		<div class="BoxInner">
			<?php get_poll();?>
		</div>
	</div>
	<?php endif; ?>

</div> <!-- End SidrBar -->