<?php
#this is for the category show
get_header();
?>
<div class="cat_pic"  >
	<img src="<?php bloginfo('template_directory'); ?>/img/cat_<?php the_category_ID(); ?>.png" alt="" />
</div><!--cat pic-->

<?php
get_footer();
?>