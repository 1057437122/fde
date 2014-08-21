<div class="cont_title"><?php the_title(); ?></div>
<div class="cont_info">
	<div class="author"><?php the_author(); ?></div>
	<div class="date"><?php the_date('Y-m-d'); ?></div>
	<div class="cat"><?php the_category(','); ?></div>
	<div class="clr"></div>
</div>
<div class="conts"><?php the_content(); ?></div>