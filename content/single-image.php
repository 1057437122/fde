<?php $need_js=TRUE; ?>
<div class="products">
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
	<span class="templine">   </span>
	<div class="product_title"><?php the_title(); ?></div>

	<?php $ret=get_show_pics(); //first 3 pictures as the show pictures ... ?>

	<div class="pre_view">
		<div id="zoomWarp">
			<div id="smallwarp">
				<img src="<?php echo $ret[0]; ?>" id="smallImg" zoom="<?php echo $ret[0]; ?>"/>
			</div>
			<ul id="minImg">
			<?php foreach($ret as $pic): ?>
				<li><img src="<?php echo $pic; ?>" width="70" height="70" zoom="<?php echo $pic; ?>"></li>
			<?php endforeach; ?>
		
			</ul>
		</div><!-- zoomWarp-->
	</div><!--pre view-->
	<div class="product_cont"><?php the_content(); ?></div>
		
	<?php endwhile; ?>
	<?php else:?>
	<div class="nothing">没有找到相关内容~</div>
	<?php endif; ?>
</div>
