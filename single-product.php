<?php
#this is for the category show
get_header();
?>

<div class="cat_header">
	<div class="cat_pic"  >
		<img src="<?php echo get_cat_img(); ?>" alt="" />
	</div><!--cat pic-->
</div>

<div class="clr"></div>

<div class="cat_body">
	<?php get_template_part('content/product',get_post_format() ); ?>
	
</div>

<?php
get_footer();
?>