<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
	<li class="cont_img">
		<a href="<?php the_permalink(); ?>" >
			<div class="thumbnail">
				<div class="pic">
					<?php the_post_thumbnail('thumbnail'); ?>
				</div>
			</div><!-- thumbnail -->
			<div class="intro">
				<div class="pro_name"></div>
				<div class="pro_"></div>
			</div><!-- intro -->
		</a>
	</li>
<?php endwhile; ?>
<?php else:?>
<div class="nothing">没有找到相关内容~</div>
<?php endif; ?>