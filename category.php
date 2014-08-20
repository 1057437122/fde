<?php
#this is for the category show
get_header();
?>
<div class="h_left" style="height:93px;"></div>
<div class="cat_header">
	<div class="cat_pic"  >
		<img src="<?php bloginfo('template_directory'); ?>/img/cat_<?php the_category_ID(); ?>.png" alt="" />
	</div><!--cat pic-->
</div>
<div class="h_right" style="height:93px;"></div>
<div class="clr"></div>
<div class="h_left" style="height:200px;"></div>
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
	<div class="cat_list"></div>
</div>
<div class="h_right" style="height:200px;"></div>
<?php
get_footer();
?>