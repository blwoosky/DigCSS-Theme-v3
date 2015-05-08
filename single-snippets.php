<?php
get_header(); 
?>
<!-- Start left column -->
<div class="col-md-9 col-lg-8">
	<div id="post-<?php the_ID(); ?>">
		<article class="Box arcWrap">
			<div class="digcssPath bgp p10">
				<a href="<?php echo home_url(); ?>">Home</a> &gt;
				<a href="<?php echo home_url(); ?>/snippets/">Snippets</a> &gt;
				<span class="cur_nav"><?php the_title(); ?></span>
		    </div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="ti10 arcMeta">
				Last modified: <?php the_modified_time( 'Y-m-d H:i' ); ?> 
			</div>
			<div class="bgp p10">
				<div class="arcContent">
					
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				</div>
			</div>
		<?php endwhile; endif; ?>
		</article>
		<?php if (function_exists('oposts_show')) oposts_show(); ?>
		<?php comments_template(); ?>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>