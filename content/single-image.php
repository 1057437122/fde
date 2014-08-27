
<div class="products">
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		
	<div class="product_title"><?php the_title(); ?></div>
	<hr>
	<?php $ret=get_show_pics();//the pictures uploaded must be more than 3 ~otherwise... ?>
	<div class="product_info">
		<div class="author"><?php the_author(); ?></div>
		<div class="date"><?php the_date('Y-m-d'); ?></div>
		<div class="cat"><?php the_category(','); ?></div>
		<div class="clr"></div>
	</div>
	<div class="pre_view">
		
	</div><!--pre view-->
	<div class="product_cont"><?php the_content(); ?></div>
		
	<?php endwhile; ?>
	<?php else:?>
	<div class="nothing">没有找到相关内容~</div>
	<?php endif; ?>
</div>



