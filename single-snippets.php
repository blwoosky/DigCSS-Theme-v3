<?php
get_header(); 
?>
	<div id="post-<?php the_ID(); ?>">
		<article class="Box arcWrap">
			<div class="Box digcssPath">
				<a href="<?php echo home_url(); ?>">Home</a> &gt;
				<a href="<?php echo home_url(); ?>/snippets/">Snippets</a> &gt;
				<span class="cur_nav"><?php the_title(); ?></span>
		    </div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="BoxInner mt10">
				<div class="arcContent">
					<div class="modifyTime">
						Last modified: <?php the_modified_time( 'Y-m-d H:i' ); ?> 
					</div>
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