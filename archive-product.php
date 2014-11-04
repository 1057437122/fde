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
	<div class="cat_index">
		<div class="index_img"><img src="<?php bloginfo('template_directory'); ?>/img/cat_left.gif" /></div>
		<div class="sub_cats">
			<?php 
			apply_filters('show_sub_catgory','subs');
			// $sub_cat=get_cat_child();
			// foreach($sub_cat as $sub){
				// echo $sub->name;
			// }
			?>
		</div>
	</div>
	<div class="cat_list">
		<div class="list_header">
			<?php single_cat_title();//the_category(); ?>
		</div>
		<div class="list_body">
			<ul>
			<?php get_template_part('cat/cat',get_post_format()); ?>
			
			</ul>
		</div><!-- posts -->
	</div><!-- list all the posts under this category -->
</div>

<?php
get_footer();
?>