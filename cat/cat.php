<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
	<li class="cont"><a href="<?php the_permalink(); ?>" ><div class="date" >>>[<?php the_date('Y-m-d'); ?>]</div><?php the_title(); ?></a></li>
<?php endwhile; ?>
<?php else:?>
<div class="nothing">û���ҵ��������~</div>
<?php endif; ?>