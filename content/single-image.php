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
			<div class="buynowbox">
				<a href=""><div class="buynow">立即购买</div></a>
			</div><!-- buy now -->
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
			<?php $metas=get_post_meta($post->ID); ?>
			<div class="sub_con">
				<table>
					<tr>
						<td class="tit">产品描述</td>
						<td><?php echo $metas['_meta_des_value'][0]; ?></td>
					</tr>
					<tr>
						<td class="tit">产品规格</td>
						<td><?php echo $metas['_meta_spec_value'][0]; ?></td>
					</tr>
					<tr>
						<td class="tit">型号</td>
						<td><?php echo $metas['_meta_mod_value'][0]; ?></td>
					</tr>
					<tr>
						<td class="tit">产地</td>
						<td><?php echo $metas['_meta_area_value'][0]; ?></td>
					</tr>
				</table>
	
			</div><!-- sub con -->
		</div><!--container body -->
	</div><!-- parameters -->
		
	<?php endwhile; ?>
	<?php else:?>
	<div class="nothing">没有找到相关内容~</div>
	<?php endif; ?>
</div>
