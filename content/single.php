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
			
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<div class="content">
					<div class="cont_info">
						<div class="author"><?php the_author(); ?></div>
						<div class="date"><?php the_date('Y-m-d'); ?></div>
						<div class="cat"><?php the_category(','); ?></div>
						<div class="clr"></div>
					</div>
					<div class="conts"><?php the_content(); ?></div>
				</div>
			<?php endwhile; ?>
			<?php else:?>
			<div class="nothing">没有找到相关内容~</div>
			<?php endif; ?>
			
		</div><!-- posts -->
	</div><!-- list all the posts under this category -->
<div class="cont_title"><?php the_title(); ?></div>
