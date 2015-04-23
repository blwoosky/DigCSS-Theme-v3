<div class="l sideBarMiddle borderBox per35">
		
	<?php #latest demo?>
	<?php
		$the_query = new WP_Query(array('post_type' => 'demos','posts_per_page' => 1) );
		if(have_posts()):while ( $the_query->have_posts() ) : $the_query->the_post();
	?>

	<div class="Box">
		<h2 class="BoxTitle">latest demo:</h2>
		<?php if ( has_post_thumbnail() ) {?>
		<div class="thumbnailBox fix">
			<a href="<?php echo home_url(); ?>/examples/<?php the_field('demo_slink');?>" class="thumbnailImg"><?php  the_post_thumbnail();?></a>
			<div class="BoxInner thumbnailIntro borderBox">
				<h2><a href="<?php echo home_url(); ?>/examples/<?php the_field('demo_slink');?>"><?php the_title();?></a></h2>
				<div class="modifyTime">上次修改时间: <?php the_modified_time( 'Y-m-d H:i' ); ?></div>
				<div class="thumbnailExcerpt">
					<?php the_excerpt();?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php endwhile; endif;wp_reset_postdata();?>
	<?php #end latest demo?>
		
	<?php #recommend article?>
	<?php
		$the_query = new WP_Query(array('post_type' => 'recarticles','posts_per_page' => 2) );
		
	?>

	<div class="Box mt10">
		<h2 class="BoxTitle">recommend:  <a href="/recarticles/" class="more">more</a></h2>
		<div class="recBox">
			<?php if(have_posts()):while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="BoxInner borderBox">
				<h2><a href="<?php the_field('arcLink');?>" target="_blank"><?php the_title();?>&rarr;</a></h2>
				<div class="authorName">
					Author:<?php the_field('arcAuthor');?>
				</div>
				<div class="recExcerpt">
					<?php the_content();?>...
				</div>
			</div>
			<?php endwhile; endif;wp_reset_postdata();?>
		</div>
	</div>

	<?php #end recommend article?>

	<?php
		$the_query = new WP_Query(array('post_type' => 'snippets','posts_per_page' => 6));
		if(have_posts()):
	?>

	<div class="Box mt10">
		<h2 class="BoxTitle">latest code:</h2>
		<ul class="BoxInner">
		<?php 
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
		?>
			<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
		<?php endwhile;?>
		</ul>
	</div>

	<?php  endif;wp_reset_postdata();?>

	<div class="Box mt10">
		<h2 class="BoxTitle">my subscribe:</h2>
		<div class="BoxInner">
			<?php wp_nav_menu( array('menu'=>'mySubscribe','container'=>false) );?>
		</div>
	</div>

</div> <!-- End sideBarMiddle -->