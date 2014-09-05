<?php $need_js=TRUE; ?>
<div class="products">
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
	<span class="templine">   </span>
	<div class="product_title"><?php the_title(); ?></div>

	<?php $ret=get_show_pics(); //first 3 pictures as the show pictures ... ?>

	<div class="pre_view">
		<div id="zoomWarp">
			<ul id="minImg">
			<?php foreach($ret as $pic): ?>
				<li><img src="<?php echo $pic; ?>" width="70" height="70" zoom="<?php echo $pic; ?>"></li>
			<?php endforeach; ?>
		
			</ul>
			<div id="smallwarp">
				<img src="<?php echo $ret[0]; ?>" id="smallImg" zoom="<?php echo $ret[0]; ?>"/>
			</div>
		</div><!-- zoomWarp-->
	</div><!--pre view-->
	<div class="product_param">
		<div class="container_header">
			<ul>
				<li class="on">商品详情</li>
				<li >商品参数</li>
			</ul>
		</div><!--container header -->
		<div class="container_body">
			<div class="sub_con cur_sub"><?php the_content(); ?></div>
			<div class="sub_con"><?php the_meta(); ?></div>
		</div><!--container body -->
	</div><!-- parameters -->
		
	<?php endwhile; ?>
	<?php else:?>
	<div class="nothing">没有找到相关内容~</div>
	<?php endif; ?>
</div>
