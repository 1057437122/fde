<?php
#this is for the category show
get_header();
?>



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
			<div class="content">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			
				<div class="cont_title"><?php the_title(); ?></div>
				<div class="cont_info">
					<div class="author"><?php the_author(); ?></div>
					<div class="date"><?php the_date('Y-m-d'); ?></div>
					<div class="clr"></div>
				</div>
				<div class="conts"><?php the_content(); ?></div>
			<?php endwhile; ?>
			<?php else:?>
			<div class="nothing">没有找到相关内容~</div>
			<?php endif; ?>
			</div><!--content-->
		</div><!-- posts -->
	</div><!-- list all the posts under this category -->
</div>

<?php
get_footer();
?>