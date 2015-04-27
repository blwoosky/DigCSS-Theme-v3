<div class="arcMeta">
	<time class="metaItem"><?php the_time('Y.m.d') ?></time>
	<span>|</span>
	<span class="metaItem midItem"><?php the_category(',');?>
	</span><span>|</span>
	<span class="metaItem"><?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?></span>
</div>